<template>
  <SiteTemplate>
    <span slot="menu-left">
      <div class="row valign-wrapper animated fadeIn">
        <grid-vue tamanho="1 l6 m12">
          <img :src="user.avatar" :alt="user.name" width="100" class="circle responsive-img"> <!-- notice the "circle" class -->
        </grid-vue>

        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            <h6>{{user.name}}</h6>
          </span>
        </grid-vue>
      </div>
    </span>

    <span slot="main">
      <div class="row" style="margin-top: 10%">
        
        <div class="col s12 m12 l12">
          <div style="padding-bottom: 30%">
            <h5 style="font-family: Indie Flower">
              Amigos De Trabalho
            </h5>
            <br><br>
            <vs-table
              :data="users" style="overflow-y: scroll; overflow-x: hidden; height: 600px;" class="animated fadeIn tb-friends">
              <template slot="header">

              </template>

              <template slot-scope="{data}">

                <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">
                  <vs-avatar :badge="tr.id" size="60px" :src="`https://randomuser.me/api/portraits/women/${indextr}.jpg`"/>

                  <vs-td :data="tr.username">
                    <h6>{{tr.name}}</h6>
                  </vs-td>


             <!-- ***********************************
                  ******* ÍCONES DE COMUNICAÇÃO *****
                  *********************************** -->
                  <div class="communication-icons">

                    <a :href="'https://api.whatsapp.com/send?phone=' + tr.tel +'&text=Olá,%20' + tr.name + '!'" target="blank">
                      <vs-button vs-type="border" color="success" size="small" icon="phone_in_talk" class="btn-friend"></vs-button>
                    </a>

                    <a :href="'https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&source=mailto&to=' + tr.email + '#'" target="_blank">
                      <vs-button vs-type="gradient" size="small" color="primary" icon="send" class="btn-friend"></vs-button>
                    </a>

                    <vs-button vs-type="flat" size="small" color="danger" icon="delete_sweep" class="btn-friend"></vs-button>

                  </div>
             <!-- ***********************************
                  ******* MODAL PARA ÍCONES *****
                  *********************************** -->
                  <!-- MODAL -->
                    <div class="centerx con-exemple-prompt">
                       <vs-prompt
                        @cancel="val=''"
                        @accept="acceptAlert"
                        @close="close"
                        :active.sync="activePrompt">
                         <div class="con-exemple-prompt">
                            Destinatário
                           <vs-input placeholder="Para" v-model="val"/>
                           <vs-textarea counter="20" label="Digite sua mensagem" :counter-danger.sync="counterDanger" v-model="textarea" />

                           <vs-select
                              class="selectExample"
                              label="Provedores De Email"
                              v-model="select1"
                              >
                              <vs-select-item :key="index" :value="item.value" :text="item.text" v-for="item,index in options1" />
                            </vs-select>
                         </div>
                       </vs-prompt>
                    </div>
                  <!-- MODAL -->
                  
             <!-- ******************************************
                  ******* ÍCONES DE COMUNICAÇÃO MOBILE *****
                  ****************************************** -->
                  <template class="expand-user" slot="expand">
                    <div class="con-expand-users">
                      <vs-list>

                        <div class="communication-icons-mobile">
                          
                          <a :href="'https://api.whatsapp.com/send?phone=' + tr.tel +'&text=Olá,%20' + tr.name + '!'" target="blank">
                            <vs-button vs-type="border" color="success" size="small" icon="phone_in_talk" class="btn-friend"></vs-button>
                          </a>

                          <vs-button vs-type="gradient" @click="activePrompt = true" size="small" color="primary" icon="send" class="btn-friend"></vs-button>

                          <vs-button vs-type="flat" size="small" color="danger" icon="delete_sweep" class="btn-friend"></vs-button>
                          
                        </div>

                        <div class="information-contacts">
                          <vs-list-item icon="mail" title="Email" :subtitle="tr.email"></vs-list-item>
                          <vs-list-item icon="phone" title="Telefone" :subtitle="tr.tel"></vs-list-item>
                          <vs-list-item icon="done" title="Site" :subtitle="tr.website"></vs-list-item>
                          
                        </div>


                      </vs-list>
                    </div>
                  </template>

                </vs-tr>

              </template>
            </vs-table>

            <pre>{{ selected }}</pre>
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
import TabsCardVue from '@/components/patterns/TabsCardVue'

