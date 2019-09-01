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
                                Como as pessoas visualizam seu perfil e privacidades
                              </h5>
                            </template>


                            <template slot-scope="{data}">
                              <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data" >
                                <vs-td :data="tr.option">
                                  <h6>{{tr.option}}</h6>
                                </vs-td>






                                <template class="expand-user" slot="expand">
                                  <div class="con-expand-users">
                                    
                                    <div class="con-btns-user">

                                      <div class="con-userx">
                                        <span>
                                          <vs-select
                                            class="selectExample"
                                            label="Quem pode visualizar"
                                            v-model="select1"
                                            >

                                            <vs-select-item :key="index" :value="item.value" :text="item.text" v-for="item,index in options1" />
                                          </vs-select>
                                          
                                        </span>
                                      </div>

                                    </div>

                            

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
      select1Normal:'',
      select1:0,
      options1:[
        {text:'Todas As Pessoas',value:0},
        {text:'Apenas Amigos',value:2},
        {text:'Ninguém',value:3},
      ],
      privacy: [
        {
          "id": 1,
          "option": "Quem pode visualizar seu e-mail",
          "email": "annibalhsouza@gmail.com",
        },
        {
          "id": 2,
          "option": "Quem pode ver seus amigos",
        },
        {
          "id": 3,
          "option": "Selecione quem pode visualizar seus seguidores",
        },
        {
          "id": 4,
          "option": "Quem pode ver quando você estiver conectado ao Time-Now",
        },
        {
          "id": 5,
          "option": "Visualize a lista de pessoas que você bloqueou",
        },
        {
          "id": 6,
          "option": "Visualize quem você parou de seguir e volte a seguir, se desejar",
        },
      ]
    }
  },
  beforeCreate() {
    console.log("Before Create!")
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
