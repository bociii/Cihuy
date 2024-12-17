<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(6);
        return view('articles.index', compact('articles'));
    }

    public function viewAll()
    {
        $articles = Article::paginate(6);
        return view('articles.view', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

public function store(Request $request)
{
    // Validate the input
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
    ], [
        'judul.required' => 'Judul is required.',
        'penulis.required' => 'Penulis is required.',
        'deskripsi.required' => 'Deskripsi is required.',
        'foto.required' => 'An image file is required.',
        'foto.image' => 'The file must be an image.',
        'foto.mimes' => 'Allowed image types are jpeg, png, jpg, and gif.',
        'foto.max' => 'The image size must not exceed 2MB.',
    ]);

    $foto = $request->file('foto');
    $foto->storeAs('public', $foto->hashName());

    // Create the article
    Article::create([
        'judul' => $validatedData['judul'],
        'penulis' => $validatedData['penulis'],
        'deskripsi' => $validatedData['deskripsi'],
        'foto' => $foto->hashName(),
    ]);

    return redirect()->route('article.index')->with('success', 'Add article Success');
}


    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
{
    // Validate the input
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation, optional
    ], [
        'judul.required' => 'Judul is required.',
        'penulis.required' => 'Penulis is required.',
        'deskripsi.required' => 'Deskripsi is required.',
        'foto.image' => 'The uploaded file must be an image.',
        'foto.mimes' => 'Allowed image types are jpeg, png, jpg, and gif.',
        'foto.max' => 'The image size must not exceed 2MB.',
    ]);

    // Update article data
    $article->judul = $validatedData['judul'];
    $article->penulis = $validatedData['penulis'];
    $article->deskripsi = $validatedData['deskripsi'];

    if ($request->file('foto')) {
        if ($article->foto && $article->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $article->foto);
        }

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());
        $article->foto = $foto->hashName();
    }

    $article->save();

    return redirect()->route('article.index')->with('success', 'Update article Success');
}

    public function destroy(Article $article)
    {
        if ($article->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $article->foto);
        }

        $article->delete();

        return redirect()->route('article.index')->with('success', 'Delete article Success');
    }

    public function detail($id)
    {
        $article = Article::find($id);
        return view('articles.detail', ['article' => $article]);
    }

    public function search(Request $request)
{
    $search = $request->input('search');
    $results = Article::where('judul', 'like', "%$search%")->get();

    return view('articles.search', ['results' => $results]);
}
}
