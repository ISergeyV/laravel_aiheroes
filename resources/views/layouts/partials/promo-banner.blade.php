{{-- resources/views/layouts/partials/promo-banner.blade.php --}}

{{--
This banner now receives the $siteSettings object from the parent view.
It will only display if the 'promo_banner_enabled' property is true.
--}}
@if($siteSettings->promo_banner_enabled)
    <!-- Promo Banner -->
    <div
        class="sticky top-0 z-[60] flex h-10 items-center justify-center bg-amber-400 text-center text-sm font-bold text-black">
        <p>{{ $siteSettings->promo_banner_text }}</p>
    </div>
@endif
