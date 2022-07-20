<template>
<div class="container">

    <h1>I Miei Post</h1>


<ul>
    <li
    v-for="post in posts"
    :key="post.id"
    >
    <h3>{{ post.title }}</h3>
    <p>{{ post.content }}</p>

    </li>
</ul>
</div>
</template>

<script>
export default {
    name: 'App',
    data() {
        return {
            apiUrl: '/api/posts',
            posts: null
        }
    },

    methods:{
        getApi(){
        axios.get(this.apiUrl)
        .then(res =>{
            this.posts = res.data
        })
            // console.log('api');
    }

    },


    mounted() {
        this.getApi();
        // console.log(axios);

    },
}

</script>

<style>

</style>
