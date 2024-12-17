<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Homepage')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <x-app-layout>

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
                        <p class="mt-4 text-lg"> Martin Sebastian - 2602113142 </p>
                        <p class="mt-4 text-lg"> Darren Cornelius Citra Wijaya - 2602118875 </p>
                        <p class="mt-4 text-lg"> Susan Wijaya - 2602096792 </p>
                        <p class="mt-4 text-lg"> Auryn Larissa Sabrina - 2602098085 </p>
                        <p class="mt-4 text-lg"> Helena Priscilla - 2602066713</p>
                                       
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>

</body>

</html>
