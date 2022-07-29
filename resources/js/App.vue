<template>
<div>
    <NavBar/>

    <div class="container">

        <!-- in base all'URL deciderà il contenuto della pagina -->
        <router-view></router-view>
    </div>
</div>
</template>

<script>
import NavBar from './components/NavBar.vue'

export default {
    name: 'App',
    components:{
        NavBar,
    }

}
</script>

<style lang="scss" >
@import 'bootstrap/scss/bootstrap';




</style>
