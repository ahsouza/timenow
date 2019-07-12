<template>
  <span>
    <header>
      <nav-bar logo="@/assets/timenow.png" url="#/" cor="white" >
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/login">Mensagens</router-link></li>
        <li><router-link to="/contato">Agenda</router-link></li>
        <li><router-link to="/portfolio">Notificações</router-link></li>
        <li><a href="sass.html"><i class="material-icons">search</i></a></li>
        <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
      </nav-bar>
    </header>

    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="12 l4 m4">
            <card-menu-vue>
              <div class="row valign-wrapper">
                <slot name="menu-left" />
              </div>
            </card-menu-vue>

            <card-menu-vue>
              <h3>Notifications</h3>
            </card-menu-vue>

            <card-menu-vue>
              <h3>Tasks</h3>
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
</style>
