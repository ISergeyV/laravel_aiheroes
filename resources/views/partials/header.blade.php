@inject('siteSettings', 'App\Settings\SiteSettings')
<header class="sticky top-0 z-[1000] bg-white border-b border-transparent transition-colors duration-300">
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
                class="inline-flex items-center justify-center px-8 h-12 rounded font-medium transition-all duration-200 bg-gradient-to-br from-indigo-600 to-pink-500 text-white shadow-[0_4px_6px_-1px_rgba(79,70,229,0.4)] border border-white/10 hover:from-indigo-700 hover:to-pink-600 hover:shadow-[0_10px_15px_-3px_rgba(79,70,229,0.5)] hover:-translate-y-[1px]">Get
                Started</button>
        </div>
    </div>
</header>
