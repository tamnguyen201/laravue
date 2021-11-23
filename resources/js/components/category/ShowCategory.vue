<template>
  <div class="container-fluid">
      <h1>Show Category: {{errors}}</h1>
      <section class="alert alert-danger" v-if="alert!==''">{{alert}}</section>
      <div class="form-group">{{category.categoryName}}</div>
      <div class="form-group">{{category.categoryRank}}</div>
      <div class="form-group">{{category.status==1?'Active':'Not Active'}}</div>
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
  created: function(){
    this.showCategory();
  },
  methods: {
    showCategory(){
      this.axios.get('/api/category/'+this.$route.params.id)
      .then((res)=>{this.category=res.data})
      .catch((err)=>{this.alert=err});
    }
  }
}
</script>