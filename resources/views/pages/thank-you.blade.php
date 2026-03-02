{{-- resources/views/pages/thank-you.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You | AI Heroes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center font-sans text-slate-900 antialiased selection:bg-indigo-500 selection:text-white">
    <div class="max-w-xl w-full px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-[0_12px_24px_rgba(0,0,0,0.05)] border border-slate-100 p-8 md:p-12 text-center relative overflow-hidden">
            
            <!-- Decorative Background Element -->
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-gradient-to-br from-indigo-500/20 to-pink-500/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-gradient-to-br from-indigo-500/20 to-pink-500/20 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Success Icon -->
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-8 relative z-10">
                <svg class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-slate-900 mb-4 relative z-10">
                Thank You!
            </h1>
            
            <p class="text-lg text-slate-600 mb-8 relative z-10 font-medium">
                Your estimate request has been submitted successfully.
            </p>
            
            <p class="text-slate-500 mb-10 relative z-10 max-w-sm mx-auto">
                We have received your information and our AI experts will get back to you within 1-2 business days with a preliminary assessment.
            </p>

            <div class="relative z-10">
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center justify-center px-8 h-12 rounded-full font-medium transition-all duration-300 bg-gradient-to-br from-indigo-600 to-pink-500 text-white shadow-[0_4px_6px_-1px_rgba(79,70,229,0.4)] border border-white/10 hover:from-indigo-700 hover:to-pink-600 hover:shadow-[0_10px_15px_-3px_rgba(79,70,229,0.5)] hover:-translate-y-[2px]">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Return to Homepage
                </a>
            </div>
            
            {{-- Google Ads Tracking Code Placement --}}
            {{--
            <script>
              gtag('event', 'conversion', {'send_to': 'AW-YOUR_CONVERSION_ID/YOUR_CONVERSION_LABEL'});
            </script>
            --}}
        </div>
    </div>
</body>
</html>
