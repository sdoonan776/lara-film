<template>
    <div>
        <carousel :per-page="1" :navigate-to="someLocalProperty" :mouse-drag="false" v-for="(movie, i) in this.movies">
            <slide :key="{i}">
                <movie-card 
                    :movie="{ movie }"
                    :configs="{ configs }"
                />
            </slide>
          </carousel> 
    </div>
</template>

<script>
    import MovieCard from './MovieCard.vue';
    import { Carousel, Slide } from 'vue-carousel';

    export default {
        props: [
            'movies',
            'configs'
        ],
        components: {
            MovieCard,
            Slide,
            Carousel
        },
        mounted() {
            console.log(this.movies);
        }
    }
</script>
