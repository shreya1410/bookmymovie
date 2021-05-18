<template><div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">All Movies</div>
                <div class="card-body">
                    <div class="card" v-for="(movie) in movies.data" :key="movies.id" style="width: 18rem;">
                        <img class="card-img-top" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><h3 class="font-weight-bold">Movie name: </h3>{{movie.title}}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h3 class="font-weight-bold">Movie overview </h3>  {{movie.overview}}</li>
                            <li class="list-group-item">
                                <h3 class="font-weight-bold">Release Year </h3>{{movie.release_year}}</li>
                            <li class="list-group-item">
                                <h3 class="font-weight-bold">Duration </h3>{{movie.runtime}}</li>
                            <li class="list-group-item">
                                <h3 class="font-weight-bold">Cast </h3>{{movie.cast}}</li>
                        </ul>
                    </div>

                    <pagination :data="movies" @pagination-change-page="getMovies"></pagination>

                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
    name: "ShowmovieComponent",
    data(){
        return{
            movies:{},
            id:'',
            title:'',
            overview:'',
            poster :'',
            cast :'' ,
            release_year :'',
            runtime:''

        }
    },

    mounted() {
        this.getMovies();
    },
    methods:{
        getMovies(page =1){
            axios.get('all_movies?page=' +page)
            .then(response =>{
              //  console.log(response.data);
                this.movies = response.data;
            });
        },

    },

}
</script>

<style scoped>

</style>
