<template>
    <div class="movie-image-container col-lg">
        <div class="movie-image" style="width: 12em;">
                <a href="'/movie/' + this.movie.id">
                    <!-- <img src="{{ $configs['base_url'] }}/{{ $configs['poster_sizes'][2] }}{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}"> -->
                </a>
            </div>
        </div>
</template>

<script lang='ts'>
    import Vue from 'vue';
    import Component from "vue-class-component";
    import Movie from '../interfaces/movie';

    const MovieCardProps = Vue.extend({
        props: {
            movie
        }        
    })
    
    export default class MovieCard extends MovieCardProps {
        mounted(): void {
            console.log('Component Mounted');
        }
    }
</script>

<style lang="scss" scoped>

</style>