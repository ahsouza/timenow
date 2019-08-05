<template>
  <SiteTemplate>
    <span slot="menu-left">

      <div class="row valign-wrapper">
        
        <grid-vue tamanho="1 l6 m12">
          <img :src="user.avatar" :alt="user.name" width="75" class="circle responsive-img">
        </grid-vue>

        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            <h6>{{user.name}}</h6>
            <br>
            Pts: <b>120</b>
          </span>
        </grid-vue>

      </div>

    </span>

    <span slot="main">

      <br><br><br><br><br>
      <div class="con-example-images">
        <vs-select
        class="selectExample"
          label="Screenshots"
          v-model="hover"
          >
          <vs-select-item :key="index" :value="item.value" :text="item.text" v-for="(item,index) in typeImages" />
        </vs-select>

        <vs-images :hover="hover">
          <vs-image :key="index" :src="`https://picsum.photos/400/400?image=3${index}`" v-for="(image, index) in 9" />
          <vs-image :key="index" :src="`https://picsum.photos/400/400?image=4${index}`" v-for="(image, index) in 7" />
        </vs-images>
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
  name: 'Images',
  data() {
    return {
      user: false,
      hover: 'blur',
      typeImages:[
        {text:'Tarefas',value:'tasks'},
        {text:'Reclamações',value:'claims'},
        {text:'Prêmios',value:'awards'},
        {text:'Mensagens',value:'messages'},
      ],
    }
  },
  components:{
    CardContentVue,
    SiteTemplate,
    CardDetailVue,
    PublicContentVue,
    GridVue
  },
  created() {
    let userSession = sessionStorage.getItem('user')
    if (userSession) {
      this.user = JSON.parse(userSession)
    }
  }
  
}
</script>
<style scoped lang="stylus">

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

.con-example-images
  max-height 500px
  overflow auto
</style>

