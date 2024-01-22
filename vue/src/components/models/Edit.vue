<template>
  <div>
    <h3 class="text-center">Edit Model</h3>
    <div class="row">
      <div>
        <ResponsiveTable
          v-bind:headers="[
            'ID',
            'Car model',
            'Car Brand',
            'Created at',
            'Updated at',
            'Deleted at',
          ]"
          v-bind:data="[modelDisplay]"
        />
      </div>
      <div class="col-md-6">
        <form @submit.prevent="updateModel">
          <SimpleInput
            id="name"
            labelText="Car model"
            v-model="model.name"
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
  name: "ModelEdit",
  data() {
    return {
      model: {},
      modelDisplay: {},
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
          this.modelDisplay = Object.assign({}, response.data.data);
        })
        .catch((error) => {
          console.log(error);
          this.model = {};
        });
    },
    updateValue (data) {
      this.model[data.id] = data.value;
    },
    updateModel() {
      let formData = {
        name: this.model.name,
        car_brand_id: this.model.car_brand_id,
      };

      this.axios
        .put(`api/car-models/${this.$route.params.id}`, formData)
        .then((response) => {
          this.model = response.data;
          if (response.status == "200") {
            alert("Model updated success");
          }
          this.getModel();
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
