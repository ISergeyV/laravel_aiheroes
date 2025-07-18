<x-guest-layout>
    {{-- SEO and OpenGraph meta tags for the page --}}
    @section('title', 'Expert Furniture Handyman in Orange County | Mr. EuroFix')
    @section('description', 'Professional furniture assembly, repair, and installation services in Orange County. We handle IKEA, Wayfair, and more. Get a free quote!')
    @section('keywords', 'furniture assembly, furniture repair, handyman Orange County, IKEA assembly, Wayfair assembly')
    @section('og:title', 'Expert Furniture Handyman Services | Mr. EuroFix')
    @section('og:description', 'Tired of wobbly tables and confusing manuals? Mr. EuroFix offers expert furniture assembly, repair, and installation in Orange County.')
    @section('og:url', route('pages.furniture')) {{-- Using a named route --}}

    <div class="bg-slate-50">
        <div class="container mx-auto px-4 py-8">

            <!-- Hero Section -->
            <section class="text-center py-16 px-6 bg-white rounded-lg shadow-xl mb-16">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    Expert Furniture Handyman in <span class="text-orange-700">Orange County</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Assembly, Repair & Installation You Can Trust. Tired of wobbly tables and confusing manuals? Mr.
                    EuroFix is your solution!
                </p>
                <p class="mt-4 text-xl text-gray-700 font-semibold">
                    European Quality. American Efficiency.
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
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Furniture Assembly Services in Orange County,
                            CA</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            As trusted <span class="font-semibold">handyman furniture assembly</span> experts in Orange County, we specialize in assembling
                            all types of furniture with speed, accuracy, and care. From flat-pack systems to custom
                            pieces, we ensure each item is securely built and properly positioned—ready to use and built
                            to last.
                        </p>
                        <p class="text-gray-700 leading-relaxed">
                            Our service includes everything from unpacking and setup to final adjustments and cleanup.
                            Whether you're furnishing a new space or replacing old pieces, we bring the tools,
                            experience, and attention to detail to make sure your furniture is safe, stable, and
                            perfectly assembled.
                        </p>
                    </div>
                    <div class="order-1 md:order-2">
                        <img src="{{ asset('assets/img/furniture/furniture-assembly-service.jpg') }}"
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
                         @click="open = true; currentImage = '{{ asset('assets/img/furniture/diy_whiteboard_wall_mount.jpg') }}'">
                        <div class="overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('assets/img/furniture/diy_whiteboard_wall_mount.jpg') }}"
                                 alt="Finished laminate flooring installation"
                                 class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300"
                                 onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=Image+Not+Found';">
                        </div>
                        <p class="mt-3 text-center text-gray-600">Assembling a wall-mounted marker board.</p>
                    </div>
                    <!-- Изображение 2 -->
                    <div class="cursor-pointer group"
                         @click="open = true; currentImage = '{{ asset('assets/img/furniture/outdoor_furniture_assembly.jpg') }}'">
                        <div class="overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('assets/img/furniture/outdoor_furniture_assembly.jpg') }}"
                                 alt="Vinyl planks repair"
                                 class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300"
                                 onerror="this.onerror=null;this.src='https://placehold.co/600x400/D0D0D0/333333?text=Image+Not+Found';">
                        </div>
                        <p class="mt-3 text-center text-gray-600">Assembling outdoor patio furniture.</p>
                    </div>
                    <!-- Изображение 3 -->
                    <div class="cursor-pointer group"
                         @click="open = true; currentImage = '{{ asset('assets/img/furniture/bar-cabinet-assembly-with-lighting.jpg') }}'">
                        <div class="overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('assets/img/furniture/bar-cabinet-assembly-with-lighting.jpg') }}" alt="Newly installed flooring"
                                 class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300"
                                 onerror="this.onerror=null;this.src='https://placehold.co/600x400/C0C0C0/333333?text=Image+Not+Found';">
                        </div>
                        <p class="mt-3 text-center text-gray-600">Assembling a bar cabinet with built-in lighting.</p>
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
            <section class="mb-16">
                <h2 class="text-center text-3xl font-bold text-gray-800 mb-12">Why Choose Mr. EuroFix?</h2>
                <div class="grid md:grid-cols-3 gap-8 text-center">
                    <!-- Card 1: Expertise -->
                    <div class="p-8 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-blue-100 rounded-full">
                            <!-- Inline SVG Icon for Location -->
                            <svg class="h-10 w-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Local OC Expertise</h3>
                        <p class="mt-2 text-gray-600">We're part of your community, understanding local needs and
                            dedicated to serving our Orange County neighbors.</p>
                    </div>
                    <!-- Card 2: Quality -->
                    <div class="p-8 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-green-100 rounded-full">
                            <!-- Inline SVG Icon for Star -->
                            <svg class="h-10 w-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 21.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Quality & Efficiency</h3>
                        <p class="mt-2 text-gray-600">Our promise: meticulous attention to detail, careful handling, and
                            respect for your time.</p>
                    </div>
                    <!-- Card 3: Experience -->
                    <div class="p-8 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-indigo-100 rounded-full">
                            <!-- Inline SVG Icon for Tools -->
                            <svg class="h-10 w-10 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-4.243-4.243l3.275-3.275a4.5 4.5 0 00-6.336 4.486c.046.58.143 1.163.328 1.743m-.21 2.242a3.75 3.75 0 00-5.303-5.303l-1.21 1.21a3.75 3.75 0 005.304 5.303l1.21-1.21z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Experienced Technicians</h3>
                        <p class="mt-2 text-gray-600">Skilled professionals with vast experience in all furniture types,
                            equipped with the right tools.</p>
                    </div>
                </div>
            </section>

            <!-- Services Accordion Section -->
            <section class="mb-16 p-8 bg-white rounded-lg shadow-lg" x-data="{ openAccordion: 1 }">
                <h2 class="text-center text-3xl font-bold text-gray-800 mb-8">Comprehensive Furniture Handyman
                    Services</h2>
                <div class="max-w-3xl mx-auto">
                    <!-- Accordion Item 1 -->
                    <div class="border-b">
                        <button @click="openAccordion = (openAccordion === 1 ? null : 1)"
                                class="flex justify-between items-center w-full py-5 text-lg font-semibold text-left text-gray-800">
                            <span>Expert Furniture Assembly</span>
                            <svg class="w-5 h-5 transform transition-transform duration-300"
                                 :class="{ 'rotate-180': openAccordion === 1 }" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="openAccordion === 1" x-collapse>
                            <div class="pt-2 pb-5 text-gray-600">We assemble furniture from IKEA, Wayfair, Ashley
                                Furniture, and more. This includes living room, bedroom, dining room, office, outdoor,
                                and children's furniture.
                            </div>
                        </div>
                    </div>
                    <!-- Accordion Item 2 -->
                    <div class="border-b">
                        <button @click="openAccordion = (openAccordion === 2 ? null : 2)"
                                class="flex justify-between items-center w-full py-5 text-lg font-semibold text-left text-gray-800">
                            <span>Reliable Furniture Repair</span>
                            <svg class="w-5 h-5 transform transition-transform duration-300"
                                 :class="{ 'rotate-180': openAccordion === 2 }" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="openAccordion === 2" x-collapse>
                            <div class="pt-2 pb-5 text-gray-600">Don't replace, repair! We extend the life of your
                                furniture, saving you money. We handle loose joints, wobbly legs, broken hardware, and
                                more.
                            </div>
                        </div>
                    </div>
                    <!-- Accordion Item 3 -->
                    <div class="border-b">
                        <button @click="openAccordion = (openAccordion === 3 ? null : 3)"
                                class="flex justify-between items-center w-full py-5 text-lg font-semibold text-left text-gray-800">
                            <span>Professional Installation</span>
                            <svg class="w-5 h-5 transform transition-transform duration-300"
                                 :class="{ 'rotate-180': openAccordion === 3 }" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="openAccordion === 3" x-collapse>
                            <div class="pt-2 pb-5 text-gray-600">Proper installation is key for safety. We offer
                                wall-mounting for shelves, securing bookcases, installing hardware, hanging pictures &
                                mirrors, and TV mounting services.
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="mb-16" x-data="{ openFaq: 1 }">
                <h2 class="text-center text-3xl font-bold text-gray-800 mb-8">Frequently Asked Questions (FAQ)</h2>
                <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                    <!-- FAQ Item 1 -->
                    <div class="border-b">
                        <button @click="openFaq = (openFaq === 1 ? null : 1)"
                                class="flex justify-between items-center w-full py-5 text-lg font-semibold text-left text-gray-800">
                            <span>What types of furniture do you assemble?</span>
                            <svg class="w-5 h-5 transform transition-transform duration-300"
                                 :class="{ 'rotate-180': openFaq === 1 }" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="openFaq === 1" x-collapse>
                            <div class="pt-2 pb-5 text-gray-600">We assemble a wide variety of furniture, including all
                                types of flat-pack items from retailers like IKEA, Wayfair, Amazon, and many others.
                            </div>
                        </div>
                    </div>
                    <!-- FAQ Item 2 -->
                    <div class="border-b">
                        <button @click="openFaq = (openFaq === 2 ? null : 2)"
                                class="flex justify-between items-center w-full py-5 text-lg font-semibold text-left text-gray-800">
                            <span>Do you bring your own tools?</span>
                            <svg class="w-5 h-5 transform transition-transform duration-300"
                                 :class="{ 'rotate-180': openFaq === 2 }" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="openFaq === 2" x-collapse>
                            <div class="pt-2 pb-5 text-gray-600">Yes, absolutely. Our handymen arrive fully equipped
                                with all necessary professional tools to complete your project efficiently and
                                correctly.
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="estimate" class="py-16 bg-slate-50 rounded-lg">
                <div class="container mx-auto px-4">
                    {{-- Заголовок для секции с формой --}}
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                            Get Your Free Furniture Service Estimate
                        </h2>
                        <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">
                            Ready to have your furniture professionally assembled or repaired? Fill out the form below
                            to get a
                            free, no-obligation estimate.
                        </p>
                    </div>
                    <x-estimate-form/>
                </div>
            </section>

        </div>
    </div>
</x-guest-layout>
