@extends('partials.layout')

@section('title', 'AI Heroes | Empowering Innovation with AI')

@section('content')
<!-- Hero Section -->
<section
    class="relative h-[90vh] min-h-[600px] flex items-center bg-slate-950 text-slate-50 overflow-hidden -mt-20 pt-[120px]">
    <div class="max-w-[1200px] mx-auto px-8 w-full relative z-[2]">
        <div class="max-w-[600px]">
            <div class="inline-flex items-center text-[13px] font-medium mb-8 opacity-90">
                <span
                    class="mr-2 text-[10px] border border-current rounded-full w-4 h-4 flex items-center justify-center">▶</span>
                AI & Automation Experts
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-[4rem] font-bold leading-[1.1] tracking-tight mb-8">
                Empowering Innovation with AI</h1>
            <p class="text-lg leading-[1.6] mb-16 opacity-90 max-w-[480px]">We tailor your application to your
                organization's exact needs, using
                robust frameworks and best practices for long-term success.</p>

            <form x-data @submit.prevent="$dispatch('open-estimate-modal', { email: $el.querySelector('input').value })" class="flex flex-col sm:flex-row mb-8 max-w-[450px] bg-white p-2 px-4 sm:p-1.5 sm:px-1.5 rounded-[100px] shadow-lg gap-2 sm:gap-0">
                <label for="hero_email" class="sr-only">Enter your email</label>
                <input id="hero_email" type="email" placeholder="Enter your email"
                    class="flex-1 border-none px-2 sm:px-6 py-2 sm:py-3 text-[1.05rem] outline-none text-slate-900 bg-transparent min-w-0 appearance-none m-0 focus:ring-0 placeholder:text-slate-400"
                    >
                <button type="submit"
                    class="bg-accent text-slate-950 font-medium text-[1.05rem] px-8 py-3 rounded-[100px] hover:bg-accent-hover transition-colors whitespace-nowrap w-full sm:w-auto">
                    Get an Estimate
                </button>
            </form>
        </div>
    </div>
    <div class="absolute inset-0 w-full h-full z-[1] bg-cover bg-center"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
        <!-- Background image -->
    </div>
</section>

<!-- Social Proof Section -->
<section class="py-16 border-b border-border bg-white">
    <div class="max-w-[1200px] mx-auto px-8 w-full">
        <p class="text-center mb-8 text-text-light text-sm">Powered by modern technologies</p>
        <div class="relative overflow-hidden flex whitespace-nowrap" style="mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);"
             x-data="{
                items: ['OpenAI', 'Google Workspace', 'Python', 'React', 'Node.js', 'n8n', 'PHP', 'Make.com', 'ElevenLabs'],
                activeIndex: -1,
                init() {
                    setInterval(() => {
                        this.activeIndex = Math.floor(Math.random() * (this.items.length * 2));
                        setTimeout(() => this.activeIndex = -1, 1500); // Reset after 1.5s
                    }, 3000); // New highlight every 3s
                }
             }">
            <div class="flex gap-16 animate-marquee w-max opacity-60 hover:opacity-100 transition-opacity duration-500">
                <!-- Original Set -->
                <template x-for="(item, index) in items" :key="'orig-'+index">
                    <span x-text="item"
                          :class="activeIndex === index ? '!grayscale-0 text-indigo-600 drop-shadow-md scale-110' : ''"
                          class="font-semibold text-[1.2rem] text-gray-800 grayscale transition-all duration-300">
                    </span>
                </template>
                <!-- Duplicate Set for Seamless Loop -->
                <template x-for="(item, index) in items" :key="'copy-'+index">
                    <span x-text="item"
                          :class="activeIndex === (items.length + index) ? '!grayscale-0 text-indigo-600 drop-shadow-md scale-110' : ''"
                          class="font-semibold text-[1.2rem] text-gray-800 grayscale transition-all duration-300">
                    </span>
                </template>
            </div>
        </div>
    </div>
</section>

