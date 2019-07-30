<template>
  <SiteTemplate>

    <span slot="menu-left">
      <div class="row valign-wrapper animated fadeIn">
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
      <div class="row">
        
        <div class="col s12 m12 l12">

        <br><br>


          <div>
            <vs-table
              :data="users" style="overflow-y: scroll; overflow-x: hidden; height: 600px;">
              <template slot="header">
                <h4>
                  Meus Amigos
                  <!-- <font-awesome-icon icon="user-secret"/> -->
                </h4>
              </template>

              <template slot-scope="{data}">

                <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data" >
                  <!-- <vs-td :data="tr.id">
                    {{tr.id}}
                  </vs-td> -->

                  <vs-avatar :badge="tr.id" size="60px" :src="`https://randomuser.me/api/portraits/women/${indextr}.jpg`"/>

                  <vs-td :data="tr.username">
                    <h6>{{tr.name}}</h6>
                  </vs-td>

                  <div>

                    <a :href="'https://api.whatsapp.com/send?phone=' + tr.tel +'&text=Olá,%20' + tr.name + '!'" target="blank"><vs-button vs-type="border" color="success" size="small" icon="phone_in_talk" class="btn-friend"></vs-button></a>
                    <vs-button vs-type="gradient" @click="activePrompt = true" size="small" color="primary" icon="send" class="btn-friend"></vs-button>
                    <vs-button vs-type="flat" size="small" color="danger" icon="delete_sweep" class="btn-friend"></vs-button>
                  </div>





                  <!-- MODAL -->
                    <div class="centerx con-exemple-prompt">
                      <!-- <vs-button @click="openPrompt" color="primary" type="border">Run prompt</vs-button> -->
             <!--          <div class="modelx">
                        {{val==null?'null':val}}
                      </div>
                       <div class="modelx">
                         {{valMultipe.value1}}
                         {{valMultipe.value2}}
                       </div>
                        -->

                       <vs-prompt
                        @cancel="val=''"
                        @accept="acceptAlert"
                        @close="close"
                        :active.sync="activePrompt">
                         <div class="con-exemple-prompt">
                            Enter the security code
                           <vs-input placeholder="Para" v-model="val"/>
                           <vs-textarea counter="20" label="Digite sua mensagem" :counter-danger.sync="counterDanger" v-model="textarea" />

                           <vs-select
                              class="selectExample"
                              label="Figuras"
                              v-model="select1"
                              >
                              <vs-select-item :key="index" :value="item.value" :text="item.text" v-for="item,index in options1" />
                            </vs-select>
                         </div>
                       </vs-prompt>
                    </div>
                  <!-- MODAL -->





                  <template class="expand-user" slot="expand">
                    <div class="con-expand-users">
                      <vs-list>
                        <vs-list-item icon="mail" title="Email" :subtitle="tr.email"></vs-list-item>
                        <vs-list-item icon="phone" title="Telefone" :subtitle="tr.tel"></vs-list-item>
                        <vs-list-item icon="done" title="Site" :subtitle="tr.website"></vs-list-item>
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



      <div class="row">
        <div class="col s12 m12">
          <h1>Other Line</h1>
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
    select1:2,
    options1:[
      {text:'IT',value:0},
      {text:'Blade Runner',value:2},
      {text:'Thor Ragnarok',value:3},
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
        "email": "Sincere@april.biz",
        "tel": "5527996206361",
        "website": "hildegard.org",
      },
      {
        "id": 2,
        "name": "Ervin Howell",
        "username": "Antonette",
        "email": "Shanna@melissa.tv",
        "tel": "5527997516909",
        "website": "anastasia.net",
      },
      {
        "id": 3,
        "name": "Clementine Bauch",
        "username": "Samantha",
        "email": "Nathan@yesenia.net",
        "tel": "5527998761122",
        "website": "ramiro.info",
      },
      {
        "id": 4,
        "name": "Patricia Lebsack",
        "username": "Karianne",
        "email": "Julianne.OConner@kory.org",
        "tel": "5527998840401",
        "website": "kale.biz",
      },
      {
        "id": 5,
        "name": "Chelsey Dietrich",
        "username": "Kamren",
        "email": "Lucio_Hettinger@annie.ca",
        "tel": "5527998887691",
        "website": "demarco.info",
      },
      {
        "id": 6,
        "name": "Mrs. Dennis Schulist",
        "username": "Leopoldo_Corkery",
        "email": "Karley_Dach@jasper.info",
        "tel": "5527992437909",
        "website": "ola.org",
      },
      {
        "id": 7,
        "name": "Kurtis Weissnat",
        "username": "Elwyn.Skiles",
        "email": "Telly.Hoeger@billy.biz",
        "tel": "5527996206361",
        "website": "elvis.io",
      },
      {
        "id": 8,
        "name": "Nicholas Runolfsdottir V",
        "username": "Maxime_Nienow",
        "email": "Sherwood@rosamond.me",
        "tel": "5527996206361",
        "website": "jacynthe.com",
      },
      {
        "id": 9,
        "name": "Glenna Reichert",
        "username": "Delphine",
        "email": "Chaim_McDermott@dana.io",
        "tel": "5527996206361",
        "website": "conrad.com",
      },
      {
        "id": 10,
        "name": "Clementina DuBuque",
        "username": "Moriah.Stanton",
        "email": "Rey.Padberg@karina.biz",
        "tel": "5527996206361",
        "website": "ambrose.net",
      }
    ]
  }),
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
        title:'Accept Selected',
        text:'Lorem ipsum dolor sit amet, consectetur'
      })
    },
    close(){
      this.$vs.notify({
        color:'danger',
        title:'Closed',
        text:'You close a dialog!'
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
    margin-top 10px;
</style>
