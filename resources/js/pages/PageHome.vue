<template>
<section>
        <div class="row g-3 mt-4">
                <!-- <CardPost  v-for="post in posts" :key="post.id" :post='post' /> -->
            <div  v-for="post in posts" :key="post.slug" class="col-sm-6 col-md-4 p-4"></div>
                <router-link :to="{name: 'show', params: {slug: post.slug}}">
                <img :src="post.image" :alt="post.title" class="img-fluid">
                </router-link>
            </div>
         </div>
</section>
</template>

<script>

export default {
    name: 'PageHome',
    data(){
        return{
            posts: [],
        }
    },
    created(){
        axios.get('/api/posts/random')
        .then(risposta =>
        {
            if(risposta.data.success){
                this.posts = risposta.data.result
            }
    });
    }

}
</script>

<style lang="scss" scoped>




</style>
