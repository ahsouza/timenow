<template>
  <div class="card-panel grey lighten-5 z-depth-2">
    <slot />
  </div>

</template>

<script>
export default {
  name: 'CardMenuVue',
  props: [],
  data () {
    return {

    }
  }
}
</script>

<style scoped>
.card-panel{
	width: 100%
}

</style>
