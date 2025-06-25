<x-guest-layout>

    @section('title', 'Mr. EuroFix - Handyman Services in Orange County')
    @section('description', 'Professional handyman services in Orange County. Expert in plumbing, electrical, carpentry, tile, and drywall. Reliable, affordable, and friendly.')
    @section('keywords', 'handyman, Orange County, plumbing, electrical, drywall, tile, home repair, Mr. EuroFix, furniture assembly, flooring installation, painting')

    @section('content')

        <section class="text-center my-5 p-5 bg-white rounded shadow-sm">
            <h1 class="display-4 fw-bold text-dark mb-4">
                Expert Furniture Handyman in <span class="text-primary">Orange County</span>
            </h1>
            <p class="lead text-secondary">
                Assembly, Repair & Installation You Can Trust. Tired of wobbly tables and confusing manuals? Mr. EuroFix
                is
                your solution!
            </p>
            <p class="lead text-secondary fw-semibold">
                European Quality. American Efficiency.
            </p>
            <a href="{{ '/estimate' }}" class="btn btn-primary btn-lg mt-3">Get a Free Quote</a>
        </section>

        <section id="why-us" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">Why Choose Mr. EuroFix?</h2>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-light rounded shadow-sm h-100">
                            <i class="bi bi-geo-alt-fill display-5 text-primary"></i>
                            <h5 class="mt-3">Local OC Expertise</h5>
                            <p>We're part of your community, understanding local needs and dedicated to serving our
                                Orange
                                County neighbors.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-my-super-color rounded shadow-sm h-100">
                            <i class="bi bi-star-fill display-5 text-primary"></i>
                            <h5 class="mt-3">Quality & Efficiency</h5>
                            <p>Our promise: meticulous attention to detail, careful handling, and respect for your
                                time.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-4 bg-light rounded shadow-sm h-100">
                            <i class="bi bi-tools display-5 text-primary"></i>
                            <h5 class="mt-3">Experienced Technicians</h5>
                            <p>Skilled professionals with vast experience in all furniture types, equipped with the
                                right
                                tools.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="py-5 bg-white">
            <div class="container">
                <h2 class="text-center mb-4">Comprehensive Furniture Handyman Services</h2>
                <div class="accordion" id="furnitureAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="bi bi-box-seam me-2"></i> Expert Furniture Assembly
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                             data-bs-parent="#furnitureAccordion">
                            <div class="accordion-body">
                                We assemble furniture from IKEA, Wayfair, Ashley Furniture, and more. This includes
                                living
                                room, bedroom, dining room, office, outdoor, and children's furniture.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="bi bi-wrench-adjustable me-2"></i> Reliable Furniture Repair
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                             data-bs-parent="#furnitureAccordion">
                            <div class="accordion-body">
                                Don't replace, repair! We extend the life of your furniture, saving you money. We handle
                                loose joints, wobbly legs, broken hardware, and more.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="bi bi-hammer me-2"></i> Professional Installation
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                             data-bs-parent="#furnitureAccordion">
                            <div class="accordion-body">
                                Proper installation is key for safety. We offer wall-mounting for shelves, securing
                                bookcases, installing hardware, hanging pictures & mirrors, and TV mounting services.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="faq" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">Frequently Asked Questions (FAQ)</h2>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseOne" aria-expanded="true"
                                    aria-controls="faqCollapseOne">
                                What types of furniture do you assemble?
                            </button>
                        </h2>
                        <div id="faqCollapseOne" class="accordion-collapse collapse show"
                             aria-labelledby="faqHeadingOne"
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We assemble a wide variety of furniture, including all types of flat-pack items from
                                retailers like IKEA, Wayfair, Amazon, and many others.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapseTwo" aria-expanded="false"
                                    aria-controls="faqCollapseTwo">
                                Do you bring your own tools?
                            </button>
                        </h2>
                        <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo"
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, absolutely. Our handymen arrive fully equipped with all necessary professional
                                tools to
                                complete your project efficiently and correctly.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-center bg-secondary text-white p-5 rounded shadow-lg">
            <h2 class="h2 fw-bold mb-4">Ready to Enjoy Your Perfectly Assembled Furniture?</h2>
            <p class="lead mb-4">
                Stop struggling with complicated instructions. Let Mr. EuroFix provide the expert services you need.
            </p>
            <a href="{{ '/estimate' }}" class="btn btn-primary btn-lg">Get Your Free Quote Now!</a>
        </section>
</x-guest-layout>
