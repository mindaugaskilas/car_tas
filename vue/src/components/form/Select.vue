<template>
  <div class="form-group">
    <label :for="id">{{ labelText }}</label>
    <select :id="id">
      <option
        v-for="option in options"
        :value="option.id"
        :key="option.id"
        selected="modelValue"
      >
        {{ option.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  name: "SimpleSelect",
  props: {
    id: String,
    labelText: String,
    modelValue: String,
    options: Array,
  },
};
</script>
<style scoped>
</style>