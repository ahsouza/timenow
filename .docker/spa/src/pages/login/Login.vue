<template>

  <LoginTemplate>
    <span slot="menu-left">
      <img src="https://pbs.twimg.com/profile_images/1554788274/logo_TNE.jpg" class="responsive-img" alt="TimeNow">
    </span>

    <span slot="main">
        <h3>Login </h3><br><br> 
        <input type="text" placeholder="E-mail" value="">
        <input type="password" placeholder="Senha" value=""><br><br><br>
        <button class="btn">ENTRAR</button>&nbsp;&nbsp;&nbsp;&nbsp;
        <router-link class="btn orange" to="/register">CADASTRE-SE</router-link>
    </span>

  </LoginTemplate>
</template>

<script>
import LoginTemplate from '@/templates/LoginTemplate'

export default {
  name: 'Home',
  data () {
    return {
    }
  },
  components:{
    LoginTemplate
  }
}
</script>

<style scoped>

</style>
