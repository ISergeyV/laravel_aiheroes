{{-- resources/views/pages/thank-you.blade.php --}}
<x-guest-layout>
    <div class="container mx-auto px-4 py-16 text-center">
        <h1 class="text-4xl font-bold text-green-600">Thank You!</h1>
        <p class="mt-4 text-lg text-gray-700">
            Your estimate request has been submitted successfully.
        </p>
        <p class="mt-2 text-gray-600">
            We have received your information and will get back to you within 1-2 business days.
        </p>
        <a href="{{ url('/') }}" class="mt-8 inline-block bg-blue-600 text-white font-bold py-3 px-6 rounded-lg">
            &larr; Back to Home
        </a>
    </div>

    {{--
        ЗДЕСЬ ВЫ МОЖЕТЕ ВСТАВИТЬ КОД ОТСЛЕЖИВАНИЯ КОНВЕРСИЙ GOOGLE ADS
        Например:
        <script>
          gtag('event', 'conversion', {'send_to': 'AW-YOUR_CONVERSION_ID/YOUR_CONVERSION_LABEL'});
        </script>
    --}}
</x-guest-layout>
