<template>
  <span>
    <header>
      <nav-bar logo="" url="/" cor="white">
        <li v-if="!user"><router-link to="/login">Iniciar sessão</router-link></li>
        <li v-if="!user"><router-link to="/register">Cadastre-se</router-link></li>
        <li v-if="user"><router-link to="/profile">{{user.name}}</router-link></li>
        <li v-if="!user"><a href="http://www.timenow.com.br">Nosso Site</a></li>
        <li v-if="user"><a v-on:click="exit()">Sair</a></li>

        <li><a href="sass.html"><i class="material-icons">search</i></a></li>
        <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
      </nav-bar>
    </header>

    <main>
      <div class="container" style="padding: 10px">

        <div class="row">
          <grid-vue tamanho="12 m2 l6">
              <slot name="menu-left" />
          </grid-vue>

          <grid-vue tamanho="12 m10 l6" class="animated fadeInRight">
            
            <CardMenuVue>
              <slot name="main" />
            </CardMenuVue >
            
          </grid-vue>

        </div>

      </div>
    </main>

    <footer-vue cor="green darken-2" logo="Social" descricao="Teste de descrição" ano="2019">

      <li><a class="green-text text-lighten-3" href="#!">Quem somos</a></li>
      <li><a class="green-text text-lighten-3" href="#!">Nosso Site</a></li>
      <li><a class="green-text text-lighten-3" href="#!">Termos</a></li>

    </footer-vue>
  </span>
</template>

<script>
import NavBar from '@/components/layouts/NavBar'
import FooterVue from '@/components/layouts/FooterVue'
import GridVue from '@/components/layouts/GridVue'
import CardMenuVue from '@/components/layouts/CardMenuVue'

export default {
  name: 'LoginTemplate',
  components:{
    NavBar,
    FooterVue,
    GridVue,
    CardMenuVue
  },
  data() {
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
  methods: {
    exit() {
      sessionStorage.clear()
      this.user = false
    }
  }
}
</script>

<style scoped>

a {
  color: black;
}
</style>
