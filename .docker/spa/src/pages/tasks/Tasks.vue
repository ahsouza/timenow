<template>
  <SiteTemplate>

    <span slot="menu-left">
      <div class="row valign-wrapper">
        <grid-vue tamanho="1 l6 m12">
          <img :src="user.avatar" :alt="user.name" width="100" class="circle responsive-img">
        </grid-vue>

        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            
          </span>
        </grid-vue>
      </div>
    </span>

    <span slot="main">

      <div class="row" style="margin-top: 22%">
        <div class="col s12 m12 l12">
          <div style="padding-bottom: 30%">
            <vs-tabs :color="colorx">

        <!--  ****************************
              **** TAREFAS CONCLUÍDAS ****
              **************************** -->
              <vs-tab @click="colorx = 'success'" label="Concluídas" icon="done">
                <div class="con-tab-ejemplo">

                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6" vs-sm="6" vs-xs="12">
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

                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6" vs-sm="6" vs-xs="12">
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

                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6" vs-sm="6" vs-xs="12">
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

        <!--  ****************************
              **** TAREFAS PENDENTES *****
              **************************** -->
              <vs-tab @click="colorx = 'warning'" icon="priority_high" label="Pendentes">
                <div class="con-tab-ejemplo">
                  

                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6" vs-sm="6" vs-xs="12">
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

                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6" vs-sm="6" vs-xs="12">
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

       <!--  *********************************
             **** TAREFAS NÃO REALIZADAS *****
             ********************************* -->
              <vs-tab @click="colorx = 'danger'" icon="sentiment_very_dissatisfied" label="Não Realizadas">
                <div class="con-tab-ejemplo">
                  
                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6" vs-sm="6" vs-xs="12">
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
  created() {
    let userSession = sessionStorage.getItem('user')
    if(userSession) {
      this.user = JSON.parse(userSession)
    }
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