<template>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>Model</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody v-if="models.length > 0">
                <tr v-for="(model, key) in models" :key="key">
                  <td>{{ model.title }}</td>
                  <td>
                    <!-- <router-link :to='{name: "categoryEdit", params: { id:car.id }}' class="btn btn-success">Edit</router-link> -->
                    <!-- <button type="button" @click="deleteCategory(car.id)" class="btn btn-danger">Delete</button> -->
                  </td>
                </tr>
                </tbody>
                <tbody v-else>
                <tr>
                  <td colspan="4" align="center">No Models Found.</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </template>
  
  <script>
  export default {
    name: "ModelList",
      data(){
          return {
              models:[]
          }
      },
      mounted(){
          this.getModelList()
      },
      methods:{
          async getModelList(){
              await this.axios.get('api/car-models').then(response=>{
                  this.models = response.data.data
              }).catch(error=>{
                  console.log(error)
                  this.models = []
              })
          },
          // deleteCategory(id){
          //     if(confirm("Are you sure to delete this category ?")){
          //         this.axios.delete(`/api/category/${id}`).then(response=>{
          //             this.getCarList()
          //         }).catch(error=>{
          //             console.log(error)
          //         })
          //     }
          // }
      }  
  }
  </script>
  
  <style scoped>
  
  </style>