<!-- Feature Grid -->
<section id="services" class="py-16 bg-surface scroll-mt-24">
    <div class="max-w-[1200px] mx-auto px-8 w-full">
        <div class="mb-16 max-w-[600px]">
            <h2 class="text-[2.5rem] mb-4 tracking-[-0.5px]">What We Offer</h2>
            <p class="text-[1.125rem] text-text-light leading-[1.6]">Customized AI solutions that automate
                processes and empower your
                business to grow.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-8">
            <!-- Card 1 -->
            <div
                class="bg-white border border-border rounded-3xl overflow-hidden transition-all duration-200 flex flex-col hover:-translate-y-1 hover:shadow-[0_12px_24px_rgba(0,0,0,0.05)] md:col-span-2">
                <div class="p-8 pb-6">
                    <h3 class="text-xl mb-4 font-semibold">End-to-End Web App Development</h3>
                    <p class="text-[0.95rem] text-text-light mb-8">We tailor your application to your
                        organization's exact needs, using robust frameworks
                        and best practices for long-term success.</p>
                    <a href="#"
                        class="text-sm font-medium text-text pb-[1px] border-b border-transparent hover:border-current transition-colors">Learn
                        more &rarr;</a>
                </div>
                <div class="h-[200px] w-full mt-auto">
                    <img src="{{ asset('images/home/services/web-dev.jpg') }}" alt="Web App Development" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white border border-border rounded-3xl overflow-hidden transition-all duration-200 flex flex-col hover:-translate-y-1 hover:shadow-[0_12px_24px_rgba(0,0,0,0.05)]">
                <div class="p-8 pb-6">
                    <h3 class="text-xl mb-4 font-semibold">Google Workspace Automation</h3>
                    <p class="text-[0.95rem] text-text-light mb-8">Automated reports and seamless integrations
                        that reduce manual tasks.</p>
                    <a href="#"
                        class="text-sm font-medium text-text pb-[1px] border-b border-transparent hover:border-current transition-colors">Learn
                        more &rarr;</a>
                </div>
                <div class="h-[200px] w-full mt-auto">
                    <img src="{{ asset('images/home/services/workspace-automation.jpg') }}" alt="Google Workspace Automation" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white border border-border rounded-3xl overflow-hidden transition-all duration-200 flex flex-col hover:-translate-y-1 hover:shadow-[0_12px_24px_rgba(0,0,0,0.05)]">
                <div class="p-8 pb-6">
                    <h3 class="text-xl mb-4 font-semibold">Browser & Data Processing</h3>
                    <p class="text-[0.95rem] text-text-light mb-8">Automate repetitive routines and data
                        interactions across multiple platforms.</p>
                    <a href="#"
                        class="text-sm font-medium text-text pb-[1px] border-b border-transparent hover:border-current transition-colors">Learn
                        more &rarr;</a>
                </div>
                <div class="h-[200px] w-full mt-auto">
                    <img src="{{ asset('images/home/services/browser-automation.jpg') }}" alt="Browser & Data Processing" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Card 4 -->
            <div
                class="bg-white border border-border rounded-3xl overflow-hidden transition-all duration-200 flex flex-col hover:-translate-y-1 hover:shadow-[0_12px_24px_rgba(0,0,0,0.05)]">
                <div class="p-8 pb-6">
                    <h3 class="text-xl mb-4 font-semibold">AI & Machine Learning</h3>
                    <p class="text-[0.95rem] text-text-light mb-8">Integrate advanced AI models to bring real
                        intelligence to your operations.</p>
                    <a href="#"
                        class="text-sm font-medium text-text pb-[1px] border-b border-transparent hover:border-current transition-colors">Learn
                        more &rarr;</a>
                </div>
                <div class="h-[200px] w-full mt-auto">
                    <img src="{{ asset('images/home/services/ai-ml.jpg') }}" alt="AI & Machine Learning" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Card 5 -->
            <div
                class="bg-white border border-border rounded-3xl overflow-hidden transition-all duration-200 flex flex-col hover:-translate-y-1 hover:shadow-[0_12px_24px_rgba(0,0,0,0.05)]">
                <div class="p-8 pb-6">
                    <h3 class="text-xl mb-4 font-semibold">n8n Workflow Automation</h3>
                    <p class="text-[0.95rem] text-text-light mb-8">Powerful, scalable workflows that connect
                        your tools and automate processes.</p>
                    <a href="#"
                        class="text-sm font-medium text-text pb-[1px] border-b border-transparent hover:border-current transition-colors">Learn
                        more &rarr;</a>
                </div>
                <div class="h-[200px] w-full mt-auto">
                    <img src="{{ asset('images/home/services/n8n-workflow.jpg') }}" alt="n8n Workflow Automation" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Card 6 -->
            <div
                class="bg-white border border-border rounded-3xl overflow-hidden transition-all duration-200 flex flex-col hover:-translate-y-1 hover:shadow-[0_12px_24px_rgba(0,0,0,0.05)]">
                <div class="p-8 pb-6">
                    <h3 class="text-xl mb-4 font-semibold">Data Analytics</h3>
                    <p class="text-[0.95rem] text-text-light mb-8">Transform raw data into actionable insights
                        for better decision making.</p>
                    <a href="#"
                        class="text-sm font-medium text-text pb-[1px] border-b border-transparent hover:border-current transition-colors">Learn
                        more &rarr;</a>
                </div>
                <div class="h-[200px] w-full mt-auto">
                    <img src="{{ asset('images/home/services/data-analytics.jpg') }}" alt="Data Analytics" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Case Studies Section -->
