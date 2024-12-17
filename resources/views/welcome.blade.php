<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Homepage')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="font-sans antialiased bg-gray-50 text-black">
    <div class="bg-gray-50">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" style="background-color: white;" />
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="h-12 lg:h-16" />
                    </div>
                    @if (Route::has('login'))
                    <nav class="flex flex-1 justify-end space-x-4 mt-4 lg:mt-0">
                        @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="px-4 py-2 text-black rounded-md ring-1 ring-transparent hover:bg-[#FF2D20] hover:text-white transition">
                            Dashboard
                        </a>
                        @else
                        <a
                            href="{{ route('login') }}"
                            class="px-4 py-2 text-black rounded-md ring-1 ring-transparent hover:bg-[#FF2D20] hover:text-white transition">
                            Log in
                        </a>

                        @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="px-4 py-2 text-black rounded-md ring-1 ring-transparent hover:bg-[#FF2D20] hover:text-white transition">
                            Register
                        </a>
                        @endif
                        @endauth
                    </nav>
                    @endif
                </header>

                <div class="relative flex items-center justify-center h-screen px-8 sm:px-16">
                    <div class="flex-1 max-w-lg text-left">
                        <h1 class="text-2xl sm:text-3xl font-semibold leading-tight">
                            "Unlock Your Potential With Expert-Led Courses Anytime, Anywhere."
                        </h1>
                        <p class="text-sm sm:text-base mt-4 leading-tight">Start your journey towards knowledge with our online courses. Explore a wide range of topics and grow at your own pace.</p>
                        <a href="{{ route('article.view') }}" class="inline-block bg-blue-600 text-white text-sm sm:text-lg px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 mt-4">
                            Explore Now
                        </a>
                    </div>

                    <div class="flex-shrink-0 px-8">
                        <img src="{{ asset('storage/logo.png') }}" class="object-cover w-48 h-48  rounded-full shadow-lg" alt="Circular image">
                    </div>
                </div>

                <!-- Main Content Section -->
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <h2 class="text-2xl font-semibold">Welcome to CIHUYY</h2>
                                <p class="mt-4 text-lg">Explore our range of expert-led courses designed to boost your skills and unlock your potential. Start learning now!</p>
                                <p class="mt-4 text-lg">Explore our range of expert-led courses designed to boost your skills and unlock your potential. Start learning now!</p>
                        <p class="mt-4 text-lg"> Martin Sebastian - 2602113142 </p>
                        <p class="mt-4 text-lg"> Darren Cornelius Citra Wijaya - 2602118875 </p>
                        <p class="mt-4 text-lg"> Susan Wijaya - 2602096792 </p>
                        <p class="mt-4 text-lg"> Auryn Larissa Sabrina - 2602098085 </p>
                        <p class="mt-4 text-lg"> Helena Priscilla - 2602066713</p>
                            </div>
                        </div>
                    </div>
                </div>
</body>

</html>