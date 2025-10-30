{{-- resources/views/layouts/partials/promo-banner.blade.php --}}

{{--
This banner will now only display if the 'promo_banner_enabled' setting is true.
The text is pulled dynamically from the settings.
--}}
@if(settings('site.promo_banner_enabled'))
    <!-- Promo Banner -->
    <div
        class="sticky top-0 z-[60] flex h-10 items-center justify-center bg-amber-400 text-center text-sm font-bold text-black">
        <p>{{ settings('site.promo_banner_text') }}</p>
    </div>
@endif
