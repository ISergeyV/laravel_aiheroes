<x-guest-layout>
    @section('title', 'Drywall & Painting Services | Orange County Handyman | Mr. EuroFix')
    @section('description', 'Professional drywall and painting services in Orange County. Mr. EuroFix offers expert drywall repair, installation, and high-quality interior painting to transform your home.')
    @section('keywords', 'drywall, painting, repair, installation, orange county, handyman, Mr. EuroFix')
    @section('og:title', 'Drywall & Painting Services | Mr. EuroFix')
    @section('og:description', 'Expert drywall repair, installation, and high-quality interior painting for your home in Orange County.')
    @section('og:url', url('/orange-county-painting-handyman'))

    @section('content')
        <section class="text-center my-5 p-5 bg-white rounded shadow-sm">
            <h1 class="display-4 fw-bold text-dark mb-4">
                Transform Your Home with a Flawless Finish
            </h1>
            <p class="lead text-secondary">
                Increase your home's value and beauty with our expert drywall and painting services. Mr. EuroFix
                delivers <span class="text-primary fw-semibold">showroom-quality results</span> for homes across Orange
                County.
            </p>
        </section>

        <!-- Why Choose Us Section -->
        <section class="mb-5 p-5 bg-white rounded shadow-sm">
            <h2 class="h2 fw-bold text-dark mb-4 text-center">Your Best Choice for Painting & Drywall in OC</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="p-3">
                        <i class="bi bi-patch-check-fill display-4 text-primary"></i>
                        <h5 class="mt-3 fw-semibold">Licensed & Insured</h5>
                        <p class="text-secondary">Work with confidence knowing you're fully protected. We are a
                            professional, licensed, and insured service provider.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-3">
                        <i class="bi bi-award-fill display-4 text-primary"></i>
                        <h5 class="mt-3 fw-semibold">Quality Materials</h5>
                        <p class="text-secondary">We use only high-quality paints and materials from trusted brands to
                            ensure a durable, long-lasting, and beautiful finish.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="p-3">
                        <i class="bi bi-stars display-4 text-primary"></i>
                        <h5 class="mt-3 fw-semibold">Satisfaction Guaranteed</h5>
                        <p class="text-secondary">Our job isn't done until you are 100% happy with the result. We pride
                            ourselves on meticulous work and clean job sites.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="mb-5 p-5 bg-white rounded shadow-sm">
            <h2 class="h2 fw-bold text-dark mb-5 text-center">Our Drywall & Painting Solutions</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100">
                        <h3 class="h4 fw-semibold text-dark mb-3"><i
                                class="bi bi-house-door-fill text-primary me-2"></i>Drywall Services</h3>
                        <p class="text-secondary">From minor fixes to new installations, we create perfectly smooth
                            surfaces ready for paint.</p>
                        <ul class="list-unstyled text-secondary mt-3">
                            <li><i class="bi bi-dot"></i> Hole & Crack Patching</li>
                            <li><i class="bi bi-dot"></i> Water Damage Repair</li>
                            <li><i class="bi bi-dot"></i> New Drywall Installation</li>
                            <li><i class="bi bi-dot"></i> Texture Matching & Finishing</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100">
                        <h3 class="h4 fw-semibold text-dark mb-3"><i class="bi bi-paint-bucket text-primary me-2"></i>Interior
                            Painting Services</h3>
                        <p class="text-secondary">Give your home a stunning refresh with sharp lines and a perfect, even
                            coat.</p>
                        <ul class="list-unstyled text-secondary mt-3">
                            <li><i class="bi bi-dot"></i> Walls, Ceilings & Trim Painting</li>
                            <li><i class="bi bi-dot"></i> Cabinet & Door Painting</li>
                            <li><i class="bi bi-dot"></i> Accent Walls</li>
                            <li><i class="bi bi-dot"></i> Meticulous Prep & Cleanup</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Before and After Gallery -->
        <section class="mb-5 p-5 bg-white rounded shadow-sm">
            <h2 class="h2 fw-bold text-dark mb-5 text-center">See the Difference We Make</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5 class="text-center text-secondary mb-2">Before</h5>
                    <img src="https://placehold.co/600x400/f0f0f0/999999?text=Before"
                         alt="A room before painting and drywall repair" class="img-fluid rounded">
                </div>
                <div class="col-md-6 mb-4">
                    <h5 class="text-center text-secondary mb-2">After</h5>
                    <img src="https://placehold.co/600x400/e67e22/ffffff?text=After"
                         alt="A room after professional painting" class="img-fluid rounded">
                </div>
            </div>
        </section>

        <!-- Final CTA -->
        <section class="text-center bg-secondary text-white p-5 rounded shadow-lg my-5">
            <h2 class="h2 fw-bold mb-4">Ready for a Flawless Home?</h2>
            <p class="lead mb-4">
                Don't settle for less than perfect. Let's discuss your project and how we can bring your vision to life.
                The estimate is always free.
            </p>
            <a href="{{ url('/') }}#contact" class="btn btn-primary btn-lg">Get Your Free, No-Obligation Estimate</a>
        </section>
</x-guest-layout>
