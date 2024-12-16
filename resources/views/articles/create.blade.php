<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="flex mt-6">
            <h2 class="font-semibold text-xl">Add Article</h2>
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/noimage.png' }">
            <form enctype="multipart/form-data" method="POST" action="{{ route('article.store') }}" 
                  class="flex flex-col items-center gap-6">
                @csrf
                <div class="w-full flex justify-center">
                    <!-- Image with explicit size, border, and padding -->
                    <img :src="imageUrl" class="rounded-md w-40 h-auto border-4 border-gray-300 p-1 shadow-md" />
                </div>

                <div class="w-full max-w-md">
                    
                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input accept="image/*" id="foto" class="block mt-1 w-full border p-2"
                            type="file" name="foto" :value="old('foto')" required
                            @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="judul" :value="__('Judul')" />
                        <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul" :value="old('judul')" />
                        <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="penulis" :value="__('Penulis')" />
                        <x-text-input id="penulis" class="block mt-1 w-full" type="text" name="penulis" :value="old('penulis')" />
                        <x-input-error :messages="$errors->get('penulis')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" :value="old('deskripsi')" required autofocus autocomplete="username" />
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
