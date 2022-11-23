import "./bootstrap";
import Vue from 'vue';
import MovieCarousel from './components/MovieCarousel.vue';

Vue.component('movie-carousel', MovieCarousel);

new Vue({
    el: "#movieCarousel",
});
