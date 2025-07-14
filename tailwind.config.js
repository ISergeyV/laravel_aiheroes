export default {
    content: [
        "./resources/views/**/*.blade.php",
        // Путь к стандартным шаблонам пагинации Laravel
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        // Путь к кэшированным/скомпилированным шаблонам для надежности
        './storage/framework/views/*.php',
        // Путь к вашим JS-файлам
        './resources/js/**/*.js',
    ],
    safelist: [
        "text-4xl",
        "test-tailwind"
    ],
    theme: {
        extend: {
            colors: {
                'brand-orange': '#e67e22', // Даем осмысленное имя
                // ... другие цвета
            }
        },
    },

    plugins: [],
}
