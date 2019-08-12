<template>
  <span>
    <header>
      <nav-bar v-if="user" logo="" url="/dash" cor="white">

        <li v-if="!user"><router-link to="/login">Iniciar sessão</router-link></li>
        <li v-if="!user"><router-link to="/register">Cadastre-se</router-link></li>
        <li v-if="user"><router-link to="/profile">Perfil</router-link></li>
        <li v-if="user"><a v-on:click="exit()">Sair</a></li>
      </nav-bar>
    </header>

    <main>
      <div class="container" style="margin-top: 6%">

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

    <footer-vue cor="green darken-1" logo="Time-Now Engenharia" :descricao="description" ano="2019" style="margin-top: 21%">

      <li><a class="grey-text text-lighten-3" href="#!">Segurança & Privacidade</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Preferências</a></li>
      <li><a class="grey-text text-lighten-3" href="/profile">Meu Perfil</a></li>
      <li><a class="grey-text text-lighten-3" href="/settings">Configurações</a></li>

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
      user: false,
      description: 'Especialista em gerenciamento de empreendimentos e obras industriais. Gestão de portfólio de projetos, gerenciamento de implantação de projetos e gestão '
    }
  },
  created() {
    let userSession = sessionStorage.getItem('user')
    
    if(userSession) {
      this.user = JSON.parse(userSession)
      this.$router.push('/')
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
</style>
