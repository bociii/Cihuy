<x-app-layout>
    <div class="container-fluid px-5 py-4" style="background-color: #f8f9fa;">
        <div class="row justify-content-center">
        <div class="flex justify-center items-center">
                <img src="{{ asset('storage/'.$article->foto) }}" 
                    alt="Article Image" 
                    class="center rounded shadow-lg" 
                    style="max-height: 300px; height: auto; object-fit: cover;">
        </div>
         <!-- Title -->
         <h1 class="fw-bold text-dark text-center mb-3" style="font-size: 2rem;">
                    {{ $article->judul }}
                </h1>
                <!-- Metadata -->
                <p class="text-muted text-center mb-4" style="font-size: 0.9rem;">
                    By: {{ $article->penulis }} | Published on {{ date('F d, Y') }}
                </p>
                <!-- Article Content with narrower width -->
                <div class="text-start" style="max-width: 700px; margin-left: auto; margin-right: auto;">
                    <p class="fs-6" style="line-height: 1.6; color: #333;">
                        {!! nl2br(e($article->deskripsi)) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>