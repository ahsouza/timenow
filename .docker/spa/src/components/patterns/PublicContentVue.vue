<template>

  <div class="row" style="margin-top: 10%">



    <div class="centerx">
      <vs-button @click="popupActivo2=true" color="primary" type="gradient">Nova Publicação</vs-button>
      <vs-popup classContent="popup-example"  title="Publique algo de interesse para todos" :active.sync="popupActivo2">

        <vs-input class="inputx" v-model="content.title" placeholder="Título"/>
        <vs-input size="large" v-model="content.text" placeholder="Digite seu texto"/>
        <vs-input class="inputx" v-model="content.link" placeholder="Link"/>
        <vs-input class="inputx" v-model="content.image" placeholder="URL da imagem"/>

        <vs-button @click="popupActivo3=true" color="primary" type="filled" align="center" style="margin-left: 50%">Ajuda</vs-button>

          <vs-popup title="Sugestões" :active.sync="popupActivo3"> 
            <p>
              Publique notícias, tarefas, artigos ou reclamações que a <b>Time-Now Engenharia</b> propoem para o interesse de todos
              <br><br>
              Estas publicações será vistas para todos membros da empresa, por entando é extremamente importante que você funcionário esteja consciente do que publicar
              <br><br>
               <b>Recomendações:</b> É necessário está de acordo com os deveres da <b>Time-Now Engenharia</b>.
            </p>

            <p class="center-align">
              <button @click="addContent" v-if="content.title && content.text" class="btn waves-effect waves-light" tamanho="2 offset-s10">PUBLICAR</button>
            </p>
          </vs-popup>
      </vs-popup>
    </div>







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
      value1:'',
      value2:'',
      popupActivo2:false,
      popupActivo3:false,


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
<style lang="stylus">
.popup-example
  .vs-input
    float left
    width 50%
    margin 10px
    margin-top 5px
  .con-select
    margin-left 10px
    width 50%
    margin-bottom 10px
</style>