<template>
  <div class="row">
    <LinkButton route="modelCreate" label="Create" />
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Model</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Deleted at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody v-if="models.length > 0">
                <tr v-for="(model, key) in models" :key="key">
                  <td>{{ model.name }}</td>
                  <td>{{ model.created_at }}</td>
                  <td>{{ model.updated_at }}</td>
                  <td>{{ model.deleted_at }}</td>
                  <td class="d-inline-flex">
                    <router-link
                      :to="{ name: 'modelEdit', params: { id: model.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      type="button"
                      @click="deleteModel(model.id)"
                      class="btn btn-danger"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                  <td colspan="4" align="center">No Models Found.</td>
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
  name: "ModelList",
  data() {
    return {
      models: [],
    };
  },
  mounted() {
    this.getModelList();
  },
  methods: {
    async getModelList() {
      await this.axios
        .get("api/car-models")
        .then((response) => {
          this.models = response.data.data;
        })
        .catch((error) => {
          console.log(error);
          this.models = [];
        });
    },
    deleteModel(id) {
      if (confirm("Are you sure to delete this model?")) {
        this.axios
          .delete(`api/car-models/${id}`)
          .then((response) => {
            if (response.status === 204) {
              this.getModelList();
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
};
</script>
  
<style scoped></style>