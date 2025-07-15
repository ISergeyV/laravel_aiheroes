<x-guest-layout>

    @section('title', 'Mr. EuroFix - Handyman Services in Orange County')
    @section('description', 'Professional handyman services in Orange County. Expert in plumbing, electrical, carpentry, tile, and drywall. Reliable, affordable, and friendly.')
    @section('keywords', 'handyman, Orange County, plumbing, electrical, drywall, tile, home repair, Mr. EuroFix, furniture assembly, flooring installation, painting')

    <!-- Hero Section -->
    <section id="hero"
             class="relative h-screen flex items-center justify-center text-white text-center overflow-hidden">
        <img src="{{ asset('assets/img/bg/hero-bg.jpg') }}" alt="Hero Image"
             class="absolute inset-0 w-full h-full object-cover object-center"
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
    <section id="services" class="container mx-auto py-16 px-4">
        <h2 class="text-center text-4xl font-bold mb-12 text-gray-800">My Expert Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service 1: Painting -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                <img src="{{ asset('assets/img/painting.jpg') }}" class="w-full h-48 object-cover rounded-t-xl"
                     alt="Painting Services">
                <div class="p-6 flex flex-col flex-grow">
                    <h5 class="text-2xl font-bold text-blue-600 mb-3">Painting</h5>
                    <p class="text-gray-700 mb-4 flex-grow">
                        From flawless drywall repair to a fresh coat of paint, I transform your walls into works of art.
                    </p>
                    <ul class="space-y-2 text-gray-700 mb-6">
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Drywall Repair
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Drywall Installation
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Interior Painting
                        </li>
                    </ul>
                    <a href="{{ route('pages.painting') }}"
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">Learn
                        More</a>
                </div>
            </div>
            <!-- Service 2: Flooring -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                <img src="{{ asset('images/services/flooring.jpg') }}" class="w-full h-48 object-cover rounded-t-xl"
                     alt="Flooring Services">
                <div class="p-6 flex flex-col flex-grow">
                    <h5 class="text-2xl font-bold text-blue-600 mb-3">Flooring Services</h5>
                    <p class="text-gray-700 mb-4 flex-grow">
                        Professional installation and repair of laminate, vinyl, and other flooring for a beautiful
                        finish to your home.
                    </p>
                    <ul class="space-y-2 text-gray-700 mb-6">
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Laminate Installation
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Vinyl Installation
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Flooring Repair
                        </li>
                    </ul>
                    <a href="{{ route('pages.flooring') }}"
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">Learn
                        More</a>
                </div>
            </div>
            <!-- Service 3: Tile Installation & Repair -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                <img src="{{ asset('images/services/tile.jpg') }}" class="w-full h-48 object-cover rounded-t-xl"
                     alt="Tile Installation and Repair Services">
                <div class="p-6 flex flex-col flex-grow">
                    <h5 class="text-2xl font-bold text-blue-600 mb-3">Tile Installation & Repair</h5>
                    <p class="text-gray-700 mb-4 flex-grow">
                        From kitchen backsplashes to bathroom floors, flawless tiling that stands the test of time.
                    </p>
                    <ul class="space-y-2 text-gray-700 mb-6">
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Tile Installation
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Tile Repair
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Grouting & Sealing
                        </li>
                    </ul>
                    <a href="{{ route('pages.tile') }}"
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">Learn
                        More</a>
                </div>
            </div>
            <!-- Service 4: Furniture Assembly -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                <img src="{{ asset('images/services/furniture.jpg') }}" class="w-full h-48 object-cover rounded-t-xl"
                     alt="Furniture Assembly Services">
                <div class="p-6 flex flex-col flex-grow">
                    <h5 class="text-2xl font-bold text-blue-600 mb-3">Furniture Assembly</h5>
                    <p class="text-gray-700 mb-4 flex-grow">
                        Save time and frustration with my professional assembly of any furniture, from shelves to
                        complex sets.
                    </p>
                    <ul class="space-y-2 text-gray-700 mb-6">
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            New Furniture Assembly
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Furniture Repair
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Wall Mounting
                        </li>
                    </ul>
                    <a href="{{ route('pages.furniture') }}"
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">Learn
                        More</a>
                </div>
            </div>
            <!-- Service 5: Minor Plumbing -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                <img src="{{ asset('images/services/plumbing.jpg') }}" class="w-full h-48 object-cover rounded-t-xl"
                     alt="Minor Plumbing Services">
                <div class="p-6 flex flex-col flex-grow">
                    <h5 class="text-2xl font-bold text-blue-600 mb-3">Minor Plumbing</h5>
                    <p class="text-gray-700 mb-4 flex-grow">
                        From leaky faucets to new fixture installations, I handle your minor plumbing needs efficiently.
                    </p>
                    <ul class="space-y-2 text-gray-700 mb-6">
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Faucet Repair
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Toilet Replacement
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Drain Clogs
                        </li>
                    </ul>
                    <a href="#"
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">Learn
                        More</a>
                </div>
            </div>
            <!-- Service 6: Minor Electrical -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">
                <img src="{{ asset('images/services/electrical.jpg') }}" class="w-full h-48 object-cover rounded-t-xl"
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
                            <x-icon name="check-circle" />
                            Outlet Replacement
                        </li>
                        <li class="flex items-center">
                            <x-icon name="check-circle" />
                            Ceiling Fan Mounting
                        </li>
                    </ul>
                    <a href="#"
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-full transition duration-300 self-start">Learn
                        More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section id="why" class="py-16 bg-gray-800 text-white px-4">
        <div class="container mx-auto">
            <h2 class="text-center text-4xl font-bold mb-12">Why Choose Mr. EuroFix?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="mb-8">
                    <!-- Example icon for tools - replace with actual icon if using a library like Font Awesome/Lucide -->
                    <x-icon name="check-circle" />
                    <h5 class="text-2xl font-semibold mt-3">Experienced & Versatile</h5>
                    <p class="mt-2 text-gray-300">Over 7 years of hands-on experience in plumbing, tile, electrical,
                        drywall, painting, and general repairs.</p>
                </div>
                <div class="mb-8">
                    <svg class="w-16 h-16 mx-auto mb-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a8 8 0 100 16 8 8 0 000-16zM7.707 9.293a1 1 0 00-1.414 1.414L9 13.586l4.707-4.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293z"></path>
                    </svg>
                    <h5 class="text-2xl font-semibold mt-3">Affordable Pricing</h5>
                    <p class="mt-2 text-gray-300">Clear, honest quotes with no hidden fees. We offer quality workmanship
                        at fair prices.</p>
                </div>
                <div class="mb-8">
                    <svg class="w-16 h-16 mx-auto mb-4 text-purple-400" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a8 8 0 100 16 8 8 0 000-16zm-1 9a1 1 0 01-2 0V7a1 1 0 112 0v4zm4-4a1 1 0 01-2 0V7a1 1 0 112 0v4z"></path>
                    </svg>
                    <h5 class="text-2xl font-semibold mt-3">On Time, Every Time</h5>
                    <p class="mt-2 text-gray-300">We respect your schedule and always show up on time, ready to
                        work.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Me -->
    <section id="about" class="py-16 px-4">
        <div class="container mx-auto">
            <h2 class="text-center text-4xl font-bold mb-12 text-gray-800">About Me</h2>
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                <div class="md:col-span-8 md:order-1 text-gray-700 leading-relaxed">
                    <h3 class="text-3xl font-bold mb-4">My Story: How a Passion for Home Became a Profession</h3>
                    <p class="mb-4">For many of us in California, a home is more than just a place to live—it's part of
                        the dream. My journey into this craft began in 2013 when I bought my own home. It was a place
                        with great bones, but it needed a lot of work to truly shine. I saw its potential and set an
                        ambitious goal: to handle the entire renovation myself, from the ground up.</p>
                    <p class="mb-4">It was a challenge I dove into headfirst. I spent countless hours learning,
                        planning, and getting my hands dirty—from rewiring the electrical systems to getting the final
                        coat of paint just right. I wasn't just renovating a house; I was building a home for my family,
                        and I poured all my energy and passion into making sure every detail was perfect.</p>
                    <p class="mb-4">When the project was complete, the result was better than I could have imagined. But
                        the real surprise came from the reactions of my friends and neighbors. They were impressed not
                        just by the final look, but by the quality of the work, the thoughtful details, and the
                        craftsmanship they could see and feel.</p>
                    <p class="mb-4">Soon, the requests started coming in. "Can you help me with my bathroom?" "What's
                        the best way to tackle a kitchen remodel?" I loved helping out, and with every project I
                        completed for others, I felt a deep sense of satisfaction. I realized that helping people
                        transform their living spaces into places they truly love was what I was meant to do.</p>
                    <p class="mb-4">What started as a personal project born out of necessity has since grown into my
                        full-time craft.</p>
                    <p class="mb-4">Today, I bring that same level of passion, dedication, and attention to detail to
                        every client's home. I believe there are no small jobs, because every detail contributes to the
                        final result. Your home is your sanctuary, and I’m here to help you make it the best it can
                        be.</p>
                    <p class="font-bold">Let's work together to bring your vision for your home to life.</p>
                </div>
                <div class="md:col-span-4 md:order-2 text-center">
                    <img src="{{ asset('images/about/me.jpg') }}" alt="Mr. EuroFix"
                         class="w-full h-auto rounded-full max-w-xs mx-auto shadow-xl"
                         onerror="this.onerror=null;this.src='https://placehold.co/400x400/cccccc/333333?text=Mr.+EuroFix';">
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
