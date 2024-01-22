<template>
  <div>
    <h3 class="text-center">Create Brand</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addBrand">
          <SimpleInput id="name" labelText="Car brand" v-model="brand.name" type="text" @UpdateValue="updateValue"/>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>
   
<script>
export default {
  name: "BrandCreate",
  data() {
    return {
      brand: {},
    };
  },
  methods: {
    updateValue (data) {
      this.brand[data.id] = data.value;
    },
    addBrand() {
      this.axios
        .post("api/car-brands", this.brand)
        .then((response) => {
          if (response.status == '201') {
            this.$router.push({name: 'carBrands'});
          }
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
  },
};
</script>