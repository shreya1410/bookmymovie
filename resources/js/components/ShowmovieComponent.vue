<template><div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <input type="text" v-model="search" class="form-control">
                <div class="input-group-prepend">
                    <button @click.prevent="searchMovies()" class="btn btn-primary">search</button>
                </div>
            </div>

<!--            <input type="text" @click="search" placeholder="search movies">-->
           <div v-if="showsearch===true">
                <div class="row">
                    <div v-for="smovie in s_movie" v-bind:key="smovie.id" class="col-md-8">
                        <div class="card mb-4">
                            <img class="card-img-top"  :src="smovie.poster" :alt="smovie.id" height="150px" width="30px">
                            <div class="card-body">
                                <h5 class="card-title"><h3 class="font-weight-bold">Movie name: </h3>{{smovie.title}}</h5>
                                <h5 class="card-text"> <h3>Movie overview </h3>  {{smovie.overview}}</h5>
                                <h5 class="card-text"><h3>Release Year </h3>{{smovie.release_year}}</h5>
                                <h5 class="card-text"><h3>Runtime </h3>{{smovie.runtime}}</h5>
                                <h5 class="card-text"><h3>Cast</h3>{{smovie.cast}}</h5>
                                <h5 class="card-text"><h3>City</h3>{{smovie.city}}</h5>
                                <h5 class="card-text"><h3>Theatre</h3>{{smovie.theatre}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <div v-if="showsearch===false">
            <div class="card-deck">
                <div class="card"  v-for="(movie) in movies.data" :key="movies.id">
                    <img class="card-img-top"  :src="movie.poster" alt="image poster" height="150px" width="30px">
                    <div class="card-body">
                        <h5 class="card-title"><h3 class="font-weight-bold">Movie name: </h3>{{movie.title}}</h5>
                        <h5 class="card-text"> <h3>Movie overview </h3>  {{movie.overview}}</h5>
                        <h5 class="card-text"><h3>Release Year </h3>{{movie.release_year}}</h5>
                        <h5 class="card-text"><h3>Runtime </h3>{{movie.runtime}}</h5>
                        <h5 class="card-text"><h3>Cast</h3>{{movie.cast}}</h5>
                        <h5 class="card-text"><h3>City</h3>{{movie.city}}</h5>
                        <h5 class="card-text"><h3>Theatre</h3>{{movie.theatre}}</h5>
                        <button @click="bookshow()"> Book your show</button>
                    </div>
                </div>

            </div>
           </div>
        </div>
    </div>
    <pagination align="center"  :data="movies" @pagination-change-page="getMovies"></pagination>
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
            runtime:'',
            city : '',
            theatre :'',
            search : '',
            showsearch :false ,
            s_movie : [],


        }
    },
    computed:{
        filteredList(){
        return this.movies.filter(movie => {
            movie.title.toLowerCase().includes(this.search.toLowerCase())
        })
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
        searchMovies(){
            axios.get('search?q='+this.search)

            .then(res => res.json)
            console.log(res.json)
            .then(res =>{
                this.s_movie= res;
                this.search = '';
                this.showsearch = true;
            })
            .catch(err =>{
                console.log(err);
            })
        },
        bookshow(){

        }

    },

}

</script>

<style scoped>

</style>
