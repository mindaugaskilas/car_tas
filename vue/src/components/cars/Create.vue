<template>
  <div>
    <h3 class="text-center">Create Car</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addCar">
          <SimpleInput
            id="car_numer"
            labelText="Car number"
            v-model="car.car_number"
            type="text"
          />
          <SimpleInput
            id="fuel_tank_capacity"
            labelText="Fuel tank capacity"
            v-model="car.fuel_tank_capacity"
            type="number"
          />
          <SimpleInput
            id="average_fuel_consumption"
            labelText="Average fuel consumption"
            v-model="car.average_fuel_consumption"
            type="number"
            step="0.1"
          />
          <SimpleSelect
            id="car_brand_id"
            labelText="Car brand"
            v-model="car.car_brand_id"
            v-bind:options="this.brandoptions"
            @SelectEventChanged="updatedBrandId"
          />
          <SimpleSelect
            id="car_model_id"
            labelText="Car model"
            v-model="car.car_model_id"
            v-bind:options="this.modelOptions"
            @SelectEventChanged="updatedModelId"
          />
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  name: "CarCreat",
  data() {
    return {
      car: {},
      dbBrands: [],
      brandoptions: [],
      modelOptions: [],
    };
  },
  mounted() {
    this.getBrandList();
  },
  methods: {
    addCar() {
      this.axios
        .post("api/cars", this.car)
        .then((response) => {
          if (response.status == "201") {
            this.$router.push({ name: "cars" });
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
    async getBrandList() {
      await this.axios
        .get("api/car-brands")
        .then((response) => {
          this.dbBrands = response.data.data;
          this.dbBrands.forEach((element) => {
            const newItem = {
              id: element.id,
              name: element.name,
            };
            this.brandoptions.push(newItem);
          });
        })
        .catch((error) => {
          console.log(error);
          this.brandoptions = [];
        });
    },
    updatedBrandId(data) {
      this.modelOptions = [];
      this.car.car_brand_id = data;
      JSON.parse(JSON.stringify(this.dbBrands)).forEach((element) => {
        if (element.id === Number(data)) {
          element.models.forEach((model) => {
            const newItem = {
              id: model.id,
              name: model.name,
            };
            this.modelOptions.push(newItem);
          });
        }
      });
    },
    updatedModelId(data) {
      this.car.car_model_id = data;
    },
  },
};
</script>