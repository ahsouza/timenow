<template>
  <span>
    <header>
      <nav-bar logo="Social" url="#/" cor="green darken-3">
        <li><router-link to="/login">Iniciar sessão</router-link></li>
        <li><a href="http://www.timenow.com.br">Nosso Site</a></li>
        <li><a href="sass.html"><i class="material-icons">search</i></a></li>
        <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
      </nav-bar>
    </header>

    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="6">
              <slot name="menu-left" />
          </grid-vue>

          <grid-vue tamanho="6">
            <CardMenuVue>
              <slot name="main" />
            </CardMenuVue >
          </grid-vue>

        </div>
      </div>
    </main>

    <footer-vue cor="green darken-2" logo="Social" descricao="Teste de descrição" ano="2019">

      <li><a class="green-text text-lighten-3" href="#!">Home</a></li>
      <li><a class="green-text text-lighten-3" href="#!">Contato</a></li>
      <li><a class="green-text text-lighten-3" href="#!">Clientes</a></li>

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
  }
}
</script>

<style>

</style>
