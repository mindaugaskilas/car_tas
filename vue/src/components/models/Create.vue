<template>
  <div>
    <h3 class="text-center">Create Model</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addModel">
          <SimpleSelect
            id="car_brand_id"
            labelText="Car Brand"
            v-model="model.car_brand_id"
            v-bind:options="this.brands"
            @SelectEventChanged="updateBrandId"
          />
          <SimpleInput
            id="car_model"
            labelText="Car model"
            v-model="model.name"
            type="text"
          />
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ModelCreate",
  data() {
    return {
      model: {},
      brands: [],
    };
  },
  mounted() {
    this.getBrandList();
  },
  methods: {
    async getBrandList() {
      await this.axios
        .get("api/car-brands")
        .then((response) => {
          this.brands = response.data.data;
        })
        .catch((error) => {
          console.log(error);
          this.brands = [];
        });
    },
    addModel() {
      this.axios
        .post("api/car-models", this.model)
        .then((response) => {
          if (response.status == "201") {
            this.$router.push({ name: "carModels" });
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
    updateBrandId(data) {
      this.model.car_brand_id = data;
    },
  },
};
</script>
