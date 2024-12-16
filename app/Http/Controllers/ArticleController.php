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

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Article::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName()
        ]);

        return redirect()->route('article.index')->with('success', 'Add article Success');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->judul = $request->judul;
        $article->penulis = $request->penulis;
        $article->deskripsi = $request->deskripsi;

        
        if ($request->file('foto')) {

            if ($article->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $article->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $article->foto = $foto->hashName();
        }

        $article->update();

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
