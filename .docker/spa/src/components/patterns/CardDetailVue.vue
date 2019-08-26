<template>

  <span>
    <div v-if="img && != '#'" class="card-image">
      <a v-if="link && link != '#'" :href="link" target="_blank">
        <img :src="img">
        <span class="card-title">{{ title || 'Título' }}</span>
      </a>
      <span v-if="!link || link == '#'">
        <img :src="img">
        <span class="card-title"> {{ title || '' }} </span>
      </span>

    </div>

    <div v-if="txt"  class="card-content">
      <span v-if="!img || img == '#'">
        <span class="card-title">
          {{ title || ''}}
        </span>
        
      </span>


      <p>{{ txt || 'Texto'}}</p>
      <p v-if="link && link != '#'">
        <a :href="link" target="_blank">Saiba mais...</a>
      </p>
    </div>
  </span>

</template>

<script>
export default {
  name: 'CardDetailVue',
  props:['img', 'title', 'txt', 'link'],
  data () {
    return {

    }
  }
}
</script>
<style scoped>

</style>
