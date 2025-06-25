<x-guest-layout>

    @section('title', 'Mr. EuroFix - Handyman Services in Orange County')
    @section('description', 'Professional handyman services in Orange County. Expert in plumbing, electrical, carpentry, tile, and drywall. Reliable, affordable, and friendly.')
    @section('keywords', 'handyman, Orange County, plumbing, electrical, drywall, tile, home repair, Mr. EuroFix, furniture assembly, flooring installation, painting')

    @section('content')
        {{-- <!-- Hero Section -->
         <section class="hero-section text-white text-center py-5 d-flex align-items-center justify-content-center"
                  style="background: url('{{ asset('images/misc/hero-bg.jpg') }}') no-repeat center center/cover; min-height: 80vh;">
             <div class="container">
                 <h1 class="display-4 fw-bold mb-3">Mr. EuroFix:<br> Your Orange County Handyman</h1>
                 <p class="lead mb-4">
                     European Quality, American Efficiency: The perfect solution for your home.
                 </p>
                 <a href="#services" class="btn btn-primary btn-lg me-3">Our Services</a>
                 <a href="#contact" class="btn btn-outline-light btn-lg">Get a Free Online Estimate</a>
             </div>
         </section>
     --}}
        <!-- Hero Section -->
        <section id="hero" class="d-flex align-items-center text-white text-center position-relative"
                 style="height: 100vh; overflow: hidden;">
            <img src="{{ asset('images/misc/hero-bg.jpg') }}" alt="Hero Image" class="position-absolute w-100 h-100"
                 style="object-fit: cover; object-position: center top;"
                 onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/343a40/ffffff?text=Mr.+EuroFix';">

            <div class="container-fluid position-relative"
                 style="z-index: 2; background-color: rgba(0, 0, 0, 0.5); padding-top: 15px; padding-bottom: 20px; ">
                <h1 class="display-4 fw-bold text-shadow">Reliable Handyman Services</h1>
                <p class="lead text-shadow">European Quality, American Efficiency: The perfect solution for your
                    home.</p>
                <a href="#services" class="btn btn-primary btn-lg me-3">Our Services</a>
                <a href="#contact" class="btn btn-light btn-lg">Get a Free Online Estimate</a>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="container py-5 my-5">
            <h2 class="text-center mb-5 fw-bold text-secondary">My Expert Services</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Service 1: Drywall & Painting -->
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('images/services/drywall.jpg') }}" class="card-img-top rounded-top-4"
                             alt="Drywall and Painting Services ">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-primary">Drywall & Painting</h5>
                            <p class="card-text">
                                From flawless drywall repair to a fresh coat of paint, I transform your walls into works
                                of
                                art.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Drywall Repair</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Drywall Installation</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Interior Painting</li>
                            </ul>
                            <a href="{{ url('/orange-county-painting-drywall-handyman') }}"
                               class="btn btn-outline-primary btn-sm mt-3">Learn
                                More</a>
                        </div>
                    </div>
                </div>
                <!-- Service 2: Flooring -->
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('images/services/flooring.jpg') }}" class="card-img-top rounded-top-4"
                             alt="Flooring Services ">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-primary">Flooring Services</h5>
                            <p class="card-text">
                                Professional installation and repair of laminate, vinyl, and other flooring for a
                                beautiful
                                finish to your home.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Laminate Installation</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Vinyl Installation</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Flooring Repair</li>
                            </ul>
                            <a href="{{ url('/flooring-handyman') }}" class="btn btn-outline-primary btn-sm mt-3">Learn
                                More</a>
                        </div>
                    </div>
                </div>
                <!-- Service 3: Tile Installation & Repair -->
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('images/services/tile.jpg') }}" class="card-img-top rounded-top-4"
                             alt="Tile Installation and Repair Services ">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-primary">Tile Installation & Repair</h5>
                            <p class="card-text">
                                From kitchen backsplashes to bathroom floors, flawless tiling that stands the test of
                                time.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Tile Installation</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Tile Repair</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Grouting & Sealing</li>
                            </ul>
                            <a href="{{ url('/tile-handyman') }}" class="btn btn-outline-primary btn-sm mt-3">Learn
                                More</a>
                        </div>
                    </div>
                </div>
                <!-- Service 4: Furniture Assembly -->
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('images/services/furniture.jpg') }}" class="card-img-top rounded-top-4"
                             alt="Furniture Assembly Services ">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-primary">Furniture Assembly</h5>
                            <p class="card-text">
                                Save time and frustration with my professional assembly of any furniture, from shelves
                                to
                                complex sets.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>New Furniture Assembly</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Furniture Repair</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Wall Mounting</li>
                            </ul>
                            <a href="{{ url('/furniture-handyman') }}" class="btn btn-outline-primary btn-sm mt-3">Learn
                                More</a>
                        </div>
                    </div>
                </div>
                <!-- Service 5: Minor Plumbing -->
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('images/services/plumbing.jpg') }}" class="card-img-top rounded-top-4"
                             alt="Minor Plumbing Services ">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-primary">Minor Plumbing</h5>
                            <p class="card-text">
                                From leaky faucets to new fixture installations, I handle your minor plumbing needs
                                efficiently.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Faucet Repair</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Toilet Replacement</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Drain Clogs</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary btn-sm mt-3">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- Service 6: Minor Electrical -->
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('images/services/electrical.jpg') }}" class="card-img-top rounded-top-4"
                             alt="Minor Electrical Services ">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-primary">Minor Electrical</h5>
                            <p class="card-text">
                                Safe and reliable installation of light fixtures, outlets, and small electrical
                                appliances.
                            </p>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Light Fixture Installation
                                </li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Outlet Replacement</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Ceiling Fan Mounting</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary btn-sm mt-3">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section id="why" class="py-5 bg-secondary text-white">
            <div class="container">
                <h2 class="text-center mb-4">Why Choose Mr. EuroFix?</h2>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <i class="bi bi-tools display-4"></i>
                        <h5 class="mt-3">Experienced & Versatile</h5>
                        <p>Over 7 years of hands-on experience in plumbing, tile, electrical, drywall, painting, and
                            general
                            repairs.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <i class="bi bi-cash-coin display-4"></i>
                        <h5 class="mt-3">Affordable Pricing</h5>
                        <p>Clear, honest quotes with no hidden fees. We offer quality workmanship at fair prices.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <i class="bi bi-clock-history display-4"></i>
                        <h5 class="mt-3">On Time, Every Time</h5>
                        <p>We respect your schedule and always show up on time, ready to work.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Me -->
        <section id="about" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">About Me</h2>
                <div class="row align-items-center">
                    <div class="col-md-8">
                        {{--<!--<p>Hi! I’m <strong>Mr. EuroFix</strong>, your local handyman with European quality standards and
                            American efficiency. I specialize in plumbing, tile, drywall, painting, furniture assembly, light
                            electrical work, and more.</p>
                        <p>I’m based in <strong>Orange County, CA</strong> and serve surrounding areas. Whether it’s a small fix
                            or a full bathroom remodel, you can count on me for precision, reliability, and a job well done.</p>-->--}}

                        <h3>My Story: How a Passion for Home Became a Profession</h3>
                        <p>For many of us in California, a home is more than just a place to live—it's part of the
                            dream. My
                            journey into this craft began in 2013 when I bought my own home. It was a place with great
                            bones,
                            but it needed a lot of work to truly shine. I saw its potential and set an ambitious goal:
                            to
                            handle
                            the entire renovation myself, from the ground up.</p>
                        <p>It was a challenge I dove into headfirst. I spent countless hours learning, planning, and
                            getting
                            my
                            hands dirty—from rewiring the electrical systems to getting the final coat of paint just
                            right.
                            I
                            wasn't just renovating a house; I was building a home for my family, and I poured all my
                            energy
                            and
                            passion into making sure every detail was perfect.</p>
                        <p>When the project was complete, the result was better than I could have imagined. But the real
                            surprise came from the reactions of my friends and neighbors. They were impressed not just
                            by
                            the
                            final look, but by the quality of the work, the thoughtful details, and the craftsmanship
                            they
                            could
                            see and feel.</p>
                        <p>Soon, the requests started coming in. "Can you help me with my bathroom?" "What's the best
                            way to
                            tackle a kitchen remodel?" I loved helping out, and with every project I completed for
                            others, I
                            felt a deep sense of satisfaction. I realized that helping people transform their living
                            spaces
                            into
                            places they truly love was what I was meant to do.</p>
                        <p>What started as a personal project born out of necessity has since grown into my full-time
                            craft.</p>
                        <p>Today, I bring that same level of passion, dedication, and attention to detail to every
                            client's
                            home. I believe there are no small jobs, because every detail contributes to the final
                            result.
                            Your
                            home is your sanctuary, and I’m here to help you make it the best it can be.</p>
                        <p><strong>Let's work together to bring your vision for your home to life.</strong>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('images/about/me.jpg') }}" alt="Mr. EuroFix" class="img-fluid rounded-circle"
                             onerror="this.onerror=null;this.src='https://placehold.co/400x400/cccccc/333333?text=Mr.+EuroFix';">
                    </div>
                </div>
            </div>
        </section>
        <!-- Services -->
        <section id="services" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Services</h2>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <i class="bi bi-bricks display-5"></i>
                        <h5 class="mt-3">
                            <a href="orange-county-tile-flooring-handyman.html">Tile & Flooring</a></h5>
                        <p>Bathroom tile, kitchen backsplashes, floor installation, and grout repair.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <i class="bi bi-house-door display-5"></i>
                        <h5 class="mt-3">
                            <a href="orange-county-painting-handyman.html">Painting</a>
                        </h5>
                        <p>Patch holes, install drywall, interior painting, and touch-ups.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <i class="bi bi-tools display-5"></i>
                        <h5 class="mt-3">
                            <a href="orange-county-furniture-handyman.html">General
                                Repairs & Furniture Assembly</a>
                        </h5>
                        <p>Furniture assembly, door and window repairs, mounting TVs, shelves, and more.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio -->
        <section id="portfolio" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">Portfolio</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('images/projects/shower-tile.jpg') }}" class="img-fluid" alt="Shower Tile"
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=Shower+Tile';">
                        <h6 class="mt-2">Shower Tile Installation</h6>
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('images/projects/laminate-flooring.jpg') }}" class="img-fluid"
                             alt="Laminate Flooring"
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=Laminate+Flooring';">
                        <h6 class="mt-2">Laminate Flooring Installation</h6>
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('images/projects/interior-painting.jpg') }}" class="img-fluid"
                             alt="Interior Painting"
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=Interior+Painting';">
                        <h6 class="mt-2">Professional Interior Painting</h6>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section id="testimonials" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Testimonials</h2>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-7">
                        <!-- Yelp Review Card -->
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <h5 class="card-title mb-0">Whitney P.</h5>
                                        <div class="text-warning">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="https://www.yelp.com/biz/mr-eurofix-fullerton" target="_blank"
                                           rel="noopener noreferrer" title="View on Yelp">
                                            <img
                                                src="https://s3-media0.fl.yelpcdn.com/assets/srv0/yelp_styleguide/28332f3b0739/assets/img/logos/logo_desktop_medium_outline.png"
                                                alt="Yelp" height="30">
                                        </a>
                                    </div>
                                </div>
                                <p class="card-text">"Serhii was professional, kind, and very knowledgeable. I just had
                                    the
                                    stucco and stone exterior redone to my home and was nervous about putting holes into
                                    it.
                                    Thankfully Serhii did excellent work! He added large address numbers to the stone
                                    and
                                    the
                                    mailbox onto the acrylic stucco. He was precise an…"</p>
                                <small class="text-muted d-block mb-2">11/9/2024</small>
                                <div class="text-center">
                                    <a href="https://www.yelp.com/biz/mr-eurofix-fullerton?hrid=bgsGIhlS_NcGcXJ_QJZONA&amp;utm_campaign=read_more&amp;utm_medium=embedded_review&amp;utm_source="
                                       target="_blank" rel="noopener noreferrer" class="btn btn-outline-warning btn-sm">Read
                                        more on Yelp</a>
                                </div>
                            </div>
                        </div>
                        <!-- Thumbtack Review Card  -->
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Optional: Reviewer Photo -->
                                    <!--
                                    <div class="me-3">
                                        <img src="https://cdn.thumbtackstatic.com/fe-assets-web/_assets/images/release/components/avatar/images/legacy-default-avatar-50x50.25cbe35c0002a2eef6cbc5f1c4f271545eafbb59.png" alt="Kadija A." class="rounded-circle" width="40" height="40">
                                    </div>
                                    -->
                                    <div>
                                        <h5 class="card-title mb-0">Kadija A.</h5>
                                        <div class="text-warning">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="https://www.thumbtack.com/ca/fullerton/handyman/mr-eurofix/service/498062327323942930"
                                           target="_blank" rel="noopener noreferrer" title="View on Thumbtack">
                                            <img
                                                src="https://cdn.thumbtackstatic.com/fe-assets-web/media/logos/thumbtack/wordmark.svg"
                                                alt="Thumbtack" height="20">
                                        </a>
                                    </div>
                                </div>
                                <p class="card-text">"Exceptional Work. Mounted 2 TV’s Assembled Dining Table and chairs
                                    Assembled Side Table and stools Assembled Wine Cabinet"</p>
                                <div class="text-center">
                                    <a href="https://www.thumbtack.com/ca/fullerton/handyman/mr-eurofix/service/498062327323942930"
                                       target="_blank" rel="noopener noreferrer" class="btn btn-outline-warning btn-sm">See
                                        all
                                        reviews on Thumbtack</a>
                                </div>
                            </div>
                        </div>

                        <!-- Existing Testimonial 1 - Adapted to Card -->
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>"Serhii did an amazing job fixing our leaking faucet and installing a new light
                                        fixture.
                                        On time and professional!"</p>
                                    <footer class="blockquote-footer text-end mt-2">Jessica M., <cite
                                            title="Location">Irvine</cite></footer>
                                </blockquote>
                            </div>
                        </div>

                        <!-- Existing Testimonial 2 - Adapted to Card -->
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>"We hired Mr. EuroFix to redo our bathroom tiles. The results were outstanding.
                                        Highly
                                        recommended!"</p>
                                    <footer class="blockquote-footer text-end mt-2">Mark D., <cite
                                            title="Location">Tustin</cite>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact" class="py-5 text-white" style="background: #212529;">
            <div class="container">
                <h2 class="text-center mb-4">Contact Me</h2>
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <p>
                            <i class="bi bi-envelope"></i> <a href="mailto:info@mreurofix.com" class="text-white">info@mreurofix.com</a>
                        </p>
                        <p><i class="bi bi-phone"></i> <a href="tel:+19494144998" class="text-white">(949) 414-4998</a>
                        </p>
                        <p><i class="bi bi-geo-alt"></i> Orange County, California</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final CTA is moved to the layout, as it's common across all service pages -->
</x-guest-layout>
