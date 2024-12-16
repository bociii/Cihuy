<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="flex mt-6 justify-between items-center">
            <h2 class="font-semibold text-xl">Edit Article</h2>
            @include('articles.comp.delete')
        </div>
        <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $article->foto }}' }">
            <form enctype="multipart/form-data" method="POST" action="{{ route('article.update', $article) }}"
                class="flex flex-col md:flex-row gap-8">
                @method('PUT')
                @csrf
                <div class="w-full md:w-1/2 flex justify-center">
                    <img :src="imageUrl" class="rounded-md w-3/4 md:w-2/3 lg:w-1/2 object-cover md:h-48" />
                </div>
                <div class="w-full md:w-1/2">
                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input accept="image/*" id="foto" class="block mt-1 w-full border p-2"
                            type="file" name="foto" :value="$article->foto"
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="judul" :value="__('Judul')" />
                        <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul" :value="$article->judul" />
                        <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="penulis" :value="__('Penulis')" />
                        <x-text-input id="penulis" class="block mt-1 w-full" type="text" name="penulis" :value="$article->penulis" />
                        <x-input-error :messages="$errors->get('penulis')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" :value="$article->deskripsi" />
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>


    </div>
</x-app-layout>