export default {
  name: 'Friends',
  data:()=>({
    user: false,
    select1:2,
    options1:[
      {text:'Outlook',value:2},
      {text:'Gmail',value:0},
      {text:'Corporativo',value:4},
    ],
    activePrompt:false,
    val:'',
    valMultipe:{
      value1:'',
      value2:''
    },
    users:[
      {
        "id": 1,
        "name": "Leanne Graham",
        "username": "Bret",
        "email": "leane.graham@gmail.com",
        "tel": "5527996206361",
        "website": "hildegard.org",
      },
      {
        "id": 2,
        "name": "Ervin Howell",
        "username": "Antonette",
        "email": "ervin.howell@gmail.com",
        "tel": "5527997516909",
        "website": "anastasia.net",
      },
      {
        "id": 3,
        "name": "Clementine Bauch",
        "username": "Samantha",
        "email": "clementine@gmail.com",
        "tel": "5527998761122",
        "website": "ramiro.info",
      },
      {
        "id": 4,
        "name": "Patricia Lebsack",
        "username": "Karianne",
        "email": "patricia.lebsack@gmail.com",
        "tel": "5527998840401",
        "website": "kale.biz",
      },
      {
        "id": 5,
        "name": "Chelsey Dietrich",
        "username": "Kamren",
        "email": "chelsey.dietrich@gmail",
        "tel": "5527998887691",
        "website": "demarco.info",
      },
      {
        "id": 6,
        "name": "Mrs. Dennis Schulist",
        "username": "Leopoldo_Corkery",
        "email": "dennis.schulist@gmail.com",
        "tel": "5527992437909",
        "website": "ola.org",
      },
      {
        "id": 7,
        "name": "Kurtis Weissnat",
        "username": "Elwyn.Skiles",
        "email": "kurtis.weissnat@gmail.com",
        "tel": "5527996206361",
        "website": "elvis.io",
      },
      {
        "id": 8,
        "name": "Nicholas Runolfsdottir V",
        "username": "Maxime_Nienow",
        "email": "nicholas.runolfsdottir@gmail.com",
        "tel": "5527996206361",
        "website": "jacynthe.com",
      },
      {
        "id": 9,
        "name": "Glenna Reichert",
        "username": "Delphine",
        "email": "glenna.reichert@gmail.com",
        "tel": "5527996206361",
        "website": "conrad.com",
      },
      {
        "id": 10,
        "name": "Clementina DuBuque",
        "username": "Moriah.Stanton",
        "email": "clementina.dubuque@gmail.com",
        "tel": "5527996206361",
        "website": "ambrose.net",
      },
      {
        "id": 11,
        "name": "Aníbal Henrique",
        "username": "ahsouza",
        "email": "annibalhsouza@gmail.com",
        "tel": "5527996206361",
        "website": "https://ahsouza.github.io"
      }
    ]
  }),
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
    TabsCardVue
  },
  computed:{
    validName(){
      return (this.valMultipe.value1.length > 0 && this.valMultipe.value2.length > 0)
    }
  },
  methods: {
    acceptAlert(color){
      this.$vs.notify({
        color:'success',
        title:'Envio de e-mail',
        text:'Seu e-mail foi enviado com sucesso!'
      })
    },
    close(){
      this.$vs.notify({
        color:'primary',
        title:'Cancelando E-mail',
        text:'Você fechou a caixa de menssagens!'
      })
    }
  }
}
</script>


<style lang="stylus">
.btn-friend
  margin-right 8px
.con-expand-users
  .con-btns-user
    display flex
    padding 30px
    padding-bottom 0px
    align-items center
    justify-content space-between
    .con-userx
      display flex
      align-items center
      justify-content flex-start
  .list-icon
    i
      font-size .9rem !important

.con-exemple-prompt
  padding 10px;
  padding-bottom 0px;
  .vs-input
    width 100%
    margin-top 40px;
</style>

<style scoped>
@media only screen and (max-width: 600px) {
  .communication-icons{
    display:none;
  }
  .information-contacts {
    display:none;
  }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  
} 

 // Medium devices (landscape tablets, 768px and up)
@media only screen and (min-width: 768px) {
  .communication-icons-mobile {
    display: none;
  }
  
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
  .communication-icons-mobile {
    display: none;
  }
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  .communication-icons-mobile {
    display: none;
  }
  
}
</style>