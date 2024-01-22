<template>
  <div class="row">
    <div class="col-12">
      <CarFilter @FilterChanged="updateFilterParams" @FilterReset="updateFilterParams"/>
    </div>
    <LinkButton route="carCreate" label="Create" />
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Car number</th>
                  <th>Brand and model</th>
                  <th>Tank capacity, L</th>
                  <th>Average fuel consumption, L/100 km</th>
                  <th>Estimated distance, ~ km</th>
                  <th>Created at</th>
                  <th>Update at</th>
                  <th>Deleted at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody v-if="cars.length > 0">
                <tr v-for="(car, key) in cars" :key="key">
                  <td>{{ car.car_number }}</td>
                  <td>{{ car?.car_brand?.name }} {{ car?.car_model?.name }}</td>
                  <td>{{ car.fuel_tank_capacity }}</td>
                  <td>{{ car.average_fuel_consumption }}</td>
                  <td> {{this.getDistance(car.fuel_tank_capacity, car.average_fuel_consumption)}}</td>
                  <td>{{ car.created_at }}</td>
                  <td>{{ car.updated_at }}</td>
                  <td>{{ car.deleted_at }}</td>
                  <td class="d-inline-flex">
                    <div v-if="!car.deleted_at" class="d-inline-flex">
                      <router-link :to="{ name: 'carEdit', params: { id: car.id } }" class="btn btn-success">Edit</router-link>
                      <button type="button" @click="deleteCar(car.id)" class="btn btn-danger">Delete</button>
                    </div>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                  <td colspan="4" align="center">No Cars Found.</td>
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
import { store } from "../../main.js";
export default {
  name: "CarList",
  data() {
    return {
      cars: [],
      axiosParams: {},
    };
  },
  mounted() {
    this.getCarList(this.params);
    this.getDistance();
  },
  methods: {
    async getCarList() {
      await this.axios
        .get("api/cars", { params: this.axiosParams })
        .then((response) => {
          this.cars = response.data.data;
        })
        .catch((error) => {
          console.log(error);
          this.cars = [];
        });
    },
    deleteCar(id) {
      if (confirm("Are you sure to delete this car data?")) {
        this.axios
          .delete(`api/cars/${id}`)
          .then((response) => {
            if (response.status === 204) {
              this.getCarList();
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    getDistance(capacity, consumption) {
      return Math.round((capacity * 100) / consumption);
    },
    updateFilterParams(data) {
      let filterData = {};
      const params = new URLSearchParams();
      if (data !== 'reset') {
        filterData = JSON.parse(JSON.stringify(store.filter));
        if (filterData.number) {
          params.append("number", filterData.number);
        }
        if (filterData.brand) {
          params.append("brand", filterData.brand);
        }
        if (filterData.model) {
          params.append("model", filterData.model);
        }
        if (filterData.deleted) {
          params.append("soft_deleted", filterData.deleted);
        }
      }

      this.axiosParams = params;

      this.getCarList();
    },
  },
};
</script>
