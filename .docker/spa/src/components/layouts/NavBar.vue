<template>
  <nav :class="cor || 'base'">
    <div class="nav-wrapper container">
      <router-link :to="url || '/'" class="brand-logo">
        <!-- <img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" height="30" alt=""> -->
        <img src="./../../assets/logo-timenow.jpg" height="55" alt="Time-Now Engenharia">
      </router-link>

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <slot />
      </ul>
    </div>
    
  </nav>
</template>

<script>
export default {
  name: 'NavBar',
  props: ['logo', 'url', 'cor'],
  data () {
    return {

    }
  }
}
</script>

<style scoped>

</style>
