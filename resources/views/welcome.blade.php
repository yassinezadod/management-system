<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Web de Gestion de Stock - Yassine Zadod</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white">
    <!-- Section de connexion et inscription -->
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Section 1: Introduction du projet -->
            <a href="#" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>
                    <div class="h-16 w-16 bg-green-50 dark:bg-green-800/20 flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-green-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                    </div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Application Web de Gestion de Stock</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        L'Application Web de Gestion de Stock est un outil moderne conçu pour gérer efficacement les stocks d'une entreprise. Elle permet de suivre les produits, les quantités disponibles, les ajouts et les sorties de stocks en temps réel, tout en assurant une gestion optimale des ressources.
                    </p>
                </div>
            </a>

            <!-- Section 2: Fonctionnalités -->
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>
                    <div class="h-16 w-16 bg-blue-50 dark:bg-blue-800/20 flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v3M5 3h3M5 3v3m14-3v3M19 3h-3m3 3V3m0 3h3M5 18h3m-3 0v-3m0 3h3m14-3v3m0-3h-3m0 3h3m-7 0h-7m7 0V9m0 0h-7m7-3v6m0 0h-7" />
                        </svg>
                    </div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Fonctionnalités Principales</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        Cette application offre plusieurs fonctionnalités pour la gestion des stocks, telles que :
                        <ul class="list-disc pl-5 mt-3">
                            <li>Suivi des produits et de leurs quantités en temps réel</li>
                            <li>Ajout, modification et suppression des articles de stock</li>
                            <li>Suivi des entrées et sorties de stocks</li>
                            <li>Alertes automatiques en cas de faible stock</li>
                            <li>Gestion des catégories de produits</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>

        <!-- Section 3: À propos de l'auteur -->
        <div class="mt-12 text-center">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">À propos de l'auteur</h2>
            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                Ce projet a été réalisé par <strong>Yassine Zadod</strong>, développeur Full Stack, dans le cadre de l'amélioration de la gestion des stocks pour les entreprises. Il a été conçu en utilisant les technologies modernes telles que laravel 11, vue js et vite, MySQL pour offrir une expérience utilisateur optimale.
            </p>
        </div>

        <!-- Section 4: Sponsor et Footer -->
        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                <div class="flex items-center gap-4">
                    <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        Sponsor
                    </a>
                </div>
            </div>

            <div class="flex text-sm text-gray-500 dark:text-gray-400">
                <p>© 2024 Yassine Zadod</p>
            </div>
        </div>
    </div>
</body>

</html>
