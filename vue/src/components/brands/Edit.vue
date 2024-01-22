<template>
  <div>
    <h3 class="text-center">Edit Brand</h3>
    <div class="row">
      <div>
        <ResponsiveTable
          v-bind:headers="[
            'ID',
            'Car brand',
            'Car model',
            'Created at',
            'Updated at',
            'Deleted at',
          ]"
          v-bind:data="[brandDisplay]"
        />
      </div>
      <div class="col-md-6">
        <form @submit.prevent="updateBrand">
          <SimpleInput
            id="name"
            labelText="Car brand"
            v-model=brand.name
            type="text"
            @UpdateValue="updateValue"
          />
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>
     
<script>
export default {
  name: "BrandEdit",
  data() {
    return {
      brand: {},
      brandDisplay: {},
    };
  },
  mounted() {
    this.getBrand();
  },
  methods: {
    async getBrand() {
      await this.axios.get(`api/car-brands/${this.$route.params.id}`).then(response => {
        this.brand = response.data.data
        this.brandDisplay = Object.assign({}, response.data.data);
      }).catch(error => {
        console.log(error)
        this.brand = {}
      })
    },
    updateValue (data) {
      this.brand[data.id] = data.value;
    },
    updateBrand() {
      let formData = {
        "name": this.brand.name,
      }

      this.axios
        .put(`api/car-brands/${this.$route.params.id}`, formData)
        .then((response) => {
          this.brand = response.data
          if (response.status == '200') {
            alert('Brand updated success')
          }
          this.getBrand();
        })
        .catch((error) => {
          if (error.response) {
            alert(
              `"Message: " ${error.response.data.message}, "Status: " ${error.response.status}`
            );
          } else {
            console.log(error);
          }
        })
        .finally(() => (this.loading = false));
    },
  }
};
</script>