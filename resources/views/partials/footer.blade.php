@inject('siteSettings', 'App\Settings\SiteSettings')
<footer class="bg-white pt-20 pb-10 border-t border-border text-[14px]">
    <div class="max-w-[1200px] mx-auto px-8 w-full">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr_1fr_1fr] md:gap-8 gap-6 mb-16">
            <div class="flex flex-col">
                <a href="{{ url('/') }}" class="inline-block font-bold text-[24px] tracking-[-0.5px] mb-4 text-slate-900">{{ $siteSettings->company_name ?: 'AI Heroes' }}</a>
                <p class="text-text-light max-w-[280px]">{{ filled($siteSettings->company_slogan) ? $siteSettings->company_slogan : "Empowering the future with AI. We tailor your application to your organization's exact needs." }}</p>
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
            <p>&copy; {{ date('Y') }} {{ $siteSettings->company_name ?: 'AI Heroes' }}. All rights reserved.</p>
            <div class="flex gap-5 justify-center items-center">
                <style>
                    /* Bypass Vite build cache by embedding directly */
                    .social-link-twitter:hover { color: #1DA1F2 !important; opacity: 1 !important; }
                    .social-link-linkedin:hover { color: #0A66C2 !important; opacity: 1 !important; }
                    .social-link-instagram:hover { color: #E1306C !important; opacity: 1 !important; }
                    .social-link-youtube:hover { color: #FF0000 !important; opacity: 1 !important; }
                </style>
                @if($siteSettings->twitter_enabled && $siteSettings->twitter_url)
                    <a href="{{ $siteSettings->twitter_url }}" target="_blank" aria-label="X (Twitter)"
                        class="text-text-light social-link-twitter transition-all duration-300">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                @endif
                @if($siteSettings->linkedin_enabled && $siteSettings->linkedin_url)
                    <a href="{{ $siteSettings->linkedin_url }}" target="_blank" aria-label="LinkedIn"
                        class="text-text-light social-link-linkedin transition-all duration-300">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                @endif
                @if($siteSettings->instagram_enabled && $siteSettings->instagram_url)
                    <a href="{{ $siteSettings->instagram_url }}" target="_blank" aria-label="Instagram"
                        class="text-text-light social-link-instagram transition-all duration-300">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                @endif
                @if($siteSettings->youtube_enabled && $siteSettings->youtube_url)
                    <a href="{{ $siteSettings->youtube_url }}" target="_blank" aria-label="YouTube"
                        class="text-text-light social-link-youtube transition-all duration-300">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.377.55a3.016 3.016 0 0 0-2.122 2.136C0 8.07 0 12 0 12s0 3.93.501 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.55 9.377.55 9.377.55s7.505 0 9.377-.55a3.016 3.016 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>
</footer>
