{{-- resources/views/components/protected-phone.blade.php --}}

@props([
    'encoded',
    'icon' => 'heroicon-o-phone'
])

<div
    x-data="{
        number: '',

        // НОВЫЙ БЛОК: Добавляем вычисляемое свойство для форматирования
        get formattedNumber() {
            // Если номер еще не загружен, показываем 'Loading...'
            if (!this.number) {
                return 'Loading...';
            }

            // Очищаем номер от всего, кроме цифр
            const cleaned = ('' + this.number).replace(/\D/g, '');

            // Применяем маску для американского номера +1 (XXX) XXX-XXXX
            const match = cleaned.match(/^1(\d{3})(\d{3})(\d{4})$/);

            if (match) {
                return `+1 (${match[1]}) ${match[2]}-${match[3]}`;
            }

            // Если формат другой, просто возвращаем исходный номер
            return this.number;
        },

        // Блок init остается почти таким же
        init() {
            try {
                this.number = atob('{{ $encoded }}');
            } catch (e) {
                console.error('Could not decode phone number.', e);
                this.number = 'Error';
            }
        }
    }"
    {{ $attributes->merge(['class' => 'flex items-center']) }}
>
    {{-- Иконка телефона --}}
    <x-dynamic-component :component="$icon" class="w-5 h-5 mr-2 flex-shrink-0"/>

    {{--
        Ссылка для звонка остается прежней, она использует "чистый" номер.
        А для отображения (x-text) мы теперь используем наше новое свойство `formattedNumber`.
    --}}
    <a
        :href="number ? 'tel:' + number.replace(/\D/g, '') : '#'"
        x-text="formattedNumber"
        class="font-semibold tracking-wider"
    >
        {{-- Этот текст будет виден, пока JS не отработает --}}
        Loading...
    </a>
</div>
