<x-guest-layout>

    @section('title', 'Mr. EuroFix - Handyman Services in Orange County')
    @section('description', 'Professional handyman services in Orange County. Expert in plumbing, electrical, carpentry, tile, and drywall. Reliable, affordable, and friendly.')
    @section('keywords', 'handyman, Orange County, plumbing, electrical, drywall, tile, home repair, Mr. EuroFix, furniture assembly, flooring installation, painting')

    <!-- Hero Section -->
    <section id="hero"
             class="relative h-screen flex items-center justify-center text-white text-center overflow-hidden">
        <img src="{{ asset('assets/img/bg/hero-bg.jpg') }}" alt="Hero Image"
             class="absolute inset-0 w-full h-full object-cover object-top"
             onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/343a40/ffffff?text=Mr.+EuroFix';">

        <div
            class="relative z-10 w-full h-full flex flex-col items-center justify-center bg-black bg-opacity-50 px-4 py-8 md:py-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg border-green-500">Reliable Handyman
                Services</h1>
            <p class="text-lg md:text-xl mb-8 drop-shadow-lg">European Quality, American Efficiency: The perfect
                solution for your home.</p>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <a href="#services"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300 shadow-lg">
                    Our Services
                </a>
                <a href="{{ route('home') }}#freeOnlineEstimate"
                   class="bg-white hover:bg-gray-200 text-gray-800 font-bold py-3 px-8 rounded-full transition duration-300 shadow-lg">
                    Get a Free Online Estimate
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-4xl font-bold mb-12 text-gray-800">My Expert Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Service 1: Furniture Assembly -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                    <img src="{{ asset('assets/img/index/services/furniture-assembly-service.jpg') }}"
                         class="w-full h-48 object-cover rounded-t-xl"
                         alt="Furniture Assembly Services">
                    <div class="p-6 flex flex-col flex-grow">
                        <h5 class="text-2xl font-bold text-blue-600 mb-3">Furniture Assembly</h5>
                        <p class="text-gray-700 mb-4 flex-grow">
                            Save time and frustration with my professional assembly of any furniture, from shelves to
                            complex sets.
                        </p>
                        <ul class="space-y-2 text-gray-700 mb-6">
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                New Furniture Assembly
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Furniture Repair
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Wall Mounting
                            </li>
                        </ul>
                        <a href="{{ route('pages.furniture') }}"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">
                            Learn More</a>
                    </div>
                </div>
                <!-- Service 2: Painting -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                    <img src="{{ asset('assets/img/index/services/painting.jpg') }}"
                         class="w-full h-48 object-cover rounded-t-xl"
                         alt="Painting Services">
                    <div class="p-6 flex flex-col flex-grow">
                        <h5 class="text-2xl font-bold text-blue-600 mb-3">Painting</h5>
                        <p class="text-gray-700 mb-4 flex-grow">
                            A fresh coat of paint can completely transform your space—I deliver clean lines, even
                            coverage,
                            and a flawless finish every time.
                        </p>
                        <ul class="space-y-2 text-gray-700 mb-6">
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Wall & Ceiling Painting
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Accent Walls
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Color Matching
                            </li>
                        </ul>
                        <a href="{{ route('pages.painting') }}"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">
                            Learn More</a>
                    </div>
                </div>
                <!-- Service 3: Flooring -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                    <img src="{{ asset('assets/img/flooring/door-trim.jpg') }}"
                         class="w-full h-48 object-cover rounded-t-xl"
                         alt="Flooring Services">
                    <div class="p-6 flex flex-col flex-grow">
                        <h5 class="text-2xl font-bold text-blue-600 mb-3">Flooring Services</h5>
                        <p class="text-gray-700 mb-4 flex-grow">
                            Professional installation and repair of laminate, vinyl, and other flooring for a beautiful
                            finish to your home.
                        </p>
                        <ul class="space-y-2 text-gray-700 mb-6">
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Laminate Installation
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Vinyl Installation
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Flooring Repair
                            </li>
                        </ul>
                        <a href="{{ route('pages.flooring') }}"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">Learn
                            More</a>
                    </div>
                </div>
                <!-- Service 4: Tile Installation & Repair -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                    <img src="{{ asset('assets/img/index/services/tile_Installation_repair.jpg') }}"
                         class="w-full h-48 object-cover rounded-t-xl"
                         alt="Tile Installation and Repair Services">
                    <div class="p-6 flex flex-col flex-grow">
                        <h5 class="text-2xl font-bold text-blue-600 mb-3">Tile Installation & Repair</h5>
                        <p class="text-gray-700 mb-4 flex-grow">
                            From kitchen backsplashes to bathroom floors, flawless tiling that stands the test of time.
                        </p>
                        <ul class="space-y-2 text-gray-700 mb-6">
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Tile Installation
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Tile Repair
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Grouting & Sealing
                            </li>
                        </ul>
                        <a href="{{ route('pages.tile') }}"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">Learn
                            More</a>
                    </div>
                </div>
                <!-- Service 5: Drywall Services -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                    <img src="{{ asset('assets/img/index/services/drywall_services.jpg') }}"
                         class="w-full h-48 object-cover rounded-t-xl"
                         alt="Drywall Services Services">
                    <div class="p-6 flex flex-col flex-grow">
                        <h5 class="text-2xl font-bold text-blue-600 mb-3">Drywall Services</h5>
                        <p class="text-gray-700 mb-4 flex-grow">
                            From minor repairs to full drywall installations, I provide smooth, seamless results that
                            make
                            your walls look brand new.
                        </p>
                        <ul class="space-y-2 text-gray-700 mb-6">
                            <li class="flex items-center">
                                Drywall Repair
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Drywall Installation
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Patching & Finishing
                            </li>
                        </ul>
                        <a href="#"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">Learn
                            More</a>
                    </div>
                </div>
                <!-- Service 6: Minor Plumbing -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                    <img src="{{ asset('assets/img/index/services/minor_plumbing.jpg') }}"
                         class="w-full h-48 object-cover rounded-t-xl"
                         alt="Minor Plumbing Services">
                    <div class="p-6 flex flex-col flex-grow">
                        <h5 class="text-2xl font-bold text-blue-600 mb-3">Minor Plumbing</h5>
                        <p class="text-gray-700 mb-4 flex-grow">
                            From leaky faucets to new fixture installations, I handle your minor plumbing needs
                            efficiently.
                        </p>
                        <ul class="space-y-2 text-gray-700 mb-6">
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Faucet Repair
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Toilet Replacement
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Drain Clogs
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- Service 7: Minor Electrical -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                    <img src="{{ asset('assets/img/index/services/minor_electrical.jpg') }}"
                         class="w-full h-48 object-cover rounded-t-xl"
                         alt="Minor Electrical Services">
                    <div class="p-6 flex flex-col flex-grow">
                        <h5 class="text-2xl font-bold text-blue-600 mb-3">Minor Electrical</h5>
                        <p class="text-gray-700 mb-4 flex-grow">
                            Safe and reliable installation of light fixtures, outlets, and small electrical appliances.
                        </p>
                        <ul class="space-y-2 text-gray-700 mb-6">
                            <li class="flex items-center">

                                Light Fixture Installation
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Outlet Replacement
                            </li>
                            <li class="flex items-center">
                                <x-icon name="check-circle"/>
                                Ceiling Fan Mounting
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section id="why" class="py-16 bg-gray-800 text-white px-4">
        <div class="container mx-auto">
            <h2 class="text-center text-4xl font-bold mb-12">Why Choose Mr. EuroFix?</h2>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <!-- Item 1: Experienced -->
                <div class="flex flex-col items-center">
                    <div
                        class="flex items-center justify-center h-24 w-24 mb-6 bg-indigo-700 bg-opacity-50 rounded-full ring-2 ring-indigo-500 shadow-lg">
                        <!-- НОВАЯ ИКОНКА: Инструменты (Опыт и универсальность) -->
                        <svg class="h-12 w-12 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-4.243-4.243l3.275-3.275a4.5 4.5 0 0 0-6.336 4.486c.046.58.143 1.163.328 1.743m-.21 2.242a3.75 3.75 0 0 0-5.303-5.303l-1.21 1.21a3.75 3.75 0 0 0 5.304 5.303l1.21-1.21z"/>
                        </svg>
                    </div>
                    <h5 class="text-2xl font-semibold mt-3">Experienced & Versatile</h5>
                    <p class="mt-2 text-gray-300">Over 7 years of hands-on experience in plumbing, tile, electrical,
                        drywall, painting, and general repairs.</p>
                </div>
                <!-- Item 2: Pricing -->
                <div class="flex flex-col items-center">
                    <div
                        class="flex items-center justify-center h-24 w-24 mb-6 bg-green-700 bg-opacity-50 rounded-full ring-2 ring-green-500">
                        <!-- Icon for Pricing -->
                        <svg class="h-12 w-12 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V6.375c0-.621.504-1.125 1.125-1.125h.375m18 3.75v.75a.75.75 0 01-.75.75h-.75a.75.75 0 01-.75-.75v-.75m0 0h.375c.621 0 1.125.504 1.125 1.125v.75c0 .621-.504 1.125-1.125 1.125h-.375m0 0h-.75a.75.75 0 00-.75.75v.75c0 .414.336.75.75.75h.75m0 0h-.75a.75.75 0 00-.75.75v.75c0 .414.336.75.75.75h.75M4.5 12v.75a.75.75 0 00.75.75h.75a.75.75 0 00.75-.75v-.75m0 0h-.375c-.621 0-1.125.504-1.125 1.125v.75c0 .621.504 1.125 1.125 1.125h.375m0 0h.75a.75.75 0 01.75.75v.75c0 .414-.336.75-.75.75h-.75m0 0h.75a.75.75 0 01.75.75v.75c0 .414-.336.75-.75.75h-.75"/>
                        </svg>
                    </div>
                    <h5 class="text-2xl font-semibold mt-3">Affordable Pricing</h5>
                    <p class="mt-2 text-gray-300">Clear, honest quotes with no hidden fees. We offer quality workmanship
                        at fair prices.</p>
                </div>
                <!-- Item 3: On Time -->
                <div class="flex flex-col items-center">
                    <div
                        class="flex items-center justify-center h-24 w-24 mb-6 bg-blue-700 bg-opacity-50 rounded-full ring-2 ring-blue-500">
                        <!-- Icon for Time -->
                        <svg class="h-12 w-12 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h5 class="text-2xl font-semibold mt-3">On Time, Every Time</h5>
                    <p class="mt-2 text-gray-300">We respect your schedule and always show up on time, ready to
                        work.</p>
                </div>
            </div>
        </div>
    </section>


    {{--<!-- About Section with Image -->--}}
    {{--    <section class="mb-12 p-8 bg-white rounded-lg shadow-lg" x-data="{ imageLoaded: false }">--}}
    {{--        <div class="grid md:grid-cols-2 gap-8 items-center">--}}
    {{--            <div class="relative overflow-hidden rounded-lg">--}}
    {{--                <img src="{{ asset('images/flooring/laminate-floor-fitting-closeup.jpg') }}"--}}
    {{--                     alt="Handyman installing laminate flooring"--}}
    {{--                     class="w-full h-auto transition-transform duration-700 hover:scale-105"--}}
    {{--                     @load="imageLoaded = true"--}}
    {{--                     :class="{ 'opacity-0': !imageLoaded, 'opacity-100': imageLoaded }"--}}
    {{--                     onerror="this.onerror=null;this.src='https://placehold.co/600x400/F0F0F0/3333?text=Image+Not+Found';">--}}
    {{--            </div>--}}
    {{--            <div>--}}
    {{--                <h2 class="text-3xl font-bold text-gray-800 mb-4">Specializing in Laminate & Vinyl Flooring</h2>--}}
    {{--                <p class="text-gray-600 mb-4">--}}
    {{--                    As expert <span class="font-semibold">handyman flooring installers</span>, we specialize in the--}}
    {{--                    precise and efficient installation of both laminate and vinyl flooring. These materials offer--}}
    {{--                    durability, style, and affordability, making them popular choices for modern homes.--}}
    {{--                </p>--}}
    {{--                <p class="text-gray-600">--}}
    {{--                    Whether you're updating a single room or your entire house, our team ensures a flawless--}}
    {{--                    installation, paying close attention to detail for a beautiful and long-lasting result.--}}
    {{--                </p>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    <!-- About Me -->
    <section id="about" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">About Me</h2>
            <div class="flex flex-col-reverse lg:flex-row items-center gap-10 lg:gap-16">
                <!-- Text Block -->
                <div class="w-full lg:w-1/2">
                    <h3 class="text-2xl font-bold mb-4">My Story: How a Passion for Home Became a Profession</h3>
                    <div class="space-y-4 text-gray-700 text-base leading-relaxed">
                        <p>For me, a home is more than just a place to live—it's part of the dream. My journey began in
                            2013, renovating my own house from the ground up. I learned every step, from rewiring to the
                            final coat of paint, pouring passion into every detail.</p>
                        <p>Friends and neighbors noticed the quality and care in my work, soon asking for help with
                            their own projects. Each new job brought satisfaction and a sense of purpose—helping others
                            create spaces they love.</p>
                        <p>What started as a personal challenge has grown into my full-time craft. Today, I bring that
                            same dedication and attention to detail to every client’s home. There are no small
                            jobs—every detail matters.</p>
                        <p class="font-semibold">Let’s work together to bring your vision to life.</p>
                    </div>
                </div>
                <!-- Photo Block -->
                <div class="w-full lg:w-1/2 flex justify-center items-center">
                    <div
                        x-data="{ hover: false }"
                        @mouseenter="hover = true"
                        @mouseleave="hover = false"
                        class="transition-transform duration-300"
                        :class="{ 'scale-105 shadow-2xl': hover }"
                    >
                        <img
                            src="{{ url('/images/about/me.jpg') }}"
                            alt="Mr. EuroFix"
                            class="w-80 h-80 md:w-96 md:h-96 rounded-2xl object-cover border-4 border-gray-200 shadow-lg"
                            onerror="this.onerror=null;this.src='https://placehold.co/400x400/cccccc/333333?text=Mr.+EuroFix';"
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <!-- x-data for image modal -->
    <section id="portfolio" class="py-16 px-4" x-data="{ open: false, currentImage: '' }">
        <div class="container mx-auto">
            <h2 class="text-center text-4xl font-bold mb-12 text-gray-800">Portfolio</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="mb-8 cursor-pointer transform hover:scale-105 transition-transform duration-300"
                     @click="open = true; currentImage = '{{ asset('images/projects/shower-tile.jpg') }}'">
                    <img src="{{ asset('images/projects/shower-tile.jpg') }}"
                         class="w-full h-64 object-cover rounded-lg shadow-md" alt="Shower Tile Installation"
                         onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=Shower+Tile';">
                    <h6 class="text-lg font-semibold mt-4 text-center text-gray-800">Shower Tile Installation</h6>
                </div>
                <div class="mb-8 cursor-pointer transform hover:scale-105 transition-transform duration-300"
                     @click="open = true; currentImage = '{{ asset('images/projects/laminate-flooring.jpg') }}'">
                    <img src="{{ asset('images/projects/laminate-flooring.jpg') }}"
                         class="w-full h-64 object-cover rounded-lg shadow-md"
                         alt="Laminate Flooring Installation"
                         onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=Laminate+Flooring';">
                    <h6 class="text-lg font-semibold mt-4 text-center text-gray-800">Laminate Flooring Installation</h6>
                </div>
                <div class="mb-8 cursor-pointer transform hover:scale-105 transition-transform duration-300"
                     @click="open = true; currentImage = '{{ asset('images/projects/interior-painting.jpg') }}'">
                    <img src="{{ asset('images/projects/interior-painting.jpg') }}"
                         class="w-full h-64 object-cover rounded-lg shadow-md"
                         alt="Professional Interior Painting"
                         onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=Interior+Painting';">
                    <h6 class="text-lg font-semibold mt-4 text-center text-gray-800">Professional Interior Painting</h6>
                </div>
            </div>
        </div>

        <!-- Image Modal -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4 z-50"
             x-cloak
             @click.outside="open = false">
            <div class="relative max-w-full max-h-full">
                <button @click="open = false"
                        class="absolute top-2 right-2 text-white text-3xl p-2 rounded-full bg-gray-800 hover:bg-gray-700 focus:outline-none">
                    &times;
                </button>
                <img :src="currentImage" alt="Zoomed Image" class="max-w-full max-h-[90vh] rounded-lg shadow-xl">
            </div>
        </div>
    </section>
    <x-estimate-form/>
    <!-- Testimonials -->
    <section id="testimonials" class="py-16 bg-gray-100 px-4">
        <div class="container mx-auto">
            <h2 class="text-center text-4xl font-bold mb-12 text-gray-800">Testimonials</h2>
            <div class="flex justify-center">
                <div class="w-full max-w-3xl">
                    <!-- Yelp Review Card -->
                    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                        <div class="flex items-center mb-4">
                            <div>
                                <h5 class="text-xl font-semibold mb-0 text-gray-900">Whitney P.</h5>
                                <div class="text-yellow-500">
                                    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <a href="https://www.yelp.com/biz/mr-eurofix-fullerton" target="_blank"
                                   rel="noopener noreferrer" title="View on Yelp">
                                    <img
                                        src="https://s3-media0.fl.yelpcdn.com/assets/srv0/yelp_styleguide/28332f3b0739/assets/img/logos/logo_desktop_medium_outline.png"
                                        alt="Yelp" class="h-8">
                                </a>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed mb-4">"Serhii was professional, kind, and very
                            knowledgeable. I just had the stucco and stone exterior redone to my home and was nervous
                            about putting holes into it. Thankfully Serhii did excellent work! He added large address
                            numbers to the stone and the mailbox onto the acrylic stucco. He was precise..."</p>
                        <small class="text-gray-500 block mb-4">11/9/2024</small>
                        <div class="text-center">
                            <a href="https://www.yelp.com/biz/mr-eurofix-fullerton?hrid=bgsGIhlS_NcGcXJ_QJZONA&amp;utm_campaign=read_more&amp;utm_medium=embedded_review&amp;utm_source="
                               target="_blank" rel="noopener noreferrer"
                               class="inline-block border border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white transition duration-300 py-2 px-5 rounded-full text-sm">
                                Read more on Yelp
                            </a>
                        </div>
                    </div>
                    <!-- Thumbtack Review Card -->
                    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                        <div class="flex items-center mb-4">
                            <div>
                                <h5 class="text-xl font-semibold mb-0 text-gray-900">Kadija A.</h5>
                                <div class="text-yellow-500">
                                    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <a href="https://www.thumbtack.com/ca/fullerton/handyman/mr-eurofix/service/498062327323942930"
                                   target="_blank" rel="noopener noreferrer" title="View on Thumbtack">
                                    <img
                                        src="https://cdn.thumbtackstatic.com/fe-assets-web/media/logos/thumbtack/wordmark.svg"
                                        alt="Thumbtack" class="h-5">
                                </a>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed mb-4">"Exceptional Work. Mounted 2 TV’s Assembled Dining
                            Table and chairs Assembled Side Table and stools Assembled Wine Cabinet"</p>
                        <div class="text-center">
                            <a href="https://www.thumbtack.com/ca/fullerton/handyman/mr-eurofix/service/498062327323942930"
                               target="_blank" rel="noopener noreferrer"
                               class="inline-block border border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white transition duration-300 py-2 px-5 rounded-full text-sm">
                                See all reviews on Thumbtack
                            </a>
                        </div>
                    </div>

                    <!-- Existing Testimonial 1 - Adapted to Card -->
                    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                        <blockquote class="text-lg italic text-gray-800 mb-4">
                            <p>"Serhii did an amazing job fixing our leaking faucet and installing a new light fixture.
                                On time and professional!"</p>
                            <footer class="text-right text-gray-600 mt-2">Jessica M., <cite
                                    title="Location">Irvine</cite></footer>
                        </blockquote>
                    </div>

                    <!-- Existing Testimonial 2 - Adapted to Card -->
                    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                        <blockquote class="text-lg italic text-gray-800 mb-4">
                            <p>"We hired Mr. EuroFix to redo our bathroom tiles. The results were outstanding. Highly
                                recommended!"</p>
                            <footer class="text-right text-gray-600 mt-2">Mark D., <cite title="Location">Tustin</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
