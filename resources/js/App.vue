<template>
<div id="containerTotal">
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

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #containerTotal{
    background-color: #C4FFF9;
        width: 100%;
        min-height: 100vh;
    }
</style>
