<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="movie-image-container col-lg">
                            <div class="movie-image" style="width: 12em;">
                            <a :href="'/movie/' + this.movie.id">
                                <img :src="this.configs.base_url/this.configs.poster_sizes[2]/this.movie.poster_path" :alt="this.movie.title">
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'movie',
            'configs'
        ],
        mounted() {
            console.log(this.movie);
        }
    }
</script>

<style lang="scss" scoped>

</style>