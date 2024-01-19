<template>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>Brand</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody v-if="brands.length > 0">
                <tr v-for="(brand, key) in brands" :key="key">
                  <td>{{ brand.name }}</td>
                  <td>
                    <!-- <router-link :to='{name: "categoryEdit", params: { id:car.id }}' class="btn btn-success">Edit</router-link> -->
                    <!-- <button type="button" @click="deleteCategory(car.id)" class="btn btn-danger">Delete</button> -->
                  </td>
                </tr>
                </tbody>
                <tbody v-else>
                <tr>
                  <td colspan="4" align="center">No Brands Found.</td>
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
    name: "BrandList",
      data(){
          return {
              brands:[]
          }
      },
      mounted(){
          this.getBrandList()
      },
      methods:{
          async getBrandList(){
              await this.axios.get('api/car-brands').then(response=>{
                  this.brands = response.data.data
              }).catch(error=>{
                  console.log(error)
                  this.brands = []
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