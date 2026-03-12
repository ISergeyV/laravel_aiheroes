@inject('siteSettings', 'App\Settings\SiteSettings')
<header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-[1000] bg-white border-b border-transparent transition-colors duration-300">
    <div class="max-w-[1200px] mx-auto px-8 w-full flex items-center justify-between h-20">
        <a href="{{ url('/') }}" class="flex items-center gap-3 lg:mr-8 hover:opacity-80 transition-opacity" aria-label="Home">
            @if($siteSettings->company_logo)
                <img src="{{ asset('storage/' . $siteSettings->company_logo) }}" alt="{{ $siteSettings->company_name }} Logo" class="h-10 w-auto object-contain">
            @endif
            @if($siteSettings->company_name)
                <span class="font-bold text-2xl tracking-tight">{{ $siteSettings->company_name }}</span>
            @else
                <span class="font-bold text-2xl tracking-tight">AI Heroes</span>
            @endif
        </a>
        <nav class="flex-1 hidden md:block">
            <ul class="flex gap-8">
                @foreach ($menuItems as $menuItem)
                    @if ($menuItem->children->isEmpty())
                        <li><a href="{{ url($menuItem->url) }}"
                                class="text-sm font-medium text-text hover:opacity-80 transition-opacity">{{ $menuItem->title }}</a></li>
                    @else
                        <li class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                             <button @click="dropdownOpen = !dropdownOpen"
                                     class="text-sm font-medium text-text hover:opacity-80 transition-opacity flex items-center">
                                 {{ $menuItem->title }}
                                 <svg class="ml-1 w-4 h-4 transform transition-transform"
                                      :class="{ 'rotate-180': dropdownOpen }" fill="currentColor" viewBox="0 0 20 20">
                                     <path fill-rule="evenodd"
                                           d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                           clip-rule="evenodd"></path>
                                 </svg>
                             </button>
                             <div x-show="dropdownOpen" x-transition x-cloak
                                  class="absolute left-0 mt-2 w-48 bg-white border border-border rounded-md shadow-lg py-1 z-20">
                                 @foreach ($menuItem->children as $child)
                                     <a href="{{ url($child->url) }}"
                                        class="block px-4 py-2 text-sm text-text hover:bg-slate-50 transition-colors">{{ $child->title }}</a>
                                 @endforeach
                             </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
        <div class="flex items-center gap-4">
            <button x-data @click.prevent="$dispatch('open-estimate-modal')"
                class="hidden md:inline-flex items-center justify-center px-8 h-12 rounded font-medium transition-all duration-200 bg-gradient-to-br from-indigo-600 to-pink-500 text-white shadow-[0_4px_6px_-1px_rgba(79,70,229,0.4)] border border-white/10 hover:from-indigo-700 hover:to-pink-600 hover:shadow-[0_10px_15px_-3px_rgba(79,70,229,0.5)] hover:-translate-y-[1px]">Get
                Started</button>
            
            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-slate-600 focus:outline-none" aria-label="Toggle menu">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg x-cloak x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div x-cloak x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden absolute top-full left-0 w-full bg-white border-b border-border shadow-lg">
        <ul class="flex flex-col py-4 px-6 space-y-4">
            @foreach ($menuItems as $menuItem)
                @if ($menuItem->children->isEmpty())
                    <li>
                        <a href="{{ url($menuItem->url) }}" class="block text-base font-medium text-slate-800 hover:text-indigo-600 transition-colors">{{ $menuItem->title }}</a>
                    </li>
                @else
                    <li x-data="{ dropdownOpen: false }">
                         <button @click="dropdownOpen = !dropdownOpen" class="flex items-center justify-between w-full text-base font-medium text-slate-800 hover:text-indigo-600 transition-colors">
                             {{ $menuItem->title }}
                             <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': dropdownOpen }" fill="currentColor" viewBox="0 0 20 20">
                                 <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                             </svg>
                         </button>
                         <div x-show="dropdownOpen" x-collapse x-cloak class="mt-2 pl-4 border-l-2 border-indigo-100">
                             @foreach ($menuItem->children as $child)
                                 <a href="{{ url($child->url) }}" class="block py-2 text-sm text-slate-600 hover:text-indigo-600 transition-colors">{{ $child->title }}</a>
                             @endforeach
                         </div>
                    </li>
                @endif
            @endforeach
            <li class="pt-4 border-t border-slate-100">
                <button x-data @click.prevent="$dispatch('open-estimate-modal')" class="w-full flex items-center justify-center px-4 py-3 rounded-md font-medium bg-gradient-to-r from-indigo-600 to-pink-500 text-white shadow-md">Get Started</button>
            </li>
        </ul>
    </div>
    </div>
</header>
