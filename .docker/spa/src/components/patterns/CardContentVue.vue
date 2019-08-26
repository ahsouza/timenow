<template>
<div class="row">
  <div class="card">

    <div class="card-content">
      <div class="row valign-wrapper">
        <grid-vue tamanho="1">
          <img :src="perfil" :alt="nome" class="circle responsive-img"> <!-- notice the "circle" class -->
        </grid-vue>
        <grid-vue tamanho="11">
          <span class="black-text">
            <strong>{{nome}}</strong> - <small>{{data}}</small>
          </span>
        </grid-vue>
      </div>

      <slot />

    </div>

    <div class="card-action">
      <p>
        <a style="cursor: pointer" @click="liked(id)">
          <i class="material-icons">{{ like }}</i>7
        </a>
        <i class="material-icons">insert_comment</i>
      </p>
    </div>

  </div>
</div>
</template>

<script>
import GridVue from '@/components/layouts/GridVue'

export default {
  name: 'CardContentVue',
  props:['id', 'perfil','nome','data'],
  data () {
    return {
      like: 'favorite_border'

    }
  },
  components:{
    GridVue
  },
  methods: {
    liked(id) {

      alert(id)
      if (this.like == 'favorite_border') {
        this.like = 'favorite'
      } else {
        this.like = 'favorite_border'
      }
    }
  } 
}
</script>
<style scoped>

</style>
