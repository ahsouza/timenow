<template>
  <span>
    <header>
        <nav-bar logo="" url="/" cor="white">
        <li v-if="user"><router-link to="/">Home</router-link></li>
        <li v-if="!user"><router-link to="/login">Iniciar sessão</router-link></li>
        <li v-if="!user"><router-link to="/register">Cadastre-se</router-link></li>
        <li v-if="user"><router-link to="/messages">Mensagens</router-link></li>
        <li v-if="user"><router-link to="/tasks">Tarefas</router-link></li>
        <li v-if="user"><router-link to="/groups">Grupos</router-link></li>
        <li v-if="!user"><a href="http://www.timenow.com.br">Nosso Site</a></li>
        <li v-if="user"><a v-on:click="exit()">Sair</a></li>
        
        <li v-if="user"><a href="sass.html"><i class="material-icons animated fadeInRight">search</i></a></li>
        <li v-if="user"><a href="mobile.html"><i class="material-icons animated fadeInRight delay-1s">exit_to_app</i></a></li>
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
              <a class="btn-floating btn-small waves-effect waves-light blue animated fadeIn tooltipped" data-position="bottom" data-tooltip="I am a tooltip"><i class="small material-icons">question_answer</i></a>&nbsp;
              <a class="btn-floating btn-small waves-effect waves-light blue animated fadeIn"><i class="small material-icons">record_voice_over</i></a>
              &nbsp;&nbsp;&nbsp;
              <a class="btn-floating btn-small waves-effect waves-light green animated fadeIn"><i class="small material-icons">done</i></a>&nbsp;
              <a class="btn-floating btn-small waves-effect waves-light red animated pulse"><i class="small material-icons">priority_high</i></a>


            </card-menu-vue>

            <card-menu-vue class="animated fadeInLeft" id="favorites">
              
              <small>favoritos</small><br><br>
              <a class="margin-transition btn-floating btn-small waves-effect waves-light amber darken-4 animated fadeIn"><i class="small material-icons">photo</i></a>&nbsp;
              <a class="margin-transition btn-floating btn-small waves-effect waves-light red darken-4 animated fadeIn"><i class="small material-icons">movie</i></a>&nbsp;
              <a class="margin-transition btn-floating btn-small waves-effect waves-light purple darken-4 animated fadeIn"><i class="small material-icons">music_note</i></a>&nbsp;
              <a class="margin-transition btn-floating btn-small waves-effect waves-light brown darken-1 animated fadeIn"><i class="small material-icons">library_books</i></a>&nbsp;
              <a class="margin-transition btn-floating btn-small waves-effect waves-light red accent-4 animated fadeIn"><i class="small material-icons">location_on</i></a>
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
      <li><a class="grey-text text-lighten-3" href="/profile">Meu Perfil</a></li>
      <li><a class="grey-text text-lighten-3" href="/settings">Configurações</a></li>

    </footer-vue>


        <div class="fixed-action-btn" @mouseover="hover = true" @mouseout="hover = null">
            <a class="btn-floating btn-large waves-effect waves-light red animated pulse"><i class="medium material-icons">notifications_active</i></a>
          <ul>
            <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
            <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
            <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
            <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
          </ul>
        </div>
  </span>
</template>

<script>
import NavBar from '@/components/layouts/NavBar'
import FooterVue from '@/components/layouts/FooterVue'
import GridVue from '@/components/layouts/GridVue'
import CardMenuVue from '@/components/layouts/CardMenuVue'        
  
export default {
  name: 'SiteTemplate',
  data() {
    return {
      user: false
    }
  },
  components:{
    NavBar,
    FooterVue,
    GridVue,
    CardMenuVue
  },
  created() {
    let userSession = sessionStorage.getItem('user')
    
    if(userSession) {
      this.user = JSON.parse(userSession)
    }
  },
  methods: {
    exit() {
      sessionStorage.clear()
      this.user = false
      this.$router.push('/login')
    }
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

.margin-transition{
  position: relative;
  left: 0;
  transition: all 0.3s ease;
}
.margin-transition:hover{
  margin-bottom: 20px;
}

</style>