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
            labelText="Car Brand"
            v-model="car.car_brand_id"
            v-bind:options="this.brands"
          />
          <button type="submit" class="btn btn-primary">Create</button>
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
      brands: [],
    };
  },
  mounted() {
    this.getModelList();
  },
  methods: {
    addCar() {
      this.axios
        .post("api/cars", this.car)
        .then((response) => {
          console.log(response);
          alert("Form was submitted successfully");
          return response;
        })
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
    async getModelList() {
      await this.axios
        .get("api/car-brands")
        .then((response) => {
          response.data.data.forEach((element) => {
            const newItem = {
              id: element.id,
              name: element.name,
            };
            this.brands.push(newItem);
          });
        })
        .catch((error) => {
          console.log(error);
          this.brands = [];
        });
    },
  },
};
</script>