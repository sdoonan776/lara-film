try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

import '../../../node_modules/@fortawesome/fontawesome-free/js/all.js';

require('./bootstrap');
require('./close');
require('./hamburger');
require('./images');

window.Vue = require('vue');

import Counter from './components/Counter'

const app = new Vue({
    el: '#app',
    components: {
        Counter
    }
});
