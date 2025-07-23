<x-guest-layout>
    {{-- SEO и OpenGraph мета-теги для страницы --}}
    @section('title', 'Drywall Services in Orange County | Mr. EuroFix')
    @section('description', 'Showroom-quality drywall repair services in Orange County. We deliver flawless finishes, meticulous prep work, and guaranteed satisfaction.')
    @section('keywords', 'drywall repair, handyman Orange County, painter, drywall contractor')
    @section('og:title', 'Expert Painting & Drywall Services | Mr. EuroFix')
    @section('og:description', 'Increase your home\'s value and beauty with our expert drywall services. Mr. EuroFix delivers showroom-quality results for homes across Orange County.')
    @section('og:url', route('pages.drywall'))

    <div class="bg-slate-50">
        <div class="container mx-auto px-4 py-8">

            <!-- Hero Section -->
            <section class="text-center py-16 px-6 bg-white rounded-lg shadow-xl mb-16">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Perfect Walls, Perfect Results Every
                    Time</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Get flawless walls and ceilings with our expert drywall installation and repair services. Mr.
                    EuroFix delivers <span class="font-semibold text-orange-700">professional drywall solutions</span>
                    that prepare your home for the perfect finish across
                    Orange County.
                </p>
                <a href="#freeOnlineEstimate"
                   class="mt-8 inline-block bg-orange-600 text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-gray-500 transition transform hover:scale-105 shadow-lg">
                    Get a Free Quote
                </a>
            </section>

            <!-- Section "Specializing" -->
            <section class="mb-12 p-8 bg-white rounded-lg shadow-lg">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="order-2 md:order-1">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Expert Drywall & Handyman Services in Orange
                            County, CA</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Our experienced team provides complete drywall installation, repair, and finishing services
                            throughout Orange County. From small patches and hole repairs to full room installations, we
                            deliver smooth, even surfaces ready for paint or wallpaper.
                        </p>
                        <p class="text-gray-700 leading-relaxed">
                            We specialize in drywall hanging, taping, mudding, and texturing, ensuring seamless joints
                            and professional-grade finishes. Whether you're dealing with cracks, water damage, or need
                            new construction drywall, our skilled handymen use industry-leading techniques and materials
                            to restore your walls to perfection. Every project includes thorough cleanup and surface
                            preparation for your final finish.
                        </p>
                    </div>
                    <div class="order-1 md:order-2">
                        <img src="{{ asset('assets/img/drywall/drywall_services.jpeg') }}"
                             alt="Handyman installing laminate flooring" class="w-full h-auto rounded-lg shadow-md"
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400/F0F0F0/333333?text=Image+Not+Found';">
                    </div>
                </div>
            </section>

            <!-- Галерея с модальным окном -->
            <section class="mb-12 p-8 bg-white rounded-lg shadow-lg" x-data="{ open: false, currentImage: '' }">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Flooring Work in Action</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Изображение 1 -->
                    <div class="cursor-pointer group"
                         @click="open = true; currentImage = '{{ asset('assets/img/drywall/drywall-partition-construction-orange-county.jpg') }}'">
                        <div class="overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('assets/img/drywall/drywall-partition-construction-orange-county.jpg') }}"
                                 alt="Drywall partition installation in Orange County by Mr. EuroFix"
                                 class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300"
                                 onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=Image+Not+Found';">
                        </div>
                        <p class="mt-3 text-center text-gray-600">Professional drywall partition construction for home renovation in Orange County</p>
                    </div>
                    <!-- Изображение 2 -->
                    <div class="cursor-pointer group"
                         @click="open = true; currentImage = '{{ asset('') }}'">
                        <div class="overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('') }}"
                                 alt="**"
                                 class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300"
                                 onerror="this.onerror=null;this.src='https://placehold.co/600x400/D0D0D0/333333?text=Image+Not+Found';">
                        </div>
                        <p class="mt-3 text-center text-gray-600"></p>
                    </div>
                    <!-- Изображение 3 -->
                    <div class="cursor-pointer group"
                         @click="open = true; currentImage = '{{ asset('') }}'">
                        <div class="overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('') }}" alt="***"
                                 class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300"
                                 onerror="this.onerror=null;this.src='https://placehold.co/600x400/C0C0C0/333333?text=Image+Not+Found';">
                        </div>
                        <p class="mt-3 text-center text-gray-600"></p>
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
                        <img :src="currentImage" alt="Zoomed Image"
                             class="max-w-full max-h-[90vh] rounded-lg shadow-xl">
                    </div>
                </div>
            </section>

            <!-- Why Choose Us Section -->
{{--            <section class="mb-16">--}}
{{--                <h2 class="text-center text-3xl font-bold text-gray-800 mb-12">Your Best Choice for Painting & Drywall--}}
{{--                    in OC</h2>--}}
{{--                <div class="grid md:grid-cols-3 gap-8 text-center">--}}
{{--                    <!-- Card 1: Licensed -->--}}
{{--                    <div class="p-8 bg-white rounded-lg shadow-lg">--}}
{{--                        <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-blue-100 rounded-full">--}}
{{--                            <!-- Inline SVG Icon for a check/shield -->--}}
{{--                            <x-heroicon-c-shield-exclamation />--}}
{{--                        </div>--}}
{{--                        <h3 class="text-xl font-semibold text-gray-800">Licensed & Insured</h3>--}}
{{--                        <p class="mt-2 text-gray-600">Work with confidence knowing you're fully protected. We are a--}}
{{--                            professional, licensed, and insured service provider.</p>--}}
{{--                    </div>--}}
{{--                    <!-- Card 2: Quality -->--}}
{{--                    <div class="p-8 bg-white rounded-lg shadow-lg">--}}
{{--                        <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-green-100 rounded-full">--}}
{{--                            <!-- Inline SVG Icon for an award/ribbon -->--}}
{{--                            <svg class="h-10 w-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"--}}
{{--                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <h3 class="text-xl font-semibold text-gray-800">Quality Materials</h3>--}}
{{--                        <p class="mt-2 text-gray-600">We use only high-quality paints and materials from trusted brands--}}
{{--                            to ensure a durable, long-lasting, and beautiful finish.</p>--}}
{{--                    </div>--}}
{{--                    <!-- Card 3: Satisfaction -->--}}
{{--                    <div class="p-8 bg-white rounded-lg shadow-lg">--}}
{{--                        <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-indigo-100 rounded-full">--}}
{{--                            <!-- Inline SVG Icon for stars -->--}}
{{--                            <svg class="h-10 w-10 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"--}}
{{--                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                      d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 21.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <h3 class="text-xl font-semibold text-gray-800">Satisfaction Guaranteed</h3>--}}
{{--                        <p class="mt-2 text-gray-600">Our job isn't done until you are 100% happy with the result. We--}}
{{--                            pride ourselves on meticulous work and clean job sites.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}

            <!-- Services Section -->
            <section class="mb-16 p-8 bg-white rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Drywall & Painting Solutions</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Drywall Card -->
                    <div class="p-8 bg-slate-50 rounded-lg shadow-md">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <x-heroicon-o-light-bulb class="w-5 h-5 text-orange-600 mr-2 flex-shrink-0"/>
                            Drywall Services
                        </h3>
                        <p class="text-gray-600 mb-4">From minor fixes to new installations, we create perfectly smooth
                            surfaces ready for paint.</p>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                Hole & Crack Patching
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                Water Damage Repair
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                New Drywall Installation
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                Texture Matching & Finishing
                            </li>
                        </ul>
                    </div>
                    <!-- Painting Card -->
                    <div class="p-8 bg-slate-50 rounded-lg shadow-md">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg class="h-7 w-7 text-blue-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.158-.158.348-.237.538-.237.19 0 .38.079.538.237l2.88 2.88c.158.158.237.348.237.538 0 .19-.079.38-.237.538l-2.88 2.88c-.158.158-.348.237-.538.237a.75.75 0 01-.538-.237L10.5 8.197z"/>
                            </svg>
                            Interior Painting Services
                        </h3>
                        <p class="text-gray-600 mb-4">Give your home a stunning refresh with sharp lines and a perfect,
                            even coat.</p>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                Walls, Ceilings & Trim Painting
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                Cabinet & Door Painting
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                Accent Walls
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                Meticulous Prep & Cleanup
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Before and After Gallery with Alpine.js -->
            <section class="mb-16 p-8 bg-white rounded-lg shadow-lg" x-data="{ view: 'before' }">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">See the Difference We Make</h2>
                <div class="relative max-w-4xl mx-auto">
                    <!-- Image container with transition -->
                    <div class="relative w-full aspect-video rounded-lg overflow-hidden shadow-xl">
                        <img x-show="view === 'before'" src="https://placehold.co/800x450/e2e8f0/94a3b8?text=Before"
                             alt="A room before painting and drywall repair"
                             class="absolute inset-0 w-full h-full object-cover"
                             x-transition:enter="transition ease-in-out duration-500"
                             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <img x-show="view === 'after'" src="https://placehold.co/800x450/3b82f6/ffffff?text=After"
                             alt="A room after professional painting"
                             class="absolute inset-0 w-full h-full object-cover"
                             x-transition:enter="transition ease-in-out duration-500"
                             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-cloak>
                    </div>
                    <!-- Toggle Switch -->
                    <div
                        class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center p-1 bg-gray-800 bg-opacity-50 rounded-full">
                        <button @click="view = 'before'"
                                :class="{ 'bg-white text-gray-800': view === 'before', 'text-white': view !== 'before' }"
                                class="px-6 py-2 text-sm font-semibold rounded-full transition">Before
                        </button>
                        <button @click="view = 'after'"
                                :class="{ 'bg-white text-gray-800': view === 'after', 'text-white': view !== 'after' }"
                                class="px-6 py-2 text-sm font-semibold rounded-full transition">After
                        </button>
                    </div>
                </div>
            </section>

            <!-- Final CTA with Estimate Form -->
            <section id="estimate" class="py-16 bg-slate-100 rounded-lg">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                            Ready for a Flawless Home?
                        </h2>
                        <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">
                            Don't settle for less than perfect. Fill out the form below to get a free, no-obligation
                            estimate for your painting or drywall project.
                        </p>
                    </div>
                    {{-- Вставляем компонент формы прямо сюда --}}
                    <x-estimate-form/>
                </div>
            </section>

        </div>
    </div>
</x-guest-layout>
