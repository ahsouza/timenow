<template>

  <div class="row" style="margin-top: 10%;">


    <grid-vue class="input-field" tamanho="12">
      <vs-button @click="popupActivo2=true" color="primary" type="gradient" style="margin-left: 30%">Nova Publicação</vs-button>
      <vs-popup classContent="popup-example"  title="Publique algo de interesse para todos" :active.sync="popupActivo2">

        <vs-input class="inputx" v-model="content.title" placeholder="Título"/>
        <vs-input v-if="content.title" size="large" v-model="content.text" placeholder="Digite seu texto"/>
        <vs-input v-if="content.title && content.text" class="inputx" v-model="content.link" placeholder="Link"/>
        <vs-input v-if="content.title && content.text" class="inputx" v-model="content.image" placeholder="URL da imagem"/>

        <vs-button @click="addContent" v-if="content.title && content.text" color="success" type="filled" style="margin: 8% 0% 0% 18%" class="animated fadeInDown">Publicar</vs-button>

        <vs-button @click="popupActivo3=true" color="primary" type="filled" style="margin-left: 48%">Ajuda</vs-button>

          <vs-popup title="Sugestões" :active.sync="popupActivo3"> 
            <p style="padding: 5% 5% 10% 5%">
              Publique notícias, tarefas, artigos ou reclamações que a <b>Time-Now Engenharia</b> propoem para o interesse de todos
              <br><br>
              Estas publicações será vistas para todos membros da empresa, por entando é extremamente importante que você funcionário esteja consciente do que publicar
              <br><br>
               <b>Recomendações:</b> É necessário está de acordo com os deveres da <b>Time-Now Engenharia</b>.
            </p>

            <p>
              <button @click="addContent" v-if="content.title && content.text" class="btn waves-effect waves-light" tamanho="2 offset-s10">PUBLICAR</button>
            </p>
          </vs-popup>
      </vs-popup>

 
    </grid-vue>


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
            this.content = { title: '', text: '', link: '', image: '' }
            this.$store.commit('setContentsTimeLine', res.data.contents.data)

          } else if (res.data.status == false && res.data.validacao) {
            let errors = ''

            for(let erro of Object.values(res.data.errors)) {
              errors += erro + " "
            }
            alert(erros)
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