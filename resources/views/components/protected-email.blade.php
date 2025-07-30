{{-- resources/views/components/protected-email.blade.php --}}

@props([
    // Мы будем передавать email в закодированном виде (Base64)
    'encoded',
    // Иконка по умолчанию
    'icon' => 'heroicon-o-envelope'
])

<div
    x-data="{
        email: '',

        // Блок init декодирует email при загрузке страницы
        init() {
            try {
                // atob() - это стандартная JS-функция для декодирования из Base64
                this.email = atob('{{ $encoded }}');
            } catch (e) {
                console.error('Could not decode email address.', e);
                this.email = 'Error';
            }
        }
    }"
    {{ $attributes->merge(['class' => 'flex items-center']) }}
>
    {{-- Иконка конверта --}}
    <x-dynamic-component :component="$icon" class="w-5 h-5 mr-2 flex-shrink-0"/>

    {{--
        Ссылка, которая станет кликабельной для открытия почтового клиента.
        :href - динамически создает ссылку `mailto:info@...`
        x-text - безопасно вставляет расшифрованный email
    --}}
    <a
        :href="email ? 'mailto:' + email : '#'"
        x-text="email || 'Loading...'"
        class="font-semibold tracking-wider"
    >
        {{-- Этот текст будет виден, пока JS не отработает --}}
        Loading...
    </a>
</div>
