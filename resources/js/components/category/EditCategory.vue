<template>
    <div class="container-fluid">
        <section class="container alert alert-danger col-6" v-if="alert!=''">{{ alert }}</section>
        <form @submit.prevent="updateCategory" class="text-center border border-light p-5">
            <p class="h4 mb-4">Edit Category</p>
            <input type="text" v-model="category.categoryName" class="form-control mb-4" placeholder="E-mail">
            <input type="number" v-model="category.categoryRank" class="form-control mb-4" placeholder="Password">
            <div class="d-flex justify-content-around">
                <div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                        <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                    </div>
                </div>
                <div>
                    <a href="">Forgot password?</a>
                </div>
            </div>
            <button class="btn btn-info btn-block my-4" type="submit">UPDATE</button>
            <p>Not a member?
                <a href="">Register</a>
            </p>
            <p>or sign in with:</p>
            <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>
        </form>

    </div>
</template>
<script>
export default {
    data() {
        return {
            category: [],
            alert: ''
        }
    },
    created: function () {  
        this.getCategory();
    },
    methods: {
        getCategory(){
            this.axios.get('/category/'+this.$route.params.id+'/edit')
            .then((res)=>{this.category=res.data})
            .catch((err)=>{this.alert=err});
        },
        updateCategory() {
            this.axios.put('/category/'+this.$route.params.id, this.category)
            .then((res)=>{this.$router.push({name:'categoryList'})})
            .catch((err)=>{this.alert=err});
        }
    }
}
</script>