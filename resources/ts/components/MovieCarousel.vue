<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang='ts'>
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import MovieCard from './MovieCard.vue';
    import Movie from '../interfaces/movie';
    import { Carousel, Slide } from 'vue-carousel';
    
    const MovieCarouselProps = Vue.extend({
        props: {
            movies: Movie
        }  
    })

    @Component({
        components: {
            MovieCard,
            Carousel,
            Slide
        }
    })
    export default class MovieCarousel extends MovieCarouselProps {
        mounted(): void {
            console.log('Component mounted.');
        }
    }
</script>
