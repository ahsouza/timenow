<template>
  
  <SiteTemplate>
    <span slot="menu-left">
      <div class="row valign-wrapper">  
        <grid-vue tamanho="1 l6 m12">

          <router-link :to="'/user/'+user.id+'/'+$slug(user.name, {lower: true})">
            <img :src="user.avatar" :alt="user.name" width="75" class="circle responsive-img">
          </router-link>
          <vs-icon icon="child_care" size="small" color="red"></vs-icon>
        </grid-vue>


        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            <router-link :to="'/user/'+user.id+'/'+$slug(user.name, {lower: true})">
              <h6>{{user.name}}</h6>
            </router-link>  
          </span>
        </grid-vue>

      </div>

    </span>

    <span slot="main">

      <PublicContentVue style="padding-bottom: 12%"/>

      <card-content-vue v-for="item in listContents" :key="item.id"
        :id="item.id"
        :totallikes="item.total_likes"
        :totalcomments="item.total_comments"
        :likecontent="item.like_content"
        :userId="item.user.id"
        :perfil="item.user.avatar"
        :nome="item.user.name"
        :data="item.date">
        <card-detail-vue
          :img="item.image"
          :title="item.title"
          :txt="item.text"
          :link="item.link"/>
      </card-content-vue>
      <button @click="loadingPagination" v-if="urlNextPage" class="btn blue">ver mais...</button>
      <div v-scroll="handleScroll">

      </div>
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
      user: {avatar: '', name: ''},
      urlNextPage: null,
      stopScroll: false
    }
  },
  components: {
    CardContentVue,
    SiteTemplate,
    CardDetailVue,
    PublicContentVue,
    GridVue
  },
  beforeCreate() {
    console.log("Before Create!")
  },
  created() {
    let userSession = this.$store.getters.getUser

    if(userSession) {
      this.user = this.$store.getters.getUser
      this.$http.get(this.$url + `content/list`, {"headers": {"authorization": "Bearer " + this.$store.getters.getToken}})
        .then(res => {

          if(res.data.status) {
            this.$store.commit('setContentsTimeLine', res.data.contents.data)
            this.urlNextPage = res.data.contents.next_page_url

          }

        }).catch(e => {
          console.log(e)
          alert(`Erro! Tente novamente mais tarde!`)
        })
    }
  },
  methods: {
    handleScroll() {
      // console.log(window.scrollY)
      // console.log(document.body.clientHeight)
      if(this.stopScroll) {
        return;
      }
      if (window.scrollY >= document.body.clientHeight - 949) {
        this.stopScroll = true
        this.loadingPagination()
      }

    },
    loadingPagination() {
      if (!this.urlNextPage) {
        return;
      }
      this.$http.get(this.urlNextPage, {"headers": {"authorization": "Bearer " + this.$store.getters.getToken}})
        .then(res => {

          if(res.data.status && this.$route.name == 'Home') {
            this.$store.commit('setPaginationContentsTimeLine', res.data.contents.data)
            this.urlNextPage = res.data.contents.next_page_url
            this.stopScroll = false
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
