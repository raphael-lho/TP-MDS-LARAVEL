<!DOCTYPE html>
<html lang="fr" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RaphCorp - Gestion de locations de box</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Figtree', 'sans-serif'],
                    },
                    animation: {
                        'bounce-slow': 'bounce 3s infinite',
                    }
                },
            },
        }
    </script>
    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold text-blue-600">RaphCorp</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="ml-3 relative" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open"
                                class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                id="user-menu" aria-haspopup="true">
                                <span class="mr-2">{{ Auth::user()->name }}</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div x-show="open" @click.away="open = false"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 animate-slideDown"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Votre Profil</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Paramètres</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none"
                                    role="menuitem">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <h2
                    class="text-3xl font-extrabold text-center mb-8 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 animate-bounce-slow">
                    Gestion de locations de box
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($boxes as $box)
                        <div
                            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg float-animation">
                            <img src="https://picsum.photos/800/40{{ rand(0, 9) }}" alt="Image de la box"
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3
                                    class="text-xl font-semibold mb-2 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                                    {{ $box->name }}
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    {{ $box->description }}
                                </p>
                                <p class="text-gray-900 dark:text-gray-100 mb-4">
                                    Adresse: {{ $box->address }}
                                </p>
                                <p class="text-gray-900 dark:text-gray-100 mb-4">
                                    Prix: {{ $box->price }} €
                                </p>
                                <p class="text-gray-900 dark:text-gray-100 mb-4">
                                    Statut: {{ $box->status }}
                                </p>
                                <a href="#"
                                    class="text-blue-600 dark:text-blue-400 hover:underline transition-all duration-300 ease-in-out hover:text-blue-800 dark:hover:text-blue-200">
                                    Réserver
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>

</html>
