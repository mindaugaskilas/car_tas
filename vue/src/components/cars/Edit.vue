<template>
  <div>
    <h3 class="text-center">Edit Car</h3>
    <div class="row">
      <div>
        <ResponsiveTable
          v-bind:headers="[
            'ID',
            'Car number',
            'Fuel tank capacity',
            'Average fuel consumption',
            'Car brand',
            'Car model',
            'Created at',
            'Updated at',
            'Deleted at',
          ]"
          v-bind:data="[car]"
        />
      </div>
      <div class="col-md-6">
        <form @submit.prevent="updateCar">
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
            v-model="this.car.car_brand_id"
            v-bind:options="this.brands"
            v-bind:selectedValue="this.selectedBrandValue"
            @SelectEventChanged="updateBrandId"
          />
          <SimpleSelect
            id="car_model_id"
            labelText="Car model"
            v-model="car.car_model_id"
            v-bind:options="this.modelOptions"
            v-bind:selectedValue="this.selectedModelValue"
            @SelectEventChanged="updateModelId"
          />
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CarEdit",
  data() {
    return {
      car: {},
      brands: [],
      modelsByBrand: [],
      selectedBrandValue: 0,
      selectedModelValue: 0,
      modelOptions: [],
    };
  },
  mounted() {
    this.getCar();
    this.getBrandList();
  },
  methods: {
    async getCar() {
      await this.axios
        .get(`api/cars/${this.$route.params.id}`)
        .then((response) => {
          this.car = response.data.data;
          this.selectedBrandValue = this.car.car_brand.id;
          this.getBrand();
        })
        .catch((error) => {
          console.log(error);
          this.car = {};
        });
    },
    async getBrandList() {
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
    async getBrand() {
      await this.axios
        .get(`api/car-brands/${this.selectedBrandValue}`)
        .then((response) => {
          const brand = response.data.data;
          this.modelOptions = brand.models;
          this.selectedModelValue = this.car.car_model.id;
        })
        .catch((error) => {
          console.log(error);
          this.modelOptions = [];
        });
    },
    updateBrandId(data) {
      this.selectedBrandValue = Number(data);
      this.car.car_brand_id = data;
      this.getBrand();
    },
    updateModelId(data) {
      this.selectedModelValue = Number(data);
      this.car.car_model_id = data;
    },
    updateCar() {
      const data = JSON.parse(JSON.stringify(this.car));
      let formData = {
        car_number: data.car_number,
        fuel_tank_capacity: data.fuel_tank_capacity,
        average_fuel_consumption: data.average_fuel_consumption,
        car_brand_id: data.car_brand_id,
        car_model_id: data.car_model_id,
      };

      this.axios
        .put(`api/cars/${this.$route.params.id}`, formData)
        .then((response) => {
          this.dbBrand = response.data;
          if (response.status == "200") {
            alert("Car updated success");
          }
          this.getCar();
        })
        .catch((error) => {
          if (error.response) {
            alert(
              `"Message: " ${error.response.data.message}, "Status: " ${error.response.status}`
            );
          }
        })
        .finally(() => (this.loading = false));
    },
  },
};
</script>