<section class="py-16 bg-surface border-t border-border">
    <div class="max-w-[1200px] mx-auto px-8 w-full">
        <div class="mb-12 max-w-[700px] mx-auto text-center">
            <h2 class="text-[2.5rem] mb-4 tracking-[-0.5px] leading-tight text-slate-900">Featured Case Studies
            </h2>
            <p class="text-[1.125rem] text-text-light leading-[1.6]">Real-world results from our automation
                solutions.</p>
        </div>

        <div
            class="bg-white border border-border rounded-2xl overflow-hidden flex flex-wrap md:flex-nowrap items-stretch shadow-sm hover:shadow-md transition-shadow">
            <div class="flex-1 min-w-[300px] p-8 md:p-12">
                <div class="flex items-center flex-wrap gap-4 mb-6">
                    <span class="font-bold text-[1.1rem] text-slate-900">MRO Supply</span>
                    <span
                        class="bg-[#f0fdf4] text-[#166534] text-xs px-3 py-1 rounded-full font-semibold border border-[#dcfce7]">High-Load
                        ETL Pipeline</span>
                </div>
                <h3 class="text-[1.75rem] mb-6 leading-tight font-semibold text-slate-900">Production-Ready Data
                    Migration System</h3>

                <div class="flex flex-wrap gap-8 mb-8 pb-8 border-b border-border">
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-[#4a6b0c]">10,000+</span>
                        <span class="text-sm text-text-light mt-1">Assets Migrated</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-[#4a6b0c]">Fault-Tolerant</span>
                        <span class="text-sm text-text-light mt-1">Architecture</span>
                    </div>
                </div>

                <div class="flex flex-col gap-6 mb-8">
                    <div>
                        <h4 class="text-[0.85rem] uppercase tracking-wider text-slate-500 mb-2 font-bold">The
                            Challenge</h4>
                        <p class="text-[0.95rem] text-text-light leading-relaxed">Migrating 10,000+ complex
                            assets and "living" documents from Monday.com with strict
                            data integrity requirements.</p>
                    </div>
                    <div>
                        <h4 class="text-[0.85rem] uppercase tracking-wider text-slate-500 mb-2 font-bold">The
                            Solution</h4>
                        <p class="text-[0.95rem] text-text-light leading-relaxed">A multi-threaded Python ETL
                            pipeline with state management, smart image compression,
                            and Playwright-based document rendering.</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mt-8">
                    <span
                        class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-[0.85rem] font-medium border border-slate-200">Python
                        (Async/Threading)</span>
                    <span
                        class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-[0.85rem] font-medium border border-slate-200">GraphQL
                        API</span>
                    <span
                        class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-[0.85rem] font-medium border border-slate-200">Playwright</span>
                    <span
                        class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-[0.85rem] font-medium border border-slate-200">Google
                        Drive API</span>
                </div>

                <a href="{{ route('pages.mro-case-study') }}"
                    class="inline-flex mt-10 bg-slate-900 text-white font-medium text-[0.95rem] px-8 py-3 rounded-lg hover:bg-slate-800 transition-colors">Read
                    Technical Case Study &rarr;</a>
            </div>

            <div class="flex-1 min-w-[300px] border-t md:border-t-0 md:border-l border-border flex flex-col items-center justify-center p-0">
                <img src="{{ asset('images/home/portfolio/mro-supply.jpg') }}" alt="MRO Supply Data Migration" class="w-full h-full object-cover">
            </div>
        </div>

        <div
            class="mt-8 bg-white border border-border rounded-2xl overflow-hidden flex flex-wrap md:flex-nowrap items-stretch shadow-sm hover:shadow-md transition-shadow">
            
            <div class="flex-1 min-w-[300px] border-b md:border-b-0 md:border-r border-border flex flex-col items-center justify-center p-12 bg-slate-50 order-2 md:order-1 relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-50/50 to-emerald-50/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <!-- Логотип Ask-CHatGPT -->
                <img src="{{ asset('images/home/portfolio/ask-chatgpt.png') }}" alt="Ask ChatGPT Extension Logo" class="w-40 h-40 object-contain drop-shadow-lg transform group-hover:scale-105 transition-transform duration-500 relative z-10">
            </div>

            <div class="flex-1 min-w-[300px] p-8 md:p-12 order-1 md:order-2">
                <div class="flex items-center flex-wrap gap-4 mb-6">
                    <span class="font-bold text-[1.1rem] text-slate-900">Ask-CHatGPT</span>
                    <span
                        class="bg-[#eff6ff] text-[#1e40af] text-xs px-3 py-1 rounded-full font-semibold border border-[#bfdbfe]">Browser Extension</span>
                </div>
                <h3 class="text-[1.75rem] mb-6 leading-tight font-semibold text-slate-900">Seamless Browser-to-LLM Integration</h3>

                <div class="flex flex-wrap gap-8 mb-8 pb-8 border-b border-border">
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-[#1e40af]">Zero</span>
                        <span class="text-sm text-text-light mt-1">Context Switching</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-[#1e40af]">MV3</span>
                        <span class="text-sm text-text-light mt-1">Secure Architecture</span>
                    </div>
                </div>

                <div class="flex flex-col gap-6 mb-8">
                    <div>
                        <h4 class="text-[0.85rem] uppercase tracking-wider text-slate-500 mb-2 font-bold">The Challenge</h4>
                        <p class="text-[0.95rem] text-text-light leading-relaxed">Fragmented workflows requiring users to constantly context-switch, copy data, and manage tabs just to query ChatGPT.</p>
                    </div>
                    <div>
                        <h4 class="text-[0.85rem] uppercase tracking-wider text-slate-500 mb-2 font-bold">The Solution</h4>
                        <p class="text-[0.95rem] text-text-light leading-relaxed">A custom Chrome Extension leveraging asynchronous Service Workers and resilient React UI injection for instant LLM access.</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mt-8">
                    <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-[0.85rem] font-medium border border-slate-200">JavaScript (ES6+)</span>
                    <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-[0.85rem] font-medium border border-slate-200">Manifest V3</span>
                    <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-[0.85rem] font-medium border border-slate-200">DOM Manipulation</span>
                </div>

                <a href="{{ route('pages.ask-chatgpt-case-study') }}"
                    class="inline-flex mt-10 bg-slate-900 text-white font-medium text-[0.95rem] px-8 py-3 rounded-lg hover:bg-slate-800 transition-colors">Read Case Study &rarr;</a>
            </div>
        </div>

        <!-- Handyman CRM Case Study -->
        <div class="mt-8 bg-white border border-border rounded-2xl overflow-hidden flex flex-wrap md:flex-nowrap items-stretch shadow-sm hover:shadow-md transition-shadow">
            <div class="flex-1 min-w-[300px] p-8 md:p-12">
                <div class="flex items-center flex-wrap gap-4 mb-6">
                    <span class="font-bold text-[1.1rem] text-slate-900">Handyman Lead CRM</span>
                    <span class="bg-[#f0fdf4] text-[#166534] text-xs px-3 py-1 rounded-full font-semibold border border-[#bbf7d0]">TALL Stack CRM</span>
                </div>
                <h3 class="text-[1.75rem] mb-6 leading-tight font-semibold text-slate-900">Intelligent Service Operations & Routing</h3>

                <div class="flex gap-8 mb-8 pb-8 border-b border-border flex-wrap">
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-[#166534]">Automated</span>
                        <span class="text-sm text-text-light mt-1">Lead Workflows</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-[#166534]">Filament v3</span>
                        <span class="text-sm text-text-light mt-1">Admin Architecture</span>
                    </div>
                </div>

                <div class="flex flex-col gap-6 mb-8">
                    <div>
                        <h4 class="text-[0.85rem] uppercase tracking-wider text-slate-500 mb-2 font-bold">The Challenge</h4>
                        <p class="text-[0.95rem] text-text-light leading-relaxed">Inefficient, fragmented communication channels causing lost leads and inaccurate preliminary estimates for service businesses.</p>
                    </div>
                    <div>
                        <h4 class="text-[0.85rem] uppercase tracking-wider text-slate-500 mb-2 font-bold">The Solution</h4>
                        <p class="text-[0.95rem] text-text-light leading-relaxed">A bespoke Laravel 12 platform uniting dynamic front-end lead capture to a powerful backend command center.</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 mb-8">
                    <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-[0.85rem] font-medium border border-slate-200">Laravel 12</span>
                    <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-[0.85rem] font-medium border border-slate-200">Livewire / Alpine</span>
                    <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-[0.85rem] font-medium border border-slate-200">Job Queues</span>
                </div>

                <a href="{{ route('pages.handyman-crm-case-study') }}"
                    class="inline-flex mt-10 bg-slate-900 text-white font-medium text-[0.95rem] px-8 py-3 rounded-lg hover:bg-slate-800 transition-colors">Read
                    Case Study &rarr;</a>
            </div>

            <div class="flex-1 min-w-[300px] border-t md:border-t-0 md:border-l border-border flex flex-col items-center justify-center p-0 bg-slate-50 relative overflow-hidden group">
                 <div class="absolute inset-0 bg-gradient-to-tr from-emerald-100/30 to-blue-50/30 opacity-80 mix-blend-multiply group-hover:opacity-100 transition-opacity duration-500"></div>
                 <div class="relative z-10 text-center p-8 transform group-hover:scale-105 transition-transform duration-500">
                      <div class="w-24 h-24 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl shadow-xl flex items-center justify-center mx-auto mb-6 transform -rotate-3 hover:rotate-0 transition-all duration-300">
                           <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                      </div>
                      <h4 class="text-2xl font-bold text-slate-800 tracking-tight">Handyman CRM</h4>
                      <p class="text-[0.95rem] text-slate-500 mt-2 font-medium">Bespoke Process Automation</p>
                 </div>
            </div>
        </div>

    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-white">
    <div class="max-w-[1200px] mx-auto px-8 w-full">
        <h2
            class="text-[2rem] md:text-[2.5rem] mb-12 tracking-[-0.5px] leading-tight text-slate-900 text-center max-w-[700px] mx-auto">
            Don't just take our word for it.</h2>
        <div class="grid grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-8">
            <!-- Testimonial 1 -->
            <div class="flex flex-col gap-5">
                <div class="w-full aspect-video bg-slate-100 rounded-xl border border-slate-200"></div>
                <div class="flex flex-col items-start">
                    <p class="text-[1rem] leading-relaxed text-slate-700 italic mb-5">"We've simplified our
                        workflows while improving accuracy,
                        and we are faster in closing with the help of automation."</p>
                    <a href="#"
                        class="inline-flex text-sm font-medium bg-slate-900 text-white px-5 py-2.5 rounded-lg hover:bg-slate-800 transition-colors mt-auto">Read
                        case study</a>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="flex flex-col gap-5">
                <div class="w-full aspect-video bg-slate-100 rounded-xl border border-slate-200"></div>
                <div class="flex flex-col items-start">
                    <p class="text-[1rem] leading-relaxed text-slate-700 italic mb-5">"AI Heroes transformed our
                        workflow, automating complex
                        tasks and saving us hundreds of hours annually."</p>
                    <a href="#"
                        class="inline-flex text-sm font-medium bg-slate-900 text-white px-5 py-2.5 rounded-lg hover:bg-slate-800 transition-colors mt-auto">Read
                        case study</a>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="flex flex-col gap-5">
                <div class="w-full aspect-video bg-slate-100 rounded-xl border border-slate-200"></div>
                <div class="flex flex-col items-start">
                    <p class="text-[1rem] leading-relaxed text-slate-700 italic mb-5">"When our teams need
                        something, they usually need it
                        right away. The more time we can save doing all those tedious tasks, the better."</p>
                    <a href="#"
                        class="inline-flex text-sm font-medium bg-slate-900 text-white px-5 py-2.5 rounded-lg hover:bg-slate-800 transition-colors mt-auto">Read
                        case study</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="py-16 md:py-24 bg-surface">
    <div class="max-w-[1200px] mx-auto px-8 w-full text-center">
        <p class="text-[1.125rem] text-text-light mb-2">Seamless integration from start to finish.</p>
        <h2 class="text-[2.5rem] mb-12 tracking-[-0.5px] leading-tight text-slate-900">Our Process</h2>

        <div class="relative flex flex-col md:flex-row justify-between mt-12 pt-10 gap-8">
            <div class="hidden md:block absolute top-[68px] left-0 w-full h-[2px] bg-border z-[1]"></div>

            <!-- Step 1 -->
            <div class="flex-1 relative z-[2] flex flex-col items-center">
                <div
                    class="bg-white border border-border px-4 py-1.5 rounded-full text-xs font-semibold mb-8 shadow-sm">
                    Step 1</div>
                <div class="bg-white border border-border rounded-xl p-8 text-left w-full h-full shadow-sm">
                    <h3 class="text-[1.1rem] font-semibold mb-4 text-slate-900">Discovery</h3>
                    <ul class="flex flex-col gap-3">
                        <li class="relative pl-6 text-[13px] text-text-light"><span
                                class="absolute left-0 text-accent font-bold">✓</span>Understand your goals</li>
                        <li class="relative pl-6 text-[13px] text-text-light"><span
                                class="absolute left-0 text-accent font-bold">✓</span>Identify pain points</li>
                        <li class="relative pl-6 text-[13px] text-text-light"><span
                                class="absolute left-0 text-accent font-bold">✓</span>Free initial consultation
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex-1 relative z-[2] flex flex-col items-center">
                <div
                    class="bg-white border border-border px-4 py-1.5 rounded-full text-xs font-semibold mb-8 shadow-sm">
                    Step 2</div>
                <div class="bg-white border border-border rounded-xl p-8 text-left w-full h-full shadow-sm">
                    <h3 class="text-[1.1rem] font-semibold mb-4 text-slate-900">Planning</h3>
                    <ul class="flex flex-col gap-3">
                        <li class="relative pl-6 text-[13px] text-text-light"><span
                                class="absolute left-0 text-accent font-bold">✓</span>Tailored plan creation
                        </li>
                        <li class="relative pl-6 text-[13px] text-text-light"><span
                                class="absolute left-0 text-accent font-bold">✓</span>Specific timeline & budget
                        </li>
                        <li class="relative pl-6 text-[13px] text-text-light"><span
                                class="absolute left-0 text-accent font-bold">✓</span>Clear roadmap approval
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex-1 relative z-[2] flex flex-col items-center">
                <div
                    class="bg-white border border-border px-4 py-1.5 rounded-full text-xs font-semibold mb-8 shadow-sm">
                    Step 3</div>
                <div class="bg-white border border-border rounded-xl p-8 text-left w-full h-full shadow-sm">
                    <h3 class="text-[1.1rem] font-semibold mb-4 text-slate-900">Execution</h3>
                    <ul class="flex flex-col gap-3">
                        <li class="relative pl-6 text-[13px] text-text-light"><span
                                class="absolute left-0 text-accent font-bold">✓</span>Design & Development</li>
                        <li class="relative pl-6 text-[13px] text-text-light"><span
                                class="absolute left-0 text-accent font-bold">✓</span>Regular progress updates
                        </li>
                        <li class="relative pl-6 text-[13px] text-text-light"><span
                                class="absolute left-0 text-accent font-bold">✓</span>Training & Support</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Efficiency Section (Dark) -->
<section id="features" class="py-20 bg-slate-950 text-slate-50 scroll-mt-24">
    <div class="max-w-[1200px] mx-auto px-8 w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center">
            <div>
                <h2 class="text-[2rem] md:text-[2.5rem] mb-10 md:mb-12 tracking-[-0.5px] leading-tight">Why
                    Choose AI Heroes?</h2>

                <div class="mb-8 border-l-2 border-slate-800 pl-6 md:pl-8">
                    <h3 class="text-[1.25rem] font-semibold mb-2 text-slate-50">Security First</h3>
                    <p class="text-slate-400 text-[1rem] leading-relaxed">Enterprise-grade security for your AI
                        solutions, protecting your data at every step.</p>
                </div>

                <div class="mb-8 border-l-2 border-slate-800 pl-6 md:pl-8">
                    <h3 class="text-[1.25rem] font-semibold mb-2 text-slate-50">Tailored Solutions</h3>
                    <p class="text-slate-400 text-[1rem] leading-relaxed">We build exactly what you need,
                        customized to fit your specific business processes.</p>
                </div>

                <div class="mb-8 border-l-2 border-slate-800 pl-6 md:pl-8">
                    <h3 class="text-[1.25rem] font-semibold mb-2 text-slate-50">Scalable Architecture</h3>
                    <p class="text-slate-400 text-[1rem] leading-relaxed">Projects designed to expand alongside
                        your business, adapting to future growth.</p>
                </div>
            </div>
            <div class="w-full">
                <!-- Placeholder for dashboard UI -->
                <div
                    class="bg-[#1a1a1a] rounded-2xl h-[350px] md:h-[450px] border border-[#333] relative overflow-hidden shadow-2xl">
                    <div class="h-[48px] border-b border-[#333] bg-[#111] flex items-center px-5 gap-2.5">
                        <div class="w-3.5 h-3.5 rounded-full bg-slate-700"></div>
                        <div class="w-3.5 h-3.5 rounded-full bg-slate-700"></div>
                        <div class="w-3.5 h-3.5 rounded-full bg-slate-700"></div>
                    </div>
                    <div class="p-6 h-full flex items-center justify-center">
                        <span class="text-slate-700 font-mono text-sm">[ Dashboard Mockup ]</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Segmentation Section -->
<section class="py-20 bg-surface">
    <div class="max-w-[1200px] mx-auto px-8 w-full text-center">
        <h2 class="text-[2rem] md:text-[2.5rem] mb-12 tracking-[-0.5px] leading-tight text-slate-900">Solutions
            for Everyone</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12 max-w-[900px] mx-auto">
            <div
                class="bg-white p-8 md:p-10 rounded-2xl text-left border border-border shadow-sm hover:shadow-md transition-shadow flex flex-col">
                <h3 class="text-[1.5rem] md:text-[1.75rem] font-semibold mb-3 text-slate-900">Small Business
                </h3>
                <p class="mb-8 text-text-light text-[1rem] leading-relaxed">Affordable AI tools and automation
                    strategies designed for growing businesses.</p>
                <ul class="mb-10 flex flex-col gap-3">
                    <li class="flex items-center gap-3 text-slate-700 font-medium"><span
                            class="w-1.5 h-1.5 rounded-full bg-accent"></span>Process Automation</li>
                    <li class="flex items-center gap-3 text-slate-700 font-medium"><span
                            class="w-1.5 h-1.5 rounded-full bg-accent"></span>Cost-effective solutions</li>
                    <li class="flex items-center gap-3 text-slate-700 font-medium"><span
                            class="w-1.5 h-1.5 rounded-full bg-accent"></span>Quick implementation</li>
                </ul>
                <a href="#"
                    class="mt-auto inline-flex justify-center text-[0.95rem] font-medium bg-slate-900 text-white px-6 py-3 rounded-lg hover:bg-slate-800 transition-colors w-full sm:w-auto self-start">Solutions
                    for SMBs</a>
            </div>

            <div
                class="bg-white p-8 md:p-10 rounded-2xl text-left border border-border shadow-sm hover:shadow-md transition-shadow flex flex-col">
                <h3 class="text-[1.5rem] md:text-[1.75rem] font-semibold mb-3 text-slate-900">Enterprises</h3>
                <p class="mb-8 text-text-light text-[1rem] leading-relaxed">Customized AI solutions for
                    large-scale operations with complex requirements.</p>
                <ul class="mb-10 flex flex-col gap-3">
                    <li class="flex items-center gap-3 text-slate-700 font-medium"><span
                            class="w-1.5 h-1.5 rounded-full bg-accent"></span>Advanced Integrations</li>
                    <li class="flex items-center gap-3 text-slate-700 font-medium"><span
                            class="w-1.5 h-1.5 rounded-full bg-accent"></span>Data Security & Compliance</li>
                    <li class="flex items-center gap-3 text-slate-700 font-medium"><span
                            class="w-1.5 h-1.5 rounded-full bg-accent"></span>Dedicated Support</li>
                </ul>
                <a href="#"
                    class="mt-auto inline-flex justify-center text-[0.95rem] font-medium bg-slate-900 text-white px-6 py-3 rounded-lg hover:bg-slate-800 transition-colors w-full sm:w-auto self-start">Enterprise
                    Solutions</a>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="py-20 bg-surface border-t border-border scroll-mt-24">
    <div class="max-w-[1200px] mx-auto px-8 w-full">
        <h2 class="text-[2rem] md:text-[2.5rem] mb-12 tracking-[-0.5px] leading-tight text-slate-900 text-center">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">What technologies do you use?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">We specialize in Python, Google Apps Script, JavaScript, and PHP, and we integrate advanced AI models like ChatGPT, Gemini, Grok, Claude whenever beneficial. By choosing the right tools for each project, we ensure efficiency and innovation.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">Who are your typical clients?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">Our focus is on small and medium-sized businesses, startups, and independent entrepreneurs. We handle a wide range of projects, from automating daily operations to creating custom web applications and implementing AI-powered scripts.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">How does the collaboration process work?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">We begin by understanding your goals and identifying pain points in your current processes. Next, we propose a tailored plan with a specific timeline and budget. After you approve, we move on to the design and development phase, keeping you updated and engaged at every step.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">How long does it take to complete a project?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">Timelines vary based on project scope and complexity. Smaller tasks, such as creating specialized scripts, can take a couple of weeks. Larger-scale web applications or AI integrations may span several months. We always provide a clear schedule and progress reports.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">How do you price your services?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">We determine pricing on a case-by-case basis. Simple projects may incur hourly rates, while more extensive tasks often come with a fixed fee or combined structure. We aim to be transparent and competitive, ensuring our solutions fit your budget.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">Do I need technical expertise to use your solutions?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">No advanced technical background is required. We design every solution with user-friendliness in mind, and we supply documentation or training as needed. Our support team is also available to address any questions that may arise.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">How do you ensure data security?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">Protecting your information is our top priority. We apply industry-standard encryption, secure connections, and best practices recommended by reputable providers like Google. Enhanced measures can be added upon request, and we are open to signing NDAs for full confidentiality.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">Can you integrate ChatGPT chatbots into existing workflows?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">Absolutely. We can embed ChatGPT or similar AI models into your website, messaging platforms (Slack, Telegram), or other systems. This allows automation of routine communication, quicker responses to inquiries, and more efficient data handling.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">What sets you apart from other providers?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">We combine practical automation with cutting-edge AI, focusing on tangible outcomes—reduced manual tasks, streamlined processes, and data-driven insights. Our hands-on approach and transparent collaboration style ensure that each solution is truly tailored to your exact needs.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">Do you offer ongoing technical support?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">Yes. Our support packages range from hourly consultations to comprehensive service agreements for updates, monitoring, and maintenance. Whether you need occasional guidance or full-time backup, we are ready to help.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">Can your solutions scale over time?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">They can. Our projects are designed to expand alongside your business. If you need more features or new integrations, we can adapt existing systems to accommodate future growth.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-border rounded-xl bg-white shadow-sm overflow-hidden">
                <button @click="open = !open" class="w-full text-left px-6 py-5 focus:outline-none flex justify-between items-center">
                    <span class="text-[1.1rem] font-semibold text-slate-900">Do you offer a free consultation?</span>
                    <svg class="w-5 h-5 transform transition-transform duration-200 text-slate-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" style="display: none;" class="px-6 pb-5">
                    <p class="text-[1rem] text-text-light leading-relaxed">We typically begin all engagements with a call or meeting to discuss your objectives at no charge. It’s an opportunity for us to learn about your needs and outline how our services can add value to your business.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<section class="py-20 bg-surface border-t border-border mt-12" id="contact">
    <div class="max-w-[1200px] mx-auto px-8 w-full text-center">
        <h2 class="text-[2rem] md:text-[2.5rem] mb-10 tracking-[-0.5px] leading-tight text-slate-900">Ready to
            transform your business?</h2>
        <div class="max-w-[480px] mx-auto mt-8">
            <form x-data @submit.prevent="$dispatch('open-estimate-modal', { email: $el.querySelector('input').value })" class="flex flex-col sm:flex-row mb-8 w-full bg-white p-2 px-4 sm:p-1.5 sm:px-1.5 rounded-[100px] shadow-lg gap-2 sm:gap-0">
                <label for="footer_email" class="sr-only">Enter your email</label>
                <input id="footer_email" type="email" placeholder="Enter your email"
                    class="flex-1 border-none px-2 sm:px-6 py-2 sm:py-3 text-[1.05rem] outline-none text-slate-900 bg-transparent min-w-0 appearance-none m-0 focus:ring-0 placeholder:text-slate-400"
                    >
                <button type="submit"
                    class="bg-accent text-slate-950 font-medium text-[1.05rem] px-8 py-3 rounded-[100px] hover:bg-accent-hover transition-colors whitespace-nowrap w-full sm:w-auto">
                    Get an Estimate
                </button>
            </form>
            <div class="mt-8 text-slate-500 text-[0.95rem]">
                <p class="mb-3">Or reach us directly:</p>
                <div class="flex flex-col gap-2 items-center justify-center">
                    <a href="#"
                        class="js-email-link text-slate-900 font-semibold hover:text-accent-hover transition-colors">[Loading
                        Email...]</a>
                    <a href="#"
                        class="js-phone-link text-slate-900 font-semibold hover:text-accent-hover transition-colors">[Loading
                        Phone...]</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
