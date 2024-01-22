<template>
  <div class="form-group m-1">
    <label :for="id">{{ labelText }}</label>
    <input
      :id="id"
      :value="modelValue"
      :type="type"
      :step="step"
      @change="$emit('update:modelValue', $event.target.value)"
    />
  </div>
</template>
  
  <script>
export default {
  name: "SimpleInput",
  props: {
    id: String,
    type: String,
    labelText: String,
    modelValue: [String, Number],
    step: String,
  },
};
</script>
  