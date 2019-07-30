<template>
  <SiteTemplate>
    <span slot="menu-left">
    
      <!-- TEST A - MODELO DE PAINEL PARA SIDEBAR -->
      <!-- ################################################# -->
      <div class="row valign-wrapper">
        
        <grid-vue tamanho="1 l6 m12">
          <img src="https://avatars3.githubusercontent.com/u/28975240?s=460&v=4" alt="" width="75" class="circle responsive-img">
        </grid-vue>


        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            <h6>@ahsouza</h6>
            {{ user.email }}
            <br>
            Pts: <b>120</b>
          </span>
        </grid-vue>

      </div>

      <!-- TEST A - MODELO DE PAINEL PARA SIDEBAR -->
      <!-- ################################################# -->




      <!-- TEST B - MODELO DE PAINEL PARA SIDEBAR -->


    </span>






    <span slot="main">
<!--       <public-content-vue />
      <card-content-vue
      perfil="https://avatars3.githubusercontent.com/u/28975240?s=460&v=4"
      nome="Aníbal Henrique"
      data="21/03/2019 16:52">
      <card-detail-vue
      img="https://clickpetroleoegas.com.br/wp-content/uploads/2019/04/engenharia-752x440.jpg"
      txt="A Time-Now Engenharia se destaca no mercado há 23 anos oferecendo a seus clientes as melhores soluções em Gestão de Engenharia com foco no Gerenciamento de Implantação de Projetos, Gestão de Portfólio de Projetos e Gestão de Paradas de Plantas Industriais."
      title="Saiba mais da Time-Now Engenharia"
      />
      </card-content-vue> -->

      
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
