<template>
    <section class="container">
        <h1>Category</h1>
        <section class="container alert alert-danger col-6" v-if="alert!=''">{{ alert }}</section>
        <section>
            <router-link :to="{name:'createCategory'}" class="btn btn-success">Add Category</router-link>
        </section>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Rank</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="categories.length>0" v-for="cate in categories">
                    <td>{{cate.id}}</td>
                    <td><router-link :to="{name:'showCategory',params:{id:cate.id}}">{{cate.categoryName}}</router-link></td>
                    <td>{{cate.categoryRank}}</td>
                    <td>{{cate.status==1?'Active':'Not Active'}}</td>
                    <td>
                        <router-link :to="{name:'editCategory',params:{id:cate.id}}" class="btn btn-outline-info">Edit</router-link>
                        <button class="btn btn-outline-danger" @click="deleteCategory(cate.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</template>

<script>
export default {
    data(){
        return{
            categories:[],
            alert:''
        }
    },
    created:function(){
        this.getCategory();
    },
    methods:{
        getCategory(){
            this.axios.get('/api/category')
            .then((res)=>{this.categories=res.data.categories})
            .catch((error)=>{this.alert=error});
        },
        deleteCategory(id){
            if(confirm('Bạn có muốn xóa mục này?')){
                this.axios.delete('/api/category/'+id)
                .then((res)=>{this.categories=res.data.categories;this.alert=res.data.alert})
                .catch((error)=>{this.alert=error});
            }
        }
    }
}
</script>