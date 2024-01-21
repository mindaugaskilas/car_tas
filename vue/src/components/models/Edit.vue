<template>
  <div>
    <h3 class="text-center">Edit Model</h3>
    <div class="row">
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Model name</th>
                <th>Brand name</th>
                <th>Created</th>
                <th>Updated</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ model.name }}</td>
                <td>{{ model?.brand?.name }}</td>
                <td>{{ model.created_at }}</td>
                <td>{{ model.updated_at }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        <form @submit.prevent="updateModel">
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
  name: "ModelEdit",
  data() {
    return {
      model: {},
    };
  },
  mounted() {
    this.getModel();
  },
  methods: {
    async getModel() {
      await this.axios
        .get(`api/car-models/${this.$route.params.id}`)
        .then((response) => {
          this.model = response.data.data;
        })
        .catch((error) => {
          console.log(error);
          this.model = {};
        });
    },
    updateModel() {
      const data = JSON.parse(JSON.stringify(this.model));
      let formData = {
        name: data.name,
        car_brand_id: data.brand.id,
      };

      this.axios
        .put(`api/car-models/${this.$route.params.id}`, formData)
        .then((response) => {
          this.model = response.data;
          if (response.status == "200") {
            alert("Model updated success");
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
