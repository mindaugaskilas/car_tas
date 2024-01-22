<template>
  <div class="col-12 mb-2 text-end">
    <div class="col-md-12">
      <form
        @submit.prevent="submitFilter"
        @submit="this.$emit('FilterChanged', 'submit')"
      >
        <div class="col-md-12 d-inline-flex text-start">
          <SimpleInput
            id="number"
            labelText="Car number"
            v-model="filter.number"
            type="text"
          />
          <SimpleInput
            id="brand"
            labelText="Brand name"
            v-model="filter.brand"
            type="text"
          />
          <SimpleInput
            id="model"
            labelText="Model name"
            v-model="filter.model"
            type="text"
          />
          <div class="form-group m-1">
            <label for="delete">With deleted cars</label>
            <input
              type="checkbox"
              id="deleted"
              v-model="filter.deleted"
              @change="(event) => (deleted = event.target.value)"
            />
          </div>
        </div>
        <div class="col-sm-12 mt-2">
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </form>
      <div class="col-sm-12 mt-2">
        <button
          type="submit"
          class="btn btn-success"
          @click="this.$emit('FilterReset', 'reset'), resetFilter()"
        >
          Reset filter
        </button>
      </div>
    </div>
  </div>
</template>
<script>
import { store } from "../../main.js";
export default {
  name: "CarFilter",
  data() {
    return {
      filter: {},
    };
  },
  methods: {
    submitFilter() {
      store.filter = this.filter;
    },
    resetFilter() {
      Object.assign((this.filter = {}));
    },
  },
};
</script>
