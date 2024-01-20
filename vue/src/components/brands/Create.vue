<template>
  <div>
    <h3 class="text-center">Create Brand</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addBrand">
          <SimpleInput id="car_brand" labelText="Car brand" v-model="brand.name" type="text" />
          <button type="submit" class="btn btn-primary">Create</button>
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
    addBrand() {
      this.axios
        .post("api/car-brands", this.brand)
        .then((response) => {
          if (response.status == '201') {
            this.$router.push({name: 'carBrands'});
          }
        })
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
  },
};
</script>