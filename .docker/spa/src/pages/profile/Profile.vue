<template>
  <SiteTemplate>

    <span slot="menu-left">
      <div class="row valign-wrapper">
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
      <br><br><br><br>
      <div class="row">
        
        <div class="col s4 m4">
          


          <div class="card">
            
            <!-- <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a> -->
            <img src="https://www.wefashiontrends.com/wp-content/uploads/2019/03/pose-para-fotos-de-perfil.jpg" alt="" width="50" class="circle responsive-img">
            <h6>Janaina Alves</h6>
            <div class="card-content">

              <p>Oláaa, tenha uma boa tarde!!.😘</p>
            </div>
          </div>
          
          <div class="card">  
            <!-- <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a> -->
            <img src="https://www.wefashiontrends.com/wp-content/uploads/2019/03/pose-para-fotos-de-perfil.jpg" alt="" width="50" class="circle responsive-img">
            <h6>Janaina Alves</h6>
            <div class="card-content">

              <p>Deixei os documentos na sua mesa!</p>
            </div>
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

export default {
  name: 'Profile',
  data () {
    return {

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
