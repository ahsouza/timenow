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
                  Conta
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
      user: false
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
