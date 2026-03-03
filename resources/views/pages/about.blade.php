@extends('partials.layout')

@section('title', 'About Us | AI Heroes')
@section('description', 'Learn more about AI Heroes and our mission to empower innovation with AI & Automation.')

@section('content')
<!-- Hero Section -->
<section
    class="relative h-[60vh] min-h-[500px] flex items-center bg-slate-950 text-slate-50 overflow-hidden -mt-20 pt-[120px]">
    <div class="max-w-[1200px] mx-auto px-8 w-full relative z-[2]">
        <div class="max-w-[800px]">
            <div class="inline-flex items-center text-[13px] font-medium mb-8 opacity-90">
                <span
                    class="mr-2 text-[10px] border border-current rounded-full w-4 h-4 flex items-center justify-center">▶</span>
                Who We Are
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-[4rem] font-bold leading-[1.1] tracking-tight mb-8">
                Pioneering the Future of Automation
            </h1>
            <p class="text-lg leading-[1.6] mb-8 opacity-90 max-w-[600px]">
                We are a dedicated team of AI & Automation experts driven by a singular mission: to empower your organization's innovation by integrating advanced AI models and automating complex workflows.
            </p>
        </div>
    </div>
    <div class="absolute inset-0 w-full h-full z-[1] bg-cover bg-center"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');">
    </div>
</section>

<!-- Our Mission & Vision -->
<section class="py-20 bg-white">
    <div class="max-w-[1200px] mx-auto px-8 w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
            <div>
                <h2 class="text-[2rem] font-bold mb-6 text-slate-900 tracking-[-0.5px]">Our Mission</h2>
                <p class="text-[1.125rem] text-text-light leading-[1.6] mb-6">
                    Our mission is simple yet profound: to automate repetitive routines, seamlessly connect disparate tools, and integrate advanced AI capabilities to bring true intelligence to your daily operations.
                </p>
                <p class="text-[1.125rem] text-text-light leading-[1.6]">
                    By eliminating manual bottlenecks, we enable your team to focus on high-value, strategic work—ultimately saving hundreds of hours annually and drastically reducing operational costs.
                </p>
            </div>
            <div>
                <h2 class="text-[2rem] font-bold mb-6 text-slate-900 tracking-[-0.5px]">Our Approach</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center flex-shrink-0 text-slate-800 font-bold border border-border">1</div>
                        <div>
                            <h3 class="text-[1.25rem] font-semibold text-slate-900 mb-2">Tailored Exactly for You</h3>
                            <p class="text-[1rem] text-text-light leading-relaxed">Unlike off-the-shelf software, our solutions are built around your unique organizational needs and processes.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center flex-shrink-0 text-slate-800 font-bold border border-border">2</div>
                        <div>
                            <h3 class="text-[1.25rem] font-semibold text-slate-900 mb-2">Security at the Core</h3>
                            <p class="text-[1rem] text-text-light leading-relaxed">We implement enterprise-grade security protocols to ensure your data is protected at every integration point.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center flex-shrink-0 text-slate-800 font-bold border border-border">3</div>
                        <div>
                            <h3 class="text-[1.25rem] font-semibold text-slate-900 mb-2">Built to Scale</h3>
                            <p class="text-[1rem] text-text-light leading-relaxed">We utilize robust frameworks such as Laravel, Vue, and powerful APIs to ensure your systems grow with your business.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Proof / Technologies -->
<section class="py-16 border-y border-border bg-surface">
    <div class="max-w-[1200px] mx-auto px-8 w-full">
        <p class="text-center mb-8 text-text-light text-sm font-semibold uppercase tracking-wider">Technologies We Master</p>
        <div class="relative overflow-hidden flex whitespace-nowrap" style="mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);"
             x-data="{
                items: ['OpenAI', 'Google Workspace', 'Python', 'React', 'Node.js', 'n8n', 'PHP', 'Make.com', 'ElevenLabs', 'Laravel', 'Vue.js', 'Tailwind CSS'],
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

