<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mr. EuroFix - Handyman Services in Orange County')</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
          content="@yield('description', 'Professional handyman services in Orange County. Expert in plumbing, electrical, carpentry, tile, and drywall. Reliable, affordable, and friendly.')">
    <meta name="keywords"
          content="@yield('keywords', 'handyman, Orange County, plumbing, electrical, drywall, tile, home repair, Mr. EuroFix')">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og:title', 'Mr. EuroFix - Handyman Services in Orange County')">
    <meta property="og:description"
          content="@yield('og:description', 'Your go-to expert for home repairs. Plumbing, electrical, tile, drywall, and more. Get a free quote today!')">
    <meta property="og:image" content="{{ asset('assets/og-image.jpg') }}">
    <meta property="og:url" content="@yield('og:url', 'https://www.mreurofix.com')">
    <meta property="og:type" content="website">

    <!-- Наиболее предпочтительный формат: SVG для современных браузеров -->
    <link rel="icon" href="{{ asset('assets/favicon.svg') }}" type="image/svg+xml">
    <!-- PNG-версия как запасной вариант -->
    <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
    <!-- Иконка для устройств Apple -->
    <link rel="apple-touch-icon" href="{{ asset('assets/apple-touch-icon.png') }}">
    <!-- Манифест для PWA и Android -->
    <link rel="manifest" href="{{ asset('assets/site.webmanifest') }}">
    <!-- Название для веб-приложения на Apple -->
    <meta name="apple-mobile-web-app-title" content="Mr. EuroFix">

    <link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon">

    <!-- Vite CSS & JS for modern asset bundling -->
    <!-- Здесь Vite будет инжектировать скомпилированный CSS (с Tailwind) и JS (с Alpine.js) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- x-cloak используется Alpine.js, чтобы скрыть элементы до инициализации JS -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="font-sans antialiased flex flex-col min-h-screen">
<!-- Навигация (общая для всех страниц) -->
<!-- x-data="{ open: false }" инициализирует компонент Alpine.js с состоянием 'open' для мобильного меню -->
<header x-data="{ open: false }" class="relative z-50">
    <nav class="bg-[#212f42] p-4 fixed top-0 w-full shadow-lg">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo -->
            {{--
                Главный контейнер теперь 'flex-col', чтобы расположить дочерние элементы
                (название и слоган) друг под другом.
            --}}
            <a class="flex flex-col" href="{{ route('home') }}">

                {{-- Первый элемент: Основное название. Используем 'items-baseline' для
                     идеального выравнивания текста разного размера. --}}
                <div class="flex items-baseline">
                    <span class="text-brand-orange text-2xl font-bold">Mr.</span>
                    <span class="text-white text-2xl font-bold">EuroFix</span>
                    <span class="text-xs text-gray-400 ml-1">®</span>
                </div>

                {{-- Второй элемент: Линия и слоган. Небольшой отступ сверху. --}}
                <div class="mt-1">
                    <div class="h-0.5 bg-brand-orange w-full"></div>
                    <div class="text-sm text-gray-400 mt-1">European Quality. American Efficiency.</div>
                </div>
            </a>


            <!-- Кнопка-переключатель для мобильного меню -->
            <!-- @click="open = !open" переключает состояние 'open' при клике -->
            <button @click="open = !open" class="lg:hidden text-white focus:outline-none">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Основное навигационное меню -->
            <!-- x-cloak предотвращает мигание до загрузки Alpine.js -->
            <!-- :class динамически применяет классы hidden/flex для адаптивности -->
            <!-- @click.outside="open = false" закрывает меню при клике вне его -->
            <div x-cloak :class="{ 'block': open, 'hidden': !open }" @click.outside="open = false"
                 class="absolute top-full left-0 w-full bg-[#212f42] lg:static lg:block lg:w-auto lg:shadow-none shadow-xl
                        transform origin-top transition-transform ease-out duration-300 scale-y-0 lg:scale-y-100"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-y-0"
                 x-transition:enter-end="opacity-100 transform scale-y-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-y-100"
                 x-transition:leave-end="opacity-0 transform scale-y-0"
            >
                <ul class="flex flex-col lg:flex-row lg:space-x-6 py-4 lg:py-0">
                    <li class="px-4 py-2 lg:p-0"><a
                            class="text-white hover:text-blue-300 transition-colors duration-200"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="px-4 py-2 lg:p-0"><a
                            class="text-white hover:text-blue-300 transition-colors duration-200"
                            href="#about">About</a></li>

                    <!-- Dropdown для услуг -->
                    <!-- x-data="{ dropdownOpen: false }" для управления состоянием дропдауна -->
                    <li x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false"
                        class="relative px-4 py-2 lg:p-0">
                        <a @click="dropdownOpen = !dropdownOpen"
                           class="text-white hover:text-blue-300 transition-colors duration-200 flex items-center cursor-pointer"
                           id="navbarDropdownServices" role="button">
                            Services
                            <svg class="ml-1 w-4 h-4 transform transition-transform duration-200"
                                 :class="{ 'rotate-180': dropdownOpen }" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <!-- Выпадающее меню -->
                        <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute lg:top-full lg:left-0 mt-2 w-full lg:w-48 bg-gray-700 rounded-md shadow-lg py-1 z-20"
                             x-cloak
                        >
                            <a href="{{ route('home') }}#services"
                               class="block px-4 py-2 text-white hover:bg-gray-600 transition-colors duration-200">All
                                Services</a>
                            <hr class="border-t border-gray-600 my-1">
                            <a class="block px-4 py-2 text-white hover:bg-gray-600 transition-colors duration-200"
                               href="{{ route('pages.flooring') }}">Flooring</a>
                            <a class="block px-4 py-2 text-white hover:bg-gray-600 transition-colors duration-200"
                               href="{{ route('pages.furniture') }}">Furniture</a>
                            <a class="block px-4 py-2 text-white hover:bg-gray-600 transition-colors duration-200"
                               href="{{ route('pages.painting') }}">Painting</a>
                        </div>
                    </li>
                    <li class="px-4 py-2 lg:p-0"><a
                            class="text-white hover:text-blue-300 transition-colors duration-200" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="px-4 py-2 lg:p-0"><a
                            class="text-white hover:text-blue-300 transition-colors duration-200"
                            href="#testimonials">Testimonials</a>
                    </li>
                    <li class="px-4 py-2 lg:p-0"><a
                            class="text-white hover:text-blue-300 transition-colors duration-200" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<!-- Секция основного контента, которая будет меняться для каждой страницы -->
<main class="mt-10 flex-grow"> <!-- Добавлен верхний отступ, чтобы контент не перекрывался фиксированным навбаром -->
    {{ $slot }}
</main>


<!-- Footer -->
<footer class="bg-gray-900 text-white text-center py-6">
    <p>&copy; 2025 Mr. EuroFix. All rights reserved.</p>
</footer>
</body>
</html>

