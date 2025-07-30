<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    {{-- GTM for head --}}
    @include('layouts.partials.gtm-head')

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

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('assets/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('assets/site.webmanifest') }}">
    <meta name="apple-mobile-web-app-title" content="Mr. EuroFix">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon">

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="font-sans antialiased flex flex-col min-h-screen">
{{-- GTM for body --}}
@include('layouts.partials.gtm-body')
<!-- End Google Tag Manager (noscript) -->
@include('layouts.partials.promo-banner')

<!-- Навигация (общая для всех страниц) -->
<header x-data="{ open: false, dropdownOpen: false }" class="relative z-50">
    <nav class="bg-[#212f42] p-4 fixed top-10 w-full shadow-lg">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo -->
            <a class="flex flex-col" href="{{ route('home') }}">
                <div class="flex items-baseline">
                    <span class="text-brand-orange text-lg font-bold">Mr.</span>
                    <span class="text-white text-lg font-bold">EuroFix</span>
                    <span class="text-xs text-gray-400 ml-1">®</span>
                </div>
                <div class="mt-1">
                    <div class="h-0.5 bg-brand-orange w-full"></div>
                    <div class="text-xs text-gray-400 mt-1">European Quality. American Efficiency.</div>
                </div>
            </a>
            <div class="hidden lg:flex items-center ml-auto mr-6">
                <x-protected-phone
                    encoded="KzE5NDk0MTQ0OTk4"
                    class="text-white hover:text-brand-orange transition-colors"
                />
            </div>
            <!-- Кнопка-переключатель для мобильного меню -->
            <button @click="open = !open" class="lg:hidden text-white focus:outline-none">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'block': !open }" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path :class="{'block': open, 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div
                @click.outside="open = false; dropdownOpen = false"
                class="hidden lg:flex lg:items-center lg:w-auto">
                <ul class="flex flex-col lg:flex-row lg:space-x-6 items-center">
                    <li><a href="{{ route('home') }}"
                           class="block px-4 py-2 lg:p-0 text-white hover:text-blue-300 transition-colors">Home</a></li>
                    <li><a href="#about"
                           class="block px-4 py-2 lg:p-0 text-white hover:text-blue-300 transition-colors">About</a>
                    </li>
                    <!-- Dropdown для услуг (десктоп) -->
                    <li class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                                class="text-white hover:text-blue-300 transition-colors flex items-center">
                            Services
                            <svg class="ml-1 w-4 h-4 transform transition-transform"
                                 :class="{ 'rotate-180': dropdownOpen }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="dropdownOpen" x-transition x-cloak
                             class="absolute left-0 mt-2 w-48 bg-gray-700 rounded-md shadow-lg py-1 z-20">
                            <a href="{{ route('home') }}#services" class="block px-4 py-2 text-white hover:bg-gray-600">All
                                Services</a>
                            <hr class="border-t border-gray-600 my-1">
                            <a href="{{ route('pages.flooring') }}"
                               class="block px-4 py-2 text-white hover:bg-gray-600">Flooring</a>
                            <a href="{{ route('pages.furniture') }}"
                               class="block px-4 py-2 text-white hover:bg-gray-600">Furniture</a>
                            <a href="{{ route('pages.painting') }}"
                               class="block px-4 py-2 text-white hover:bg-gray-600">Painting</a>
                            <a href="{{ route('pages.drywall') }}"
                               class="block px-4 py-2 text-white hover:bg-gray-600">Drywall</a>
                            <a href="{{ route('pages.tile') }}"
                               class="block px-4 py-2 text-white hover:bg-gray-600">Tile</a>
                        </div>
                    </li>
                    <li><a href="{{ route('home') }}#portfolio"
                           class="block px-4 py-2 lg:p-0 text-white hover:text-blue-300 transition-colors">Portfolio</a>
                    </li>
                    <li><a href="{{ route('home') }}#testimonials"
                           class="block px-4 py-2 lg:p-0 text-white hover:text-blue-300 transition-colors">Testimonials</a>
                    </li>
                    <li><a href="#contact"
                           class="block px-4 py-2 lg:p-0 text-white hover:text-blue-300 transition-colors">Contact</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- МОБИЛЬНОЕ МЕНЮ (теперь отдельный блок) -->
        <div x-show="open" x-transition x-cloak
             class="lg:hidden absolute top-full left-0 w-full bg-[#212f42] shadow-xl">
            <ul class="flex flex-col py-4">
                <li class="px-4 py-3">
                    <x-protected-phone
                        encoded="KzE5NDk0MTQ0OTk4"
                        class="text-white"
                    />
                </li>
                <hr class="border-gray-700">
                <li><a href="{{ route('home') }}"
                       class="block px-4 py-3 text-white hover:bg-gray-700 transition-colors">Home</a></li>
                <li><a href="#about" class="block px-4 py-3 text-white hover:bg-gray-700 transition-colors">About</a>
                </li>
                <!-- Dropdown для услуг (мобайл) -->
                <li>
                    <button @click="dropdownOpen = !dropdownOpen"
                            class="w-full text-left px-4 py-3 text-white hover:bg-gray-700 transition-colors flex justify-between items-center">
                        Services
                        <svg class="ml-1 w-4 h-4 transform transition-transform" :class="{ 'rotate-180': dropdownOpen }"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="dropdownOpen" x-collapse class="pl-4 bg-gray-800">
                        <a href="{{ route('home') }}#services" class="block px-4 py-2 text-white hover:bg-gray-600">All
                            Services</a>
                        <a href="{{ route('pages.flooring') }}" class="block px-4 py-2 text-white hover:bg-gray-600">Flooring</a>
                        <a href="{{ route('pages.furniture') }}" class="block px-4 py-2 text-white hover:bg-gray-600">Furniture</a>
                        <a href="{{ route('pages.painting') }}" class="block px-4 py-2 text-white hover:bg-gray-600">Painting</a>
                        <a href="{{ route('pages.drywall') }}" class="block px-4 py-2 text-white hover:bg-gray-600">Drywall</a>
                        <a href="{{ route('pages.tile') }}"
                           class="block px-4 py-2 text-white hover:bg-gray-600">Tile</a>
                    </div>
                </li>
                <li><a href="{{ route('home') }}#portfolio"
                       class="block px-4 py-3 text-white hover:bg-gray-700 transition-colors">Portfolio</a></li>
                <li><a href="{{ route('home') }}#testimonials"
                       class="block px-4 py-3 text-white hover:bg-gray-700 transition-colors">Testimonials</a></li>
                <li><a href="#contact"
                       class="block px-4 py-3 text-white hover:bg-gray-700 transition-colors">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>

<!-- Секция основного контента, которая будет меняться для каждой страницы -->
<!-- ВАЖНО: <main> теперь начинается ПОСЛЕ Hero-секции на главной странице -->
<main @class(['flex-grow', 'pt-28' => !Route::is('home')])>
    {{ $slot }}
</main>

<!-- Contact -->
<section id="contact" class="py-5 text-white bg-[#212529] px-4">
    <div class="container mx-auto">
        <h2 class="text-center text-4xl font-bold mb-3">Contact Me</h2>
        <div class="flex justify-center">
            <div class="w-full md:w-1/2 lg:w-1/3 text-center">

                {{-- Заменяем старый незащищенный блок на наш новый компонент --}}
                <div class="mb-4 flex items-center justify-center">
                    <x-protected-email
                        {{--
                            mail закодированный в Base64.
                            (Как кодировать: в консоли браузера (F12) выполните btoa('name@mail'))
                        --}}
                        encoded="aW5mb0BtcmV1cm9maXguY29t"
                        class="text-orange-500 hover:text-white transition-colors"
                        icon="heroicon-s-envelope" {{-- Используем solid-иконку для акцента --}}
                    />
                </div>

                {{-- Заменяем старый незащищенный блок на наш новый компонент --}}
                <div class="mb-4 flex items-center justify-center">
                    <x-protected-phone
                        encoded="KzE5NDk0MTQ0OTk4"
                        class="text-orange-500 hover:text-white transition-colors"
                        icon="heroicon-s-phone" {{-- Используем solid-иконку для акцента --}}
                    />
                </div>
                <p class="mb-4 flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2" fill="green" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Orange County, California
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-blue-200 text-center py-6">
    <p>&copy; {{ date('Y') }} Mr. EuroFix. All rights reserved.</p>
</footer>
</body>
</html>
