<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="flex mt-6 items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800">All Articles</h2>
            <a href="{{ route('article.create') }}">
                <button class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md font-semibold transition duration-200">Add Article</button>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($articles as $article)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                <img src="{{ url('storage/' . $article->foto) }}" class="h-48 w-full object-cover" />
                <div class="p-4 h-48 flex flex-col justify-between">
                    <div>
                        <h1 class="text-xl font-bold mb-2 text-gray-800">{{ $article->judul }}</h1>
                        <h3 class="text-md font-semibold mb-2 text-gray-600">Penulis: {{ $article->penulis }}</h3>
                        <p class="text-sm text-gray-500 mb-4">
                            {{ implode(' ', array_slice(explode(' ', $article->deskripsi), 0, 10)) }}.....
                        </p>
                    </div>
                    <a href="{{ route('article.edit', $article) }}" class="block text-center">
                    <button class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded-md font-semibold transition">
                            Edit
                        </button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>