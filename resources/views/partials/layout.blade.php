<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AI Heroes | Empowering Innovation with AI')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Vite CSS/JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-sans antialiased bg-white text-slate-900">
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    
    @include('partials.anti-bot-script')
    
    <!-- Estimate Modal Wrapper -->
    <div id="estimateModalWrapper" x-data="{ open: false }" 
         @open-estimate-modal.window="open = true; setTimeout(() => document.getElementById('wizard_email')?.focus(), 100)"
         @close-estimate-modal.window="open = false"
         x-show="open" 
         style="display: none;"
         class="fixed inset-0 z-50 flex items-center justify-center pt-20 pb-4 px-4 sm:p-6">
        
        <!-- Backdrop -->
        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" @click="open = false"></div>
        
        <!-- Modal Content -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative bg-transparent rounded-3xl w-full max-w-4xl max-h-[90vh] overflow-y-auto z-10 scrollbar-hide">
             
             <!-- Close Button -->
             <button @click="open = false" type="button" class="absolute top-10 right-8 md:right-12 z-20 p-2 bg-slate-100 hover:bg-slate-200 text-slate-500 hover:text-slate-800 rounded-full transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
             </button>

             <x-wizard-form />
        </div>
    </div>
    
    @stack('scripts')
</body>

</html>
