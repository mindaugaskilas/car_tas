<template>
  <div class="row">
    <div class="col-12 mb-2 text-end">
      <router-link :to='{name:"carCreate"}' class="btn btn-primary">Create</router-link>
    </div>
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
                <th>Action</th>
              </tr>
              </thead>
              <tbody v-if="cars.length > 0">
              <tr v-for="(car, key) in cars" :key="key">
                <td>{{ car.car_number }}</td>
                <td>{{ car?.car_brand?.name }} {{ car?.car_model?.title }}</td>
                <td>{{ car.fuel_tank_capacity }}</td>
                <td>{{ car.average_fuel_consumption }}</td>
                <td>{{ this.getDistance(car.fuel_tank_capacity, car.average_fuel_consumption ) }}</td>
                <td>
                  <!-- <router-link :to='{name: "categoryEdit", params: { id:car.id }}' class="btn btn-success">Edit</router-link> -->
                  <!-- <button type="button" @click="deleteCategory(car.id)" class="btn btn-danger">Delete</button> -->
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
export default {
  name: "CarList",
    data(){
        return {
            cars:[]
        }
    },
    mounted(){
        this.getCarList()
        this.getDistance()
    },
    methods:{
        async getCarList(){
            await this.axios.get('api/cars').then(response=>{
                this.cars = response.data.data
            }).catch(error=>{
                console.log(error)
                this.cars = []
            })
        },
        // deleteCategory(id){
        //     if(confirm("Are you sure to delete this category ?")){
        //         this.axios.delete(`/api/category/${id}`).then(response=>{
        //             this.getCarList()
        //         }).catch(error=>{
        //             console.log(error)
        //         })
        //     }
        // }
        getDistance (capacity, consumption){
          return Math.round(capacity * 100 / consumption)
        }
    }    
}
</script>

<style scoped>

</style>