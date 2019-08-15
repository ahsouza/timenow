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

              <vs-tab label="Conta">
                <div class="con-tab-ejemplo">

                  <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12" vs-sm="12" vs-xs="12">
                  
                


                       <div>
                          <vs-table
                            :data="users">
                            <template slot="header">
                              <h3>
                                Users
                              </h3>
                            </template>
                            <template slot="thead">
                              <vs-th>
                                Email
                              </vs-th>
                              <vs-th>
                                Name
                              </vs-th>
                              <vs-th>
                                Website
                              </vs-th>
                              <vs-th>
                                Nro
                              </vs-th>
                            </template>

                            <template slot-scope="{data}">
                              <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data" >
                                <vs-td :data="tr.email">
                                  {{tr.email}}
                                </vs-td>

                                <vs-td :data="tr.username">
                                  {{tr.name}}
                                </vs-td>

                                <vs-td :data="tr.website">
                                  {{tr.website}}
                                </vs-td>

                                <vs-td :data="tr.id">
                                  {{tr.id}}
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



users:[
      {
        "id": 1,
        "name": "Leanne Graham",
        "username": "Bret",
        "email": "Sincere@april.biz",
        "website": "hildegard.org",
      },
      {
        "id": 2,
        "name": "Ervin Howell",
        "username": "Antonette",
        "email": "Shanna@melissa.tv",
        "website": "anastasia.net",
      },
      {
        "id": 3,
        "name": "Clementine Bauch",
        "username": "Samantha",
        "email": "Nathan@yesenia.net",
        "website": "ramiro.info",
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
