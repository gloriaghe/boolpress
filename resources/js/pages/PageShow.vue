<template>
<Page404 v-if='is404'/>
<section v-else-if="post">

    <h1>{{post.title}}</h1>
    <h2>Scritto da : {{post.user.name}}</h2>
    <h3>Categoria: {{post.category.name}}</h3>
    <div class="tags">
        <span v-for="tag in post.tags" :key="tag.id" class="tag">
        {{tag.name}}
        </span>
    </div>
    <img :src="post.image" :alt="post.title">
    <p>{{post.content}}</p>
</section>

</template>

<script>
import Page404 from './Page404.vue'


export default {
    name: 'PageShow',
    components:{
        Page404
    },
    props:{
        slug: String,
    },
data(){
    return {
        is404: false,
        post: null,
    }
},
created(){
    axios.get('/api/posts/' + this.slug)
    .then(risposta =>
    {
        if(risposta.data.success){
this.post = risposta.data.result
        } else{
            this.is404 = true;
        }
});
}

}
</script>

<style lang="scss" >




</style>
