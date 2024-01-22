<template>
  <div class="col-1 mb-1">
    <router-link :to='{ name: route }' class="btn btn-primary">{{ label }}</router-link>
  </div>
</template>
<script>
export default {
  props: {
    route: String,
    label: {
      type: String,
      default: 'Click me'
    }
  },
}
</script>