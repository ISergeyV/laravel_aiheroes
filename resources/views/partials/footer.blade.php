<footer class="bg-white pt-20 pb-10 border-t border-border text-[14px]">
    <div class="max-w-[1200px] mx-auto px-8 w-full">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr_1fr_1fr] md:gap-8 gap-6 mb-16">
            <div class="flex flex-col">
                <a href="{{ url('/') }}" class="inline-block font-bold text-[24px] tracking-[-0.5px] mb-4 text-slate-900">AI
                    Heroes</a>
                <p class="text-text-light max-w-[280px]">Empowering the future with AI. We tailor your application
                    to your
                    organization's exact needs.</p>
            </div>
            <div class="flex flex-col">
                <h4 class="text-[14px] font-semibold mb-4 text-slate-900">Services</h4>
                <ul class="flex flex-col gap-3">
                    <li><a href="/#services" class="text-text-light hover:text-slate-900 transition-colors">Web App
                            Development</a></li>
                    <li><a href="/#services" class="text-text-light hover:text-slate-900 transition-colors">Workspace
                            Automation</a></li>
                    <li><a href="/#services" class="text-text-light hover:text-slate-900 transition-colors">AI
                            Integration</a></li>
                    <li><a href="/#services" class="text-text-light hover:text-slate-900 transition-colors">Data
                            Analytics</a></li>
                </ul>
            </div>
            <div class="flex flex-col">
                <h4 class="text-[14px] font-semibold mb-4 text-slate-900">Resources</h4>
                <ul class="flex flex-col gap-3">
                    <li><a href="#" class="text-text-light hover:text-slate-900 transition-colors">Blog</a></li>
                    <li><a href="/#features" class="text-text-light hover:text-slate-900 transition-colors">Case Studies</a>
                    </li>
                    <li><a href="/#faq" class="text-text-light hover:text-slate-900 transition-colors">FAQ</a></li>
                    <li><button x-data @click.prevent="$dispatch('open-estimate-modal')" class="text-text-light hover:text-slate-900 transition-colors">Contact</button></li>
                </ul>
            </div>
            <div class="flex flex-col">
                <h4 class="text-[14px] font-semibold mb-4 text-slate-900">Contact</h4>
                <ul class="flex flex-col gap-3">
                    <li><a href="mailto:hello@aiheroes.net"
                            class="js-email-link text-text-light hover:text-slate-900 transition-colors">hello@aiheroes.net</a></li>
                    <li><a href="tel:+13235443224"
                            class="js-phone-link text-text-light hover:text-slate-900 transition-colors">(323) 544-3224</a></li>
                </ul>
            </div>
        </div>
        <div
            class="flex flex-col md:flex-row justify-between items-center gap-4 pt-6 border-t border-border text-text-light text-center md:text-left">
            <p>&copy; {{ date('Y') }} AI Heroes. All rights reserved.</p>
            <div class="flex gap-4 justify-center">
                <a href="#" class="hover:text-slate-900 transition-colors">Twitter</a>
                <a href="#" class="hover:text-slate-900 transition-colors">LinkedIn</a>
            </div>
        </div>
    </div>
</footer>
