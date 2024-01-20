<template>
  <div class="row">
    <div class="col-12 mb-2 text-end">
      <router-link :to='{ name: "brandCreate" }' class="btn btn-primary">Create</router-link>
    </div>
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
                    <div class="col-12 mb-2 text-end">
                      <router-link :to='{ name: "brandEdit", params: { id: brand.id } }'
                        class="btn btn-primary">Edit</router-link>
                    </div>
                    <div class="col-12 mb-2 text-end">
                      <button type="button" @click="deleteBrand(brand.id)" class="btn btn-danger">Delete</button>
                    </div>
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
  data() {
    return {
      brands: []
    }
  },
  mounted() {
    this.getBrandList()
  },
  methods: {
    async getBrandList() {
      await this.axios.get('api/car-brands').then(response => {
        this.brands = response.data.data
      }).catch(error => {
        console.log(error)
        this.brands = []
      })
    },
    deleteBrand(id){
      console.log(id);
        if(confirm("Are you sure to delete this category ?")){
            this.axios.delete(`api/car-brands/${id}`).then(response=>{
              if(response.status === 204) {
                this.getBrandList()
              }
            }).catch(error=>{
                console.log(error)
            })
        }
    }
  }
}
</script>
  
<style scoped></style>