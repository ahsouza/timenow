<template>
  <span>
    <header>
      <nav-bar logo="@/assets/timenow.png" url="#/" cor="white" >
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/login">Mensagens</router-link></li>
        <li><router-link to="/portfolio">Tarefas</router-link></li>
        <li><router-link to="/login">Grupos</router-link></li>
        <li><router-link to="/contato"><a class="btn-floating btn-medium waves-effect waves-light green animated pulse"><i class="medium material-icons">notifications_active</i></a></router-link></li>
        <li><a href="sass.html"><i class="material-icons animated fadeInRight">search</i></a></li>
        <li><a href="mobile.html"><i class="material-icons animated fadeInRight delay-1s">more_vert</i></a></li>
      </nav-bar>
    </header>

    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="12 l4 m4">
            <card-menu-vue>
              <div class="row valign-wrapper animated fadeIn">
                <slot name="menu-left" />
              </div>
              <a class="btn-floating btn-small waves-effect waves-light blue animated fadeIn"><i class="small material-icons">question_answer</i></a>
              <a class="btn-floating btn-small waves-effect waves-light blue animated fadeIn"><i class="small material-icons">record_voice_over</i></a>
              &nbsp;&nbsp;&nbsp;
              <a class="btn-floating btn-small waves-effect waves-light green animated fadeIn"><i class="small material-icons">done</i></a>
              <a class="btn-floating btn-small waves-effect waves-light red animated pulse"><i class="small material-icons">priority_high</i></a>


            </card-menu-vue>

            <card-menu-vue class="animated fadeInLeft" id="favorites">
              <h5><i class="small material-icons">favorite</i>&nbsp;Meus Favoritos</h5>
              <br><br>
              <a class="btn-floating btn-small waves-effect waves-light blue animated fadeIn"><i class="small material-icons">photo</i></a>
              <a class="btn-floating btn-small waves-effect waves-light blue animated fadeIn"><i class="small material-icons">movie</i></a>
              <a class="btn-floating btn-small waves-effect waves-light blue animated fadeIn"><i class="small material-icons">music_note</i></a>
              <a class="btn-floating btn-small waves-effect waves-light blue animated fadeIn"><i class="small material-icons">mail</i></a>
              <a class="btn-floating btn-small waves-effect waves-light blue animated fadeIn"><i class="small material-icons">location_on</i></a>
            </card-menu-vue>


          </grid-vue>


          <grid-vue tamanho="12 l8 m8">
            <slot name="main" />
          </grid-vue>

        </div>
      </div>
    </main>

    <footer-vue cor="green darken-1" logo="@/assets/timenow.png" descricao="Sua de descrição" ano="2019">

      <li><a class="grey-text text-lighten-3" href="#!">Segurança & Privacidade</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Preferências</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Configurações</a></li>

    </footer-vue>


  </span>
</template>

<script>
import NavBar from '@/components/layouts/NavBar'
import FooterVue from '@/components/layouts/FooterVue'
import GridVue from '@/components/layouts/GridVue'
import CardMenuVue from '@/components/layouts/CardMenuVue'

export default {
  name: 'SiteTemplate',
  components:{
    NavBar,
    FooterVue,
    GridVue,
    CardMenuVue
  }
}
</script>

<style scoped>
a {
  color: black;
}







/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
  #favorites { display: none;}
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
