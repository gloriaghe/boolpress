<template>
<Page404 v-if='is404'/>
<section v-else-if="post"><div class="card mb-3">
  <img :src="post.image"  :alt="post.title">
  <div class="card-body">
    <h2 class="card-title text-uppercase">{{post.title}}</h2>
    <p class="card-text">{{post.content}}</p>
    <div class="text-end">Categoria: {{post.category.name}}</div>
     <div class="tags text-end">
        <strong>TAGS: </strong>
            <span v-for="tag in post.tags" :key="tag.id" class="tag">
                {{ tag.name }}
            </span>
        </div>
  </div>
</div>

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
section{
    height: 100%;

    .card{
background-color: #C4FFF9 ;
border: none;
        img{
            margin: 30px auto;
            width: 70%;
            border-radius: 20px;
        }
    }


}



</style>
