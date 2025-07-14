<x-guest-layout>
    {{-- SEO и OpenGraph мета-теги для страницы --}}
    @section('title', 'Painting & Drywall Services in Orange County | Mr. EuroFix')
    @section('description', 'Showroom-quality interior painting and drywall repair services in Orange County. We deliver flawless finishes, meticulous prep work, and guaranteed satisfaction.')
    @section('keywords', 'interior painting, drywall repair, handyman Orange County, painter, drywall contractor')
    @section('og:title', 'Expert Painting & Drywall Services | Mr. EuroFix')
    @section('og:description', 'Increase your home\'s value and beauty with our expert drywall and painting services. Mr. EuroFix delivers showroom-quality results for homes across Orange County.')
    @section('og:url', route('pages.painting')) {{-- Используем именованный роут --}}

    <div class="bg-slate-50">
        <div class="container mx-auto px-4 py-8">

            <!-- Hero Section -->
            <section class="text-center py-16 px-6 bg-white rounded-lg shadow-xl mb-16">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    Transform Your Home with a Flawless Finish
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Increase your home's value and beauty with our expert drywall and painting services. Mr. EuroFix delivers <span class="font-semibold text-blue-600">showroom-quality results</span> for homes across Orange County.
                </p>
            </section>

            <!-- Why Choose Us Section -->
            <section class="mb-16">
                <h2 class="text-center text-3xl font-bold text-gray-800 mb-12">Your Best Choice for Painting & Drywall in OC</h2>
                <div class="grid md:grid-cols-3 gap-8 text-center">
                    <!-- Card 1: Licensed -->
                    <div class="p-8 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-blue-100 rounded-full">
                            <!-- Inline SVG Icon for a check/shield -->
                            <svg class="h-10 w-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.6-3.75M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Licensed & Insured</h3>
                        <p class="mt-2 text-gray-600">Work with confidence knowing you're fully protected. We are a professional, licensed, and insured service provider.</p>
                    </div>
                    <!-- Card 2: Quality -->
                    <div class="p-8 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-green-100 rounded-full">
                            <!-- Inline SVG Icon for an award/ribbon -->
                            <svg class="h-10 w-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Quality Materials</h3>
                        <p class="mt-2 text-gray-600">We use only high-quality paints and materials from trusted brands to ensure a durable, long-lasting, and beautiful finish.</p>
                    </div>
                    <!-- Card 3: Satisfaction -->
                    <div class="p-8 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-indigo-100 rounded-full">
                            <!-- Inline SVG Icon for stars -->
                            <svg class="h-10 w-10 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 21.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Satisfaction Guaranteed</h3>
                        <p class="mt-2 text-gray-600">Our job isn't done until you are 100% happy with the result. We pride ourselves on meticulous work and clean job sites.</p>
                    </div>
                </div>
            </section>

            <!-- Services Section -->
            <section class="mb-16 p-8 bg-white rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Drywall & Painting Solutions</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Drywall Card -->
                    <div class="p-8 bg-slate-50 rounded-lg shadow-md">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg class="h-7 w-7 text-blue-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19 14.5M12 14.5v5.714c0 .597.237 1.17.659 1.591L17.25 21M12 14.5c-.606 0-1.153.24-1.563.638L5 21M12 14.5v-5.714c0-.597-.237-1.17-.659-1.591L6.75 6.096M12 14.5c.606 0 1.153.24 1.563.638L19 21m-7-6.5v-5.714c0-.597.237-1.17.659-1.591L17.25 6.096" /></svg>
                            Drywall Services
                        </h3>
                        <p class="text-gray-600 mb-4">From minor fixes to new installations, we create perfectly smooth surfaces ready for paint.</p>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-center"><svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Hole & Crack Patching</li>
                            <li class="flex items-center"><svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Water Damage Repair</li>
                            <li class="flex items-center"><svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>New Drywall Installation</li>
                            <li class="flex items-center"><svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Texture Matching & Finishing</li>
                        </ul>
                    </div>
                    <!-- Painting Card -->
                    <div class="p-8 bg-slate-50 rounded-lg shadow-md">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg class="h-7 w-7 text-blue-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.158-.158.348-.237.538-.237.19 0 .38.079.538.237l2.88 2.88c.158.158.237.348.237.538 0 .19-.079.38-.237.538l-2.88 2.88c-.158.158-.348.237-.538.237a.75.75 0 01-.538-.237L10.5 8.197z" /></svg>
                            Interior Painting Services
                        </h3>
                        <p class="text-gray-600 mb-4">Give your home a stunning refresh with sharp lines and a perfect, even coat.</p>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-center"><svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Walls, Ceilings & Trim Painting</li>
                            <li class="flex items-center"><svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Cabinet & Door Painting</li>
                            <li class="flex items-center"><svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Accent Walls</li>
                            <li class="flex items-center"><svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Meticulous Prep & Cleanup</li>
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
                        <img x-show="view === 'before'" src="https://placehold.co/800x450/e2e8f0/94a3b8?text=Before" alt="A room before painting and drywall repair" class="absolute inset-0 w-full h-full object-cover" x-transition:enter="transition ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <img x-show="view === 'after'" src="https://placehold.co/800x450/3b82f6/ffffff?text=After" alt="A room after professional painting" class="absolute inset-0 w-full h-full object-cover" x-transition:enter="transition ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-cloak>
                    </div>
                    <!-- Toggle Switch -->
                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center p-1 bg-gray-800 bg-opacity-50 rounded-full">
                        <button @click="view = 'before'" :class="{ 'bg-white text-gray-800': view === 'before', 'text-white': view !== 'before' }" class="px-6 py-2 text-sm font-semibold rounded-full transition">Before</button>
                        <button @click="view = 'after'" :class="{ 'bg-white text-gray-800': view === 'after', 'text-white': view !== 'after' }" class="px-6 py-2 text-sm font-semibold rounded-full transition">After</button>
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
                            Don't settle for less than perfect. Fill out the form below to get a free, no-obligation estimate for your painting or drywall project.
                        </p>
                    </div>
                    {{-- Вставляем компонент формы прямо сюда --}}
                    <x-estimate-form />
                </div>
            </section>

        </div>
    </div>
</x-guest-layout>
