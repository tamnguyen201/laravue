<template>
    <div class="container-fluid">
        <section class="container alert alert-danger col-6" v-if="alert!=''">{{ alert }}</section>
        <form @submit.prevent="createCategory" class="text-center border border-light p-5">
            <p class="h4 mb-4">Add Category</p>
            <input type="text" v-model="category.categoryName" name="categoryName" class="form-control mb-4" placeholder="Name">
            <input type="text" v-model="category.categoryRank" name="categoryRank" class="form-control mb-4" placeholder="Rank">
            <select name="status">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <!-- <div class="d-flex justify-content-around">
                <div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                        <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                    </div>
                </div>
                <div>
                    <a href="">Forgot password?</a>
                </div>
            </div> -->
            <button class="btn btn-info btn-block my-4" type="submit">ADD</button>
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
    data(){
        return{
            category: {},
            alert: ''
        }
    },
    methods: {
        createCategory() {
            this.axios.post('/api/category',this.category)
            .then((res)=>{this.$router.push({name:'categoryList'})})
            .catch((error)=>{this.alert=error})
        },
    }
}
</script>