<template>
  <main>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <router-link to="/" class="navbar-brand" href="#">Task for laravel developer</router-link>
        <div class="collapse navbar-collapse">
          <div class="navbar-nav">
            <router-link exact-active-class="active" to="/cars" class="nav-item nav-link">Cars</router-link>
            <router-link exact-active-class="active" to="/brands" class="nav-item nav-link">Brands</router-link>
            <router-link exact-active-class="active" to="/models" class="nav-item nav-link">Models</router-link>
          </div>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
      <router-view></router-view>
    </div>
  </main>
</template>

<script>
  export default {}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
