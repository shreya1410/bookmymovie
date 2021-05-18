<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <button @click="trend">Treading</button>
                </li>

                <li class="nav-item">
                    <button @click="popular" >Popular</button>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

                <button class="btn btn-outline-success my-2 my-sm-0"  v-model="search" type="submit">Search</button>
            </form>
        </div>
    </nav>

</template>

<script>
export default {
name: "TreadingMovies",
    data(){
    return{
      trending:{},
        movies :[],
        search :''
    }
    },

    methods:{
    trend(page=1){
        axios.get('all_treading?page=' +page)
        .then(response =>{
            console.log(response.data);
            this.trending = response.data;
        })
    },
        popular(page=1){
            axios.get('all_popular?page=' +page)
                .then(response =>{
                    console.log(response.data);
                    this.trending = response.data;
                })
        },
    }
}
</script>

<style scoped>

</style>
