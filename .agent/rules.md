# Правила разработки проекта theme for AIHeroes.net

## 🛠 Технический стек (Рекомендуемый)
- **Язык**: PHP 8.x, JavaScript (ES6+), HTML5, CSS3
- **Веб-фреймворк**: Laravel (адаптация текущей верстки под https://github.com/ISergeyV/laravel_handyman-crm)
- **CSS-фреймворк**: Tailwind CSS (утилитарный подход)
- **База данных**: MySQL (стандарт для Laravel) / PostgreSQL
- **AI/ML**: OpenAI API / Gemini (интеграция через PHP SDK или HTTP-клиенты)
- **Линтинг/Форматирование**: Laravel Pint (PHP), Prettier (JS/HTML/Tailwind)

## 📝 Стиль кода и стандарты
1. **PHP/Laravel**: Строгое следование стандартам PSR-12. Использование Laravel Pint для форматирования.
2. **Типизация**: Использование Type Hints и Return Types в PHP (строгая типизация `declare(strict_types=1);` приветствуется в бизнес-логике).
3. **Frontend**: Использование директив Blade ( `@if`, `@foreach` и т.д.) вместо чистого PHP в шаблонах. Классы Tailwind должны быть логично сгруппированы.
4. **Конфигурация**: Все секреты (API ключи, пароли БД) хранятся исключительно в `.env` и никогда не попадают в систему контроля версий. Доступ к ним в коде осуществляется через функцию `config()`, предварительно определив их в файлах папки `config/`.
5. **База данных**: Использовать миграции (Migrations) и сидеры (Seeders) Laravel для управления структурой БД. Запросы писать через Eloquent ORM.
6. **Git**: Понятные сообщения коммитов (Conventional Commits: `feat:`, `fix:`, `docs:`, `style:`). Поэтапные коммиты после каждого логического шага.

## 📂 Структура проекта (Laravel подход)
После миграции на Laravel структура будет стандартной:
- `.agent/` - Документация агента, правила и планы
- `app/` - Основная логика приложения (Контроллеры, Модели)
- `resources/views/` - Blade-шаблоны (сюда переедет наша верстка)
- `resources/css/` & `resources/js/` - Исходники стилей и скриптов (Tailwind)
- `public/` - Публично доступные файлы (скомпилированный CSS/JS, картинки)
- `routes/` - Маршрутизация (веб-страницы, API)
- `database/` - Миграции и сидеры

## Design Reference Specification
- **Reference Image:** `.private/ramp.com_.png`
- **Objective:** This file serves as the strict visual baseline and "single source of truth" for the template we are currently developing.
- **Directives:**
  1. **Visual Hierarchy:** Continually analyze this image to replicate the structural layout (DOM structure) and component placement.
  2. **Styling:** Extract and apply the inferred CSS properties, paying close attention to color palettes, typography, padding, margins, and borders.
  3. **Implementation:** Always consult this reference file before generating new UI components or defining layout structures to ensure maximum visual fidelity.