<!-- Timeline Section -->
<section class="py-20 md:py-24 bg-white">
    <div class="max-w-[1200px] mx-auto px-8 w-full text-center">
        <p class="text-[1.125rem] text-text-light mb-2">From concept to deployment.</p>
        <h2 class="text-[2.5rem] mb-12 tracking-[-0.5px] leading-tight text-slate-900 font-bold">How We Work</h2>

        <div class="relative flex flex-col md:flex-row justify-between mt-12 pt-10 gap-8">
            <div class="hidden md:block absolute top-[68px] left-0 w-full h-[2px] bg-border z-[1]"></div>

            <!-- Step 1 -->
            <div class="flex-1 relative z-[2] flex flex-col items-center">
                <div class="bg-surface border border-border px-4 py-1.5 rounded-full text-xs font-semibold mb-8 shadow-sm text-slate-800">Step 1</div>
                <div class="bg-white border border-border rounded-xl p-8 text-left w-full h-full shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-[1.25rem] font-bold mb-4 text-slate-900">Discovery & Architecture</h3>
                    <p class="text-[0.95rem] text-text-light mb-6">We dive deep into your processes, understand your pain points, and architect a robust technical solution.</p>
                    <ul class="flex flex-col gap-3">
                        <li class="relative pl-6 text-[13px] text-text-light font-medium"><span class="absolute left-0 text-accent font-bold">✓</span>Requirements Gathering</li>
                        <li class="relative pl-6 text-[13px] text-text-light font-medium"><span class="absolute left-0 text-accent font-bold">✓</span>System Design</li>
                        <li class="relative pl-6 text-[13px] text-text-light font-medium"><span class="absolute left-0 text-accent font-bold">✓</span>Timeline & Budgeting</li>
                    </ul>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex-1 relative z-[2] flex flex-col items-center">
                <div class="bg-surface border border-border px-4 py-1.5 rounded-full text-xs font-semibold mb-8 shadow-sm text-slate-800">Step 2</div>
                <div class="bg-white border border-border rounded-xl p-8 text-left w-full h-full shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-[1.25rem] font-bold mb-4 text-slate-900">Development & Integration</h3>
                    <p class="text-[0.95rem] text-text-light mb-6">Our engineers build your custom automation solution, integrating AI models and ensuring data flows securely.</p>
                    <ul class="flex flex-col gap-3">
                        <li class="relative pl-6 text-[13px] text-text-light font-medium"><span class="absolute left-0 text-accent font-bold">✓</span>Agile Development</li>
                        <li class="relative pl-6 text-[13px] text-text-light font-medium"><span class="absolute left-0 text-accent font-bold">✓</span>API Connections</li>
                        <li class="relative pl-6 text-[13px] text-text-light font-medium"><span class="absolute left-0 text-accent font-bold">✓</span>Model Training & Prompting</li>
                    </ul>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex-1 relative z-[2] flex flex-col items-center">
                <div class="bg-surface border border-border px-4 py-1.5 rounded-full text-xs font-semibold mb-8 shadow-sm text-slate-800">Step 3</div>
                <div class="bg-white border border-border rounded-xl p-8 text-left w-full h-full shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-[1.25rem] font-bold mb-4 text-slate-900">Testing & Deployment</h3>
                    <p class="text-[0.95rem] text-text-light mb-6">Rigorous testing ensures everything works flawlessly before we seamlessly deploy the solution into your environment.</p>
                    <ul class="flex flex-col gap-3">
                        <li class="relative pl-6 text-[13px] text-text-light font-medium"><span class="absolute left-0 text-accent font-bold">✓</span>Quality Assurance</li>
                        <li class="relative pl-6 text-[13px] text-text-light font-medium"><span class="absolute left-0 text-accent font-bold">✓</span>Team Training</li>
                        <li class="relative pl-6 text-[13px] text-text-light font-medium"><span class="absolute left-0 text-accent font-bold">✓</span>Ongoing Support</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<section class="py-20 bg-slate-950 border-t border-slate-900" id="contact">
    <div class="max-w-[1200px] mx-auto px-8 w-full text-center">
        <h2 class="text-[2rem] md:text-[2.5rem] mb-6 tracking-[-0.5px] leading-tight text-white font-bold">Ready to modernize your workflow?</h2>
        <p class="text-[1.125rem] text-slate-400 mb-10 max-w-[600px] mx-auto">Get a free preliminary assessment of your automation needs from our AI experts.</p>
        
        <div class="max-w-[480px] mx-auto">
            <form x-data @submit.prevent="$dispatch('open-estimate-modal', { email: $el.querySelector('input').value })" class="flex flex-col sm:flex-row w-full bg-white/10 p-1.5 rounded-[100px] shadow-lg backdrop-blur-sm border border-white/10 focus-within:bg-white/20 transition-colors">
                <label for="footer_email" class="sr-only">Enter your email</label>
                <input id="footer_email" type="email" placeholder="Enter your business email"
                    class="flex-1 border-none px-6 py-3 text-[1.05rem] outline-none text-white bg-transparent min-w-0 appearance-none m-0 focus:ring-0 placeholder:text-slate-400"
                    >
                <button type="submit"
                    class="bg-accent text-slate-950 font-semibold text-[1.05rem] px-8 py-3 rounded-[100px] hover:bg-accent-hover transition-colors whitespace-nowrap shadow-md">
                    Get an Estimate
                </button>
            </form>
            <div class="mt-10 text-slate-400 text-[0.95rem]">
                <p class="mb-3">Have a specific question? Reach us directly:</p>
                <div class="flex flex-col gap-2 items-center justify-center">
                    <a href="#" class="js-email-link text-white font-semibold hover:text-accent transition-colors">[Loading Email...]</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
