<!--
This partial is responsible for rendering the public-facing main navigation.
It dynamically builds the menu from the `menu_items` table in the database.
It supports one level of nesting for dropdown menus.
-->
<nav class="flex-1 flex items-center justify-center">
    <ul class="flex items-center space-x-6">
        <!-- Loop through each top-level menu item -->
        @foreach ($menuItems as $menuItem)
            {{-- Check if the menu item has children --}}
            @if ($menuItem->children->isEmpty())
                {{-- If it has no children, render a simple link --}}
                <li>
                    <a href="{{ url($menuItem->url) }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-300">{{ $menuItem->title }}</a>
                </li>
            @else
                {{-- If it has children, render a dropdown --}}
                <li class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button type="button" class="flex items-center text-gray-700 hover:text-blue-600 transition-colors duration-300">
                        <span>{{ $menuItem->title }}</span>
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>

                    {{-- Dropdown Panel --}}
                    <div x-show="open" x-transition class="absolute z-10 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                        <ul class="py-1">
                            {{-- Loop through children to create dropdown links --}}
                            @foreach ($menuItem->children as $child)
                                <li>
                                    <a href="{{ url($child->url) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ $child->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>
</nav>
