<template>
    <div class="container-fluid">
        <div>Nội dung app.vue</div>
        <div class="container">
            <router-link to="/" class="nav-item nav-link">Home</router-link>
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>
<script>
//import Header from './category/Category';
import Category from './category/Category';
// import Footer from './category/Category';
    export default{
        name: 'app',
        components: {
            Category
        }
    }
</script>