try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

import '../../../node_modules/@fortawesome/fontawesome-free/js/all.js';

require('./bootstrap');
require('./close');

window.Vue = require('vue');

import Counter from './components/Counter'

const app = new Vue({
    el: '#app',
    // template: `<h1>What up MotherFuckaaaaa!!</h1>`
    components: {
        Counter
    }
});
