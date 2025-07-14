{{-- resources/views/estimate.blade.php --}}
<x-guest-layout>
    @section('title', 'Handyman Service Online Estimate Request')
    @section('description', 'Request a free, no-obligation online estimate for your handyman needs in Orange County. Fast, easy, and convenient.')

    {{-- Просто вставляем наш переиспользуемый компонент формы. --}}
    {{-- Больше никакого дублирования кода! --}}
    <x-estimate-form />

</x-guest-layout>