import './bootstrap';
import { initHeaderMenu } from './components/header';
import './components/modal';

import Alpine from 'alpinejs';
document.addEventListener('DOMContentLoaded', function() {
    initHeaderMenu();
});
window.Alpine = Alpine;

Alpine.start();
