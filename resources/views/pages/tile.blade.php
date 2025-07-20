<x-guest-layout>
    {{-- SEO и OpenGraph мета-теги для страницы --}}
    @section('title', 'Expert Flooring Services in Orange County | Mr. EuroFix')
    @section('description', 'Professional handyman flooring services in Orange County. Mr. EuroFix specializes in laminate and vinyl floor installation, repair, and maintenance.')
    @section('keywords', 'flooring handyman, floor repair, flooring installers, laminate flooring, vinyl flooring, Orange County')
    @section('og:title', 'Expert Flooring Services | Mr. EuroFix')
    @section('og:description', 'Top-tier flooring solutions, from meticulous handyman floor repair to complete installations in Orange County.')
    @section('og:url', route('pages.flooring')) {{-- Используем именованный роут --}}

    <div class="container mx-auto px-4 py-8">
        <!-- Hero Section с анимацией появления -->
        <section class="text-center py-12 px-6 bg-white rounded-lg shadow-lg mb-12"
                 x-data="{ show: false }"
                 x-init="setTimeout(() => show = true, 100)">
            <div x-show="show"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 transform translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    Transform Your Home with Expert Tile Installation
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Elevate your space with stunning, durable tile work that adds lasting value and beauty to your home.
                    Mr. EuroFix delivers <span class="font-semibold text-orange-600">premium tile installation and repair services</span>
                    for homes across Orange County.

                </p>
            </div>
        </section>

        <!-- Services Section -->
        <section class="mb-12 p-8 bg-white rounded-lg shadow-lg">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Professional Tile Installation Services in Orange
                        County, CA</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Our skilled craftsmen provide comprehensive tile installation and repair services throughout
                        Orange County. Specializing in kitchens, bathrooms, flooring, and backsplashes, we combine
                        precision workmanship with premium materials to create beautiful, long-lasting results.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        From ceramic and porcelain to natural stone and luxury vinyl tile, we handle every project with
                        meticulous attention to detail. Whether you're renovating a single bathroom or tiling an entire
                        home, our experienced team ensures perfect alignment, proper waterproofing, and flawless grout
                        work that stands the test of time.
                    </p>
                </div>
                <div class="order-1 md:order-2">
                    <img src="{{ asset('assets/img/tile/tile_sevices.jpg') }}"
                         alt="Handyman installing laminate flooring" class="w-full h-auto rounded-lg shadow-md"
                         onerror="this.onerror=null;this.src='https://placehold.co/600x400/F0F0F0/333333?text=Image+Not+Found';">
                </div>
            </div>
        </section>

        <!-- Секция "Решения" с интерактивными карточками -->
        <section class="mb-12 p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Comprehensive Flooring Solutions</h2>
            <div class="grid md:grid-cols-3 gap-8 text-center" x-data="{ hoveredCard: null }">
                <!-- Карточка 1 -->
                <div class="p-6 rounded-lg transition-all duration-300"
                     :class="{ 'bg-blue-50 transform -translate-y-2 shadow-xl': hoveredCard === 1, 'bg-gray-50 shadow-md': hoveredCard !== 1 }"
                     @mouseenter="hoveredCard = 1" @mouseleave="hoveredCard = null">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Laminate Flooring Expertise</h3>
                    <p class="text-gray-600">Looking for durable and stylish <span class="font-semibold">laminate flooring</span>?
                        We provide complete installation services, ensuring a perfect fit and a beautiful finish.</p>
                </div>
                <!-- Карточка 2 -->
                <div class="p-6 rounded-lg transition-all duration-300"
                     :class="{ 'bg-blue-50 transform -translate-y-2 shadow-xl': hoveredCard === 2, 'bg-gray-50 shadow-md': hoveredCard !== 2 }"
                     @mouseenter="hoveredCard = 2" @mouseleave="hoveredCard = null">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Vinyl Flooring Installation & Repair</h3>
                    <p class="text-gray-600"><span class="font-semibold">Vinyl flooring</span> is a versatile and
                        resilient choice. Our services ensure a smooth, professional application.</p>
                </div>
                <!-- Карточка 3 -->
                <div class="p-6 rounded-lg transition-all duration-300"
                     :class="{ 'bg-blue-50 transform -translate-y-2 shadow-xl': hoveredCard === 3, 'bg-gray-50 shadow-md': hoveredCard !== 3 }"
                     @mouseenter="hoveredCard = 3" @mouseleave="hoveredCard = null">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">General Floor Repair & Installation</h3>
                    <p class="text-gray-600">Beyond laminate and vinyl, our <span class="font-semibold">handyman floor repair</span>
                        services cover a wide array of general flooring issues.</p>
                </div>
            </div>
        </section>

        <!-- Галерея с модальным окном -->
        <section class="mb-12 p-8 bg-white rounded-lg shadow-lg" x-data="{ open: false, currentImage: '' }">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Flooring Work in Action</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Изображение 1 -->
                <div class="cursor-pointer group"
                     @click="open = true; currentImage = '{{ asset('assets/img/flooring/flooring-by-door.jpg') }}'">
                    <div class="overflow-hidden rounded-lg shadow-md">
                        <img src="{{ asset('assets/img/flooring/flooring-by-door.jpg') }}"
                             alt="Finished laminate flooring installation"
                             class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300"
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=Image+Not+Found';">
                    </div>
                    <p class="mt-3 text-center text-gray-600">Seamless laminate floor installation.</p>
                </div>
                <!-- Изображение 2 -->
                <div class="cursor-pointer group"
                     @click="open = true; currentImage = '{{ asset('assets/img/flooring/door-opening-floor.jpg') }}'">
                    <div class="overflow-hidden rounded-lg shadow-md">
                        <img src="{{ asset('assets/img/flooring/door-opening-floor.jpg') }}" alt="Vinyl planks repair"
                             class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300"
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400/D0D0D0/333333?text=Image+Not+Found';">
                    </div>
                    <p class="mt-3 text-center text-gray-600">Detail of vinyl flooring repair.</p>
                </div>
                <!-- Изображение 3 -->
                <div class="cursor-pointer group"
                     @click="open = true; currentImage = '{{ asset('assets/img/flooring/door-trim.jpg') }}'">
                    <div class="overflow-hidden rounded-lg shadow-md">
                        <img src="{{ asset('assets/img/flooring/door-trim.jpg') }}" alt="Newly installed flooring"
                             class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300"
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400/C0C0C0/333333?text=Image+Not+Found';">
                    </div>
                    <p class="mt-3 text-center text-gray-600">Close-up of newly installed flooring.</p>
                </div>
            </div>

            <!-- Модальное окно для изображений -->
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4 z-50" x-cloak
                 @click.outside="open = false">
                <div class="relative max-w-4xl max-h-full">
                    <button @click="open = false"
                            class="absolute -top-4 -right-4 text-white text-3xl p-2 rounded-full bg-gray-800 hover:bg-gray-700 focus:outline-none">
                        &times;
                    </button>
                    <img :src="currentImage" alt="Zoomed Image" class="max-w-full max-h-[90vh] rounded-lg shadow-xl">
                </div>
            </div>
        </section>

        <section id="estimate" class="py-16 bg-slate-50 rounded-lg">
            <div class="container mx-auto px-4">
                {{-- Заголовок для секции с формой --}}
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                        Get Your Free Flooring Estimate Now
                    </h2>
                    <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">
                        Ready to transform your floors? Fill out the form below to get started.
                    </p>
                </div>

                {{-- Здесь мы вставляем ваш компонент формы --}}
                <x-estimate-form/>
            </div>
        </section>
    </div>
</x-guest-layout>
