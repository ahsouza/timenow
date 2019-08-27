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
          <i class="material-icons" style="color: red">{{ like }}</i>{{totalLikes}}
        </a>
        <i class="material-icons" style="color: #3a0160">question_answer</i>
      </p>
    </div>

  </div>
</div>
</template>

<script>
import GridVue from '@/components/layouts/GridVue'

export default {
  name: 'CardContentVue',
  props:['id', 'perfil','nome','data', 'totalLikes'],
  data () {
    return {
      like: 'favorite_border',
      totalLikes: this.totalLikes

    }
  },
  components:{
    GridVue
  },
  methods: {
    liked(id) {
      this.$http.put(this.$url + 'content/liked/' + id, {}, {"headers": {"authorization": "Bearer " + this.$store.getters.getToken}})
        .then(res => {

          if (res.status) {

            this.totalLikes = res.data.likes
            if (this.like == 'favorite_border') {
              this.like = 'favorite'
            } else {
              this.like = 'favorite_border'
            }

          } else {
            alert(res.data.erro)
          }

        }).catch(e =>{

          console.log(e)
          alert(`Error ${e}; Tente novamente mais tarde`)
        })

    }
  } 
}
</script>
<style scoped>

</style>
