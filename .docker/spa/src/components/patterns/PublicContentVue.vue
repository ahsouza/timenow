<template>

  <div class="row" style="margin-top: 10%">
    <grid-vue class="input-field" tamanho="12">

      <input type="text" v-model="content.title">

      <textarea v-if="content.title" v-model="content.text" placeholder="Digite o conteúdo" class="materialize-textarea"></textarea>

      <input v-if="content.title && content.text" type="text" v-model="content.link" placeholder="Link">

      <input v-if="content.title && content.text" type="text" v-model="content.image" placeholder="URL da imagem">
      

      <label>O que está acontecendo?</label>
    </grid-vue>

    <p class="center-align">
      <button @click="addContent" v-if="content.title && content.text" class="btn waves-effect waves-light" tamanho="2 offset-s10">PUBLICAR</button>
    </p>

  </div>

</template>

<script>
import GridVue from '@/components/layouts/GridVue'

export default {
  name: 'PublicContentVue',
  data () {
    return {
      content: { title: '', text: '', link: '', image: '' }
    }
  },
  components:{
    GridVue
  },
  methods: {
    addContent() {
      this.$http.post(this.$url + 'content/add', {
        title: this.content.title,
        text: this.content.text,
        link: this.content.link,
        image: this.content.image

      },{"headers": {"authorization": "Bearer " + this.$store.getters.getToken}})
        .then(res => {

          if (res.data.status) {
            console.log(res.data.contents)
          }

        }).catch(e =>{
          console.log(e)
          alert(`Error: ${e}`)
        })
    }
  }
}
</script>
<style scoped>

</style>
