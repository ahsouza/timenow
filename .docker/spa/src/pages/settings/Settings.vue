<template>
  <SiteTemplate>

    <span slot="menu-left">
      <div class="row valign-wrapper">
        <grid-vue tamanho="1 l6 m12">
          <img :src="user.avatar" :alt="user.name" width="100" class="circle responsive-img"> <!-- notice the "circle" class -->
        </grid-vue>

        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            
          </span>
        </grid-vue>
      </div>
    </span>


    <span slot="main">

      <br>
 <!-- ************************
      ******* 1 LINHA ********
      ************************ -->
      <div class="row">     
        <div class="col s12 m12 l12">


           <div class="">
            <vs-tabs>

              <vs-tab label="Privacidade">
                <div class="con-tab-ejemplo">
                  <br><br><br>
                  <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12" vs-sm="12" vs-xs="12">
            

                       <div>
                          <vs-table
                            :data="privacy">
                            <template slot="header">
                              <h5>
                                Como as pessoas visualizam seu perfil e informações
                              </h5>
                            </template>


                            <template slot-scope="{data}">
                              <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data" >
                                <vs-td :data="tr.option">
                                  {{tr.option}}
                                </vs-td>





                                <template class="expand-user" slot="expand">
                                  <div class="con-expand-users">
                                    <div class="con-btns-user">
                                      <div class="con-userx">
                                        <vs-avatar :badge="tr.id" size="45px" :src="`https://randomuser.me/api/portraits/women/${indextr}.jpg`"/>
                                        <span>
                                          {{ tr.name }}
                                        </span>
                                      </div>

                                      <div>
                                        <vs-button vs-type="border" size="small" icon="phone_in_talk"></vs-button>
                                        <vs-button vs-type="gradient" size="small" color="success" icon="send"></vs-button>
                                        <vs-button vs-type="flat" size="small" color="danger" icon="delete_sweep"></vs-button>
                                      </div>
                                    </div>
                                    <vs-list>
                                      <vs-list-item icon="mail" title="Email" :subtitle="tr.email"></vs-list-item>
                                      <vs-list-item icon="check" title="Website" :subtitle="tr.website"></vs-list-item>
                                    </vs-list>
                                  </div>
                                </template>
                              </vs-tr>
                            </template>



                          </vs-table>

                          <pre>{{ selected }}</pre>
                        </div>
























                  </vs-col>



                </div>
              </vs-tab>

              <vs-tab label="Privacidade">
                <div class="con-tab-ejemplo">
                  Privacidade
                </div>
              </vs-tab>

              <vs-tab label="Comunicação">
                <div class="con-tab-ejemplo">
                  Comunicação
                </div>
              </vs-tab>

            </vs-tabs>
          </div>




        </div>
      </div>

 <!-- ************************
      ******* 2 LINHA ********
      ************************ -->
      <div class="row">     
        <div class="col s12 m12 l12">
                

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
  name: 'Settings',
  data () {
    return {
      user: false,
      privacy: [
        {
          "id": 1,
          "option": "Quem pode visualizar seu e-mail",
        },
        {
          "id": 2,
          "option": "Quem pode ver seus amigos",
        },
        {
          "id": 3,
          "option": "Quem pode ver seu sobrenome",
        },
        {
          "id": 4,
          "option": "Quem pode ver quando você estiver no conectado ao Time-Now",
        },
        {
          "id": 5,
          "option": "Selecione quem pode seguir você e visualizar suas atualizações públicas",
        },
        {
          "id": 6,
          "option": "Visualize a lista de pessoas que você bloqueou",
        },
        {
          "id": 7,
          "option": "Visualize quem você parou de seguir e volte a seguir, se desejar",
        },
      ]
    }
  },
  created() {
    let userSession = sessionStorage.getItem('user')
    if(userSession) {
      this.user = JSON.parse(userSession)
    }
  },
  components:{
    CardContentVue,
    SiteTemplate,
    CardDetailVue,
  }
}
</script>
<style scoped>

.about-avatar {
  margin-left: 15px;
}

@media only screen and (max-width: 600px) {
  .circle { width: 50px;}
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
  
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  
}

</style>
