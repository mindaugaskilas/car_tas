<template>
  <div class="form-group">
    <label :for="id">{{ labelText }}</label>
    <select :id="id" :modelValue="modelValue" @change="this.$emit('SelectEventChanged', $event.target.value)">
      <option value="">Choose...</option>
      <option
        v-for="option in options"
        :value="option.id"
        :key="option.id"
        :selected="option.id === selectedValue"
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
    selectedValue: Number,
  },
  // setup(props, { emit }) {
  //       const selectedValue = (event) => {
  //           emit("update:modelValue", event.target.value)
  //       }

  //       return {
  //         selectedValue
  //       }
  //   }
};
</script>
