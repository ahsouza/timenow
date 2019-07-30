<template>
  <SiteTemplate>

    <span slot="menu-left">
      <div class="row valign-wrapper">
        <grid-vue tamanho="1 l6 m12">
          <img src="https://avatars3.githubusercontent.com/u/28975240?s=460&v=4" alt="" width="100" class="circle responsive-img"> <!-- notice the "circle" class -->
        </grid-vue>


        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            <h6>@ahsouza</h6>
            Financeiro
            <br>
            Pts: <b>120</b>
          </span>
        </grid-vue>
      </div>
    </span>


    <span slot="main">
      <br><br><br><br>
      <div class="row">
        
        <div class="col s12 m12">




  <div>
    <vs-tabs :color="colorx">

      <vs-tab @click="colorx = 'success'" label="Concluídas" icon="done">
        <div class="con-tab-ejemplo">

            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="4">
              <vs-card>
                <div slot="header">
                  <h4>
                    Tarefas Concluidas
                  </h4>
                </div>
                <div>
                  <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 


                  </span>
                </div>
                <div slot="footer">
                  <vs-row vs-justify="flex-end">
                    <vs-button color="success" @click="openConfirm()" icon="delete"></vs-button>
                  </vs-row>
                </div>
              </vs-card>
            </vs-col>



            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="4">
              <vs-card>
                <div slot="header">
                  <h4>
                    Tarefas Concluidas
                  </h4>
                </div>
                <div>
                  <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore </span>
                </div>
                <div slot="footer">
                  <vs-row vs-justify="flex-end">
                    <vs-button color="success" @click="openConfirm()" icon="delete"></vs-button>
                  </vs-row>
                </div>
              </vs-card>
            </vs-col>

            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="4">
              <vs-card>
                <div slot="header">
                  <h4>
                    Tarefas Concluidas
                  </h4>
                </div>
                <div>
                  <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore </span>
                </div>
                <div slot="footer">
                  <vs-row vs-justify="flex-end">
                    <vs-button color="success" @click="openConfirm()" icon="delete"></vs-button>
                  </vs-row>
                </div>
              </vs-card>
            </vs-col>



        </div>
      </vs-tab>






      <vs-tab @click="colorx = 'warning'" icon="priority_high" label="Pendentes">
        <div class="con-tab-ejemplo">
          

            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="4">
              <vs-card>
                <div slot="header">
                  <h4>
                    Pendentes
                  </h4>
                </div>
                <div>
                  <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore </span>
                </div>
                <div slot="footer">
                  <vs-row vs-justify="flex-end">
                    <vs-button color="warning" icon="share"></vs-button>
                  </vs-row>
                </div>
              </vs-card>
            </vs-col>




        </div>
      </vs-tab>






      <vs-tab @click="colorx = 'danger'" icon="sentiment_very_dissatisfied" label="Não Realizadas">
        <div class="con-tab-ejemplo">
          


            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="4">
              <vs-card>
                <div slot="header">
                  <h4>
                    Não realizadas
                  </h4>
                </div>
                <div>
                  <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore </span>
                </div>
                <div slot="footer">
                  <vs-row vs-justify="flex-end">
                    <vs-button color="danger" icon="refresh"></vs-button>
                  </vs-row>
                </div>
              </vs-card>
            </vs-col>







        </div>
      </vs-tab>





    </vs-tabs>
  </div>







          


 <!--         <vs-row vs-justify="center">


            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="4">
              <vs-card>
                <div slot="header">
                  <h4>
                    Hello world !
                  </h4>
                </div>
                <div>
                  <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore </span>
                </div>
                <div slot="footer">
                  <vs-row vs-justify="flex-end">
                    <vs-button type="gradient" color="danger" icon="favorite"></vs-button>
                    <vs-button color="primary" icon="turned_in_not"></vs-button>
                    <vs-button color="rgb(230,230,230)" color-text="rgb(50,50,50)" icon="settings"></vs-button>
                  </vs-row>
                </div>
              </vs-card>
            </vs-col>

            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="4">
              <vs-card>
                <div slot="header">
                  <h4>
                    Hello world !
                  </h4>
                </div>
                <div>
                  <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </span>
                </div>
                <div slot="footer">
                  <vs-row vs-justify="flex-end">
                    <vs-button type="gradient" color="danger" icon="favorite"></vs-button>
                    <vs-button color="primary" icon="turned_in_not"></vs-button>
                    <vs-button color="rgb(230,230,230)" color-text="rgb(50,50,50)" icon="settings"></vs-button>
                  </vs-row>
                </div>
              </vs-card>
            </vs-col>


            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="4">
              <vs-card>
                <div slot="header">
                  <h4>
                    Hello world !
                  </h4>
                </div>
                <div>
                  <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </span>
                </div>
                <div slot="footer">
                  <vs-row vs-justify="flex-end">
                    <vs-button type="gradient" color="danger" icon="favorite"></vs-button>
                    <vs-button color="primary" icon="turned_in_not"></vs-button>
                    <vs-button color="rgb(230,230,230)" color-text="rgb(50,50,50)" icon="settings"></vs-button>
                  </vs-row>
                </div>
              </vs-card>
            </vs-col>





          </vs-row> -->

        </div>


      </div>
    </span>


  </SiteTemplate>
</template>

<script>
import SiteTemplate from '@/templates/SiteTemplate'
import CardContentVue from '@/components/patterns/CardContentVue'
import CardDetailVue from '@/components/patterns/CardDetailVue'

export default {
  name: 'Tasks',
  data:()=>({
    colorx:'success',
    activeConfirm: false
  }),
  components:{
    CardContentVue,
    SiteTemplate,
    CardDetailVue,
  },
  methods:{
    openConfirm(){
      this.$vs.dialog({
        type:'confirm',
        color: 'danger',
        title: `Excluir Tarefa`,
        text: 'Tem certeza que deseja excluír a tarefa realizada?',
        accept:this.acceptAlert
      })
    },
    acceptAlert(color) {
      this.$vs.notify({
        color:'danger',
        title:'Tarefa excluída',
        text:'A tarefa selecionada foi excluída com sucesso!'
      })
    },
  }
}
</script>
<style lang="stylus">
.cardx
  margin 15px
</style>