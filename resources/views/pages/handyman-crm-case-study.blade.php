@extends('partials.layout')

@section('title', 'Intelligent Lead-Capture & Service CRM | AI Heroes Portfolio')

@section('content')
<article class="case-study-detail pb-20">
    <header class="cs-hero w-full mb-20">
        <div class="max-w-[1200px] mx-auto px-8 relative z-10">
            <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white font-medium text-sm mb-8 shadow-[0_0_15px_rgba(255,255,255,0.1)]">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                CRM & Lead Capture
            </div>
            
            <h1 class="cs-title text-5xl md:text-7xl font-bold mb-6 leading-[1.1] tracking-tight text-shadow-sm">
                Intelligent Lead-Capture <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-indigo-200">
                    & Service CRM
                </span>
            </h1>
            
            <p class="text-xl md:text-2xl text-blue-50 max-w-3xl leading-relaxed mb-10 font-light opacity-90">
                A high-performance pipeline engineered for Handyman services. We transformed a scattered lead process into a centralized, automated ecosystem for quotes, scheduling, and client management.
            </p>
        </div>
    </header>

    <!-- Overview Section -->
    <section class="section cs-section w-full">
        <div class="max-w-[1200px] mx-auto px-8">
            <div class="cs-grid">
                <div class="cs-content">
                    <h2 class="section-title">The Challenge</h2>
                    <p>Local service businesses, such as Handyman operations, often struggle with fragmented communication. Clients describe their issues ambiguously via phone calls or disparate messaging apps, making accurate preliminary estimation virtually impossible. This friction leads to wasted site visits, inaccurate quotes, and lost conversion opportunities.</p>
                    <p>The client required a unified digital front door: a system that could intelligently capture structured project details—including mandatory photo or video evidence—and seamlessly route this enriched data into a dedicated management backend.</p>

                    <h3 class="cs-heading-sm">The Engineering Solution</h3>
                    <p>We architected the <strong>Handyman CRM</strong> as a bespoke, end-to-end platform built on Laravel 12. Instead of bolting off-the-shelf tools together, we engineered a unified architecture where the customer-facing lead capture form flows directly into a powerful Filament v3 administration panel.</p>
                    
                    <ul class="cs-list">
                        <li><strong>Rich Media Pipelines:</strong> Engineered secure, scalable handling of user-uploaded diagnostic media (photos/videos), attaching them directly to the structured lead profile.</li>
                        <li><strong>TALL Stack Reactivity:</strong> Utilized Tailwind CSS, Alpine.js, and Livewire to construct a lightning-fast, highly interactive client interface without the overhead of a heavy JavaScript SPA framework.</li>
                        <li><strong>Asynchronous Processing:</strong> Implemented robust Laravel Queues for background task execution, paving the way for automated AI-driven quote generation and intelligent scheduling notifications.</li>
                    </ul>
                </div>
                <div class="cs-sidebar">
                    <div class="cs-info-card">
                        <h4>Product Type</h4>
                        <p>CRM / Lead Gen (B2B)</p>
                        <h4>Focus</h4>
                        <p>Process Automation, Estimates</p>
                        <h4>Tech Architecture</h4>
                        <p>Laravel 12, Filament v3, TALL Stack</p>
                        <h4>Repository</h4>
                        <a href="https://github.com/ISergeyV/laravel_handyman-crm" target="_blank"
                            class="cs-link">View Source Code &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Deep Dive Features -->
    <section class="section cs-section cs-bg-dark w-full">
        <div class="max-w-[1200px] mx-auto px-8">
            <h2 class="section-title text-white">Commercial Reliability</h2>
            <p class="section-subtitle text-white-opacity">Built for the demanding realities of local service operations—where speed to lead and accurate data are paramount.</p>
            
            <div class="feature-blocks">
                <!-- Feature 1 -->
                <div class="feature-block">
                    <div class="feature-icon">📋</div>
                    <h3>Structured Lead Enrichment</h3>
                    <p>We replaced free-form email inquiries with a guided, multi-step capture flow. The system requires diagnostic context upfront, drastically reducing back-and-forth communication and accelerating the quote lifecycle.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-block">
                    <div class="feature-icon">⚙️</div>
                    <h3>Filament Command Center</h3>
                    <p>The core CRM is powered by Filament v3, providing administrators with a premium, highly customized interface to manage leads, view uploaded media, and track conversion statuses seamlessly.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-block">
                    <div class="feature-icon">🤖</div>
                    <h3>AI Integration Ready</h3>
                    <p>Architected with Extensibility in mind. The infrastructure is pre-configured to offload payload data to LLM APIs, allowing future implementation of AI visual diagnostics for incoming sink/plumbing images.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Strategic Stack -->
    <section class="section cs-section w-full">
         <div class="max-w-[1200px] mx-auto px-8 text-center pt-8">
            <h2 class="section-title">Strategic Technology Stack</h2>
            <p class="section-subtitle max-w-[800px] mx-auto">Selected for rapid iteration, long-term maintainability, and enterprise-grade security.</p>
            
            <div class="flex flex-wrap justify-center gap-4 mt-10">
                <span class="px-6 py-3 bg-white border border-border rounded-full text-slate-700 font-semibold shadow-sm">PHP 8.3 & Laravel 12</span>
                <span class="px-6 py-3 bg-white border border-border rounded-full text-slate-700 font-semibold shadow-sm">MySQL 8.4</span>
                <span class="px-6 py-3 bg-white border border-border rounded-full text-slate-700 font-semibold shadow-sm">Filament v3</span>
                <span class="px-6 py-3 bg-white border border-border rounded-full text-slate-700 font-semibold shadow-sm">TALL Stack (Tailwind, Alpine, Livewire)</span>
                <span class="px-6 py-3 bg-white border border-border rounded-full text-slate-700 font-semibold shadow-sm">Docker / DDEV Environment</span>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section bottom-cta w-full">
        <div class="max-w-[1200px] mx-auto px-8 text-center">
            <h2 class="section-title">Let's build your operational advantage.</h2>
            <p class="section-subtitle max-w-[800px] mx-auto">This system exemplifies the caliber of scalable, high-leverage software we construct. If your business is constrained by manual intake, scattered data, or generic software, we can design custom portals that automate your unique workflows.</p>
            <a href="/#contact" class="btn btn--primary" style="margin-top: 20px;">Build Your Custom Solution</a>
        </div>
    </section>
</article>
@endsection
