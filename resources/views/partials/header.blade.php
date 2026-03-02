<header class="sticky top-0 z-[1000] bg-white border-b border-transparent transition-colors duration-300">
    <div class="max-w-[1200px] mx-auto px-8 w-full flex items-center justify-between h-20">
        <a href="{{ url('/') }}" class="font-bold text-2xl tracking-tight lg:mr-8 hover:opacity-80 transition-opacity"
            aria-label="AI Heroes Home">AI Heroes</a>
        <nav class="flex-1 hidden md:block">
            <ul class="flex gap-8">
                <li><a href="/#services"
                        class="text-sm font-medium text-text hover:opacity-80 transition-opacity">Services</a></li>
                <li><a href="/#features"
                        class="text-sm font-medium text-text hover:opacity-80 transition-opacity">Features</a></li>
                <li><a href="/#faq" class="text-sm font-medium text-text hover:opacity-80 transition-opacity">FAQ</a>
                </li>
                <li><a href="{{ route('ai-news.index') }}"
                        class="text-sm font-medium text-text hover:opacity-80 transition-opacity">News</a></li>
                <li><a href="/#contact"
                        class="text-sm font-medium text-text hover:opacity-80 transition-opacity">Contact</a></li>
            </ul>
        </nav>
        <div class="flex items-center gap-4">
            <button x-data @click.prevent="$dispatch('open-estimate-modal')"
                class="inline-flex items-center justify-center px-8 h-12 rounded font-medium transition-all duration-200 bg-gradient-to-br from-indigo-600 to-pink-500 text-white shadow-[0_4px_6px_-1px_rgba(79,70,229,0.4)] border border-white/10 hover:from-indigo-700 hover:to-pink-600 hover:shadow-[0_10px_15px_-3px_rgba(79,70,229,0.5)] hover:-translate-y-[1px]">Get
                Started</button>
        </div>
    </div>
</header>
