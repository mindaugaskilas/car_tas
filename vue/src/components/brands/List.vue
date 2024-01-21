<template>
  <div class="row">
    <LinkButton route="brandCreate" label="Create" />
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Brand</th>
                  <th>Models</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Deleted at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody v-if="brands.length > 0">
                <tr v-for="(brand, key) in brands" :key="key">
                  <td>{{ brand.name }}</td>
                  <td>
                    <ul><li v-for="(model, key) in brand.models" :key="key">{{ model.name }}</li></ul>
                  </td>
                  <td>{{ brand.created_at }}</td>
                  <td>{{ brand.updated_at }}</td>
                  <td>{{ brand.deleted_at }}</td>
                  <td class="d-inline-flex">
                    <router-link :to='{ name: "brandEdit", params: { id: brand.id } }' class="btn btn-success">Edit</router-link>
                    <button type="button" @click="deleteBrand(brand.id)" class="btn btn-danger">Delete</button>
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
    deleteBrand(id) {
      if (confirm("Are you sure to delete this brand?")) {
        this.axios.delete(`api/car-brands/${id}`).then(response => {
          if (response.status === 204) {
            this.getBrandList()
          }
        }).catch(error => {
          console.log(error)
        })
      }
    }
  }
}
</script>
