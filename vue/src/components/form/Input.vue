<template>
  <div class="form-group">
    <label :for="id">{{ labelText }}</label>
    <input
      :type="type"
      :step="step"
      :value="modelValue"
      @change="$emit('update:modelValue', $event.target.value)"
      :id="id"
    />
  </div>
</template>
  
  <script>
export default {
  name: "SimpleInput",
  props: {
    id: String,
    labelText: String,
    modelValue: [String, Number],
    type: String,
    step: String,
  },
};
</script>
  