// resources/js/app.js

import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'; // <-- Импортируйте плагин

window.Alpine = Alpine;

Alpine.plugin(collapse); // <-- Зарегистрируйте плагин
Alpine.start();
