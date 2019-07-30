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
              :data="users">
              <template slot="header">
                <h3>
                  Meus Amigos
                </h3>
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
      {
        "id": 4,
        "name": "Patricia Lebsack",
        "username": "Karianne",
        "email": "Julianne.OConner@kory.org",
        "website": "kale.biz",
      },
      {
        "id": 5,
        "name": "Chelsey Dietrich",
        "username": "Kamren",
        "email": "Lucio_Hettinger@annie.ca",
        "website": "demarco.info",
      },
      {
        "id": 6,
        "name": "Mrs. Dennis Schulist",
        "username": "Leopoldo_Corkery",
        "email": "Karley_Dach@jasper.info",
        "website": "ola.org",
      },
      {
        "id": 7,
        "name": "Kurtis Weissnat",
        "username": "Elwyn.Skiles",
        "email": "Telly.Hoeger@billy.biz",
        "website": "elvis.io",
      },
      {
        "id": 8,
        "name": "Nicholas Runolfsdottir V",
        "username": "Maxime_Nienow",
        "email": "Sherwood@rosamond.me",
        "website": "jacynthe.com",
      },
      {
        "id": 9,
        "name": "Glenna Reichert",
        "username": "Delphine",
        "email": "Chaim_McDermott@dana.io",
        "website": "conrad.com",
      },
      {
        "id": 10,
        "name": "Clementina DuBuque",
        "username": "Moriah.Stanton",
        "email": "Rey.Padberg@karina.biz",
        "website": "ambrose.net",
      }
    ]
  }),
  components:{
    CardContentVue,
    SiteTemplate,
    CardDetailVue,
    TabsCardVue
  }
}
</script>


<style lang="stylus">
.con-expand-users
  .con-btns-user
    display flex
    padding 10px
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
</style>
