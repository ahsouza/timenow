<template>
  
  <SiteTemplate>

    <span slot="menu-left">

      <div class="row valign-wrapper">  
        <grid-vue tamanho="1 l6 m12">
          <img :src="user.avatar" :alt="user.name" width="75" class="circle responsive-img">

          <vs-icon icon="child_care" size="small" color="red"></vs-icon>
        </grid-vue>


        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            <h6>{{user.name}}</h6>
          </span>
        </grid-vue>

      </div>

    </span>

    <span slot="main">

      <PublicContentVue style="padding-bottom: 12%"/>

      <card-content-vue v-for="item in listContents" :key="item.id"
        :id="item.id"
        :perfil="item.user.avatar"
        :nome="item.user.name"
        :data="item.date">
        <card-detail-vue
          :img="item.image"
          :title="item.title"
          :txt="item.text"
          :link="item.link"/>
      </card-content-vue>
    </span>

  </SiteTemplate>
  
</template>

<script>
import SiteTemplate from '@/templates/SiteTemplate'
import CardContentVue from '@/components/patterns/CardContentVue'
import CardDetailVue from '@/components/patterns/CardDetailVue'
import PublicContentVue from '@/components/patterns/PublicContentVue'
import GridVue from '@/components/layouts/GridVue'

export default {
  name: 'Home',
  data() {
    return {
      user: false
    }
  },
  components: {
    CardContentVue,
    SiteTemplate,
    CardDetailVue,
    PublicContentVue,
    GridVue
  },
  created() {
    let userSession = this.$store.getters.getUser

    if(userSession) {
      this.user = this.$store.getters.getUser
      this.$http.get(this.$url + `content/list`, {"headers": {"authorization": "Bearer " + this.$store.getters.getToken}})
        .then(res => {

          if(res.data.status) {
            this.$store.commit('setContentsTimeLine', res.data.contents.data)
          }

        }).catch(e => {
          console.log(e)
          alert(`Erro! Tente novamente mais tarde!`)
        })
    }
  },
  computed: {
    listContents() {
      return this.$store.getters.getContentsTimeLine;
    }
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
