<template>
<section>
        <div class="row g-3 mt-4">

             <div v-for="post in posts" :key="post.slug" class="col-sm-6 col-md-4">
                <router-link :to="{name: 'show', params: {slug: post.slug} }">
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
        .then(res =>{
            if(res.data.success){
                this.posts = res.data.result
            }
    });
    }

}
</script>

<style lang="scss" scoped>




</style>
