<template>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th v-for="(header, key) in headers" :key="key">{{ header }}</th>
        </tr>
      </thead>
      <tbody v-if="data.length > 0">
        <tr v-for="(item, key) in data" :key="key">
          <td v-for="(value, index) in item" :key="index">
            <div v-if=Array.isArray(value)>
              <ul>
                <li v-for="(v, i) in value" :key="i">{{ v.name }}</li>
              </ul>
            </div>
            <div v-else>
              {{ value?.name ?? value  }}
            </div>
          </td>
        </tr>
      </tbody>
      <tbody v-else>
        <tr>
          <td colspan="4" align="center">No data found.</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  name: "ResponsiveTable",
  props: {
    headers: Array,
    data: Array,
  },
  computed: {
    isInArray: function(value) {
        return this.array.includes(value);
    }
  }
};
</script>
