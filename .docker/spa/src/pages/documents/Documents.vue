<template>
  <SiteTemplate>
    <span slot="menu-left">
    
      <!-- TEST A - MODELO DE PAINEL PARA SIDEBAR -->
      <!-- ################################################# -->
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
      
      <h5>
        Documentações Em Geral
      </h5>
      <br><br>
      <vs-tabs alignment="center">
        <vs-tab label="PDF's em Geral">
          <div>

          </div>
        </vs-tab>
        <vs-tab label="Notas Fiscais">
          <div>

          </div>
        </vs-tab>
        <vs-tab label="Planilhas">
          <div>

          </div>
        </vs-tab>
        <vs-tab label="Contratos De Serviços">
          <div>

          </div>
        </vs-tab>
      </vs-tabs>




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
  name: 'Documents',
  data() {
    return {
      user: false
    }
  },
  components:{
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
    let userSession = sessionStorage.getItem('user')
    if (userSession) {
      this.user = JSON.parse(userSession)
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
