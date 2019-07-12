<template>

  <LoginTemplate>

    <span slot="menu-left">
      <img src="https://pbs.twimg.com/profile_images/1554788274/logo_TNE.jpg" class="animated pulse responsive-img" alt="TimeNow">
    </span>

    <span slot="main">
        <h5>Login </h5><br><br> 
        <input type="text" placeholder="E-mail" value="">
        <input type="password" placeholder="Senha" value=""><br><br><br>
        <router-link class="btn pink" to="/register">CADASTRE-SE</router-link>&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn light-blue">ENTRAR</button>
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
.responsive-img {
  margin-top: 40px;
  width: 300px;
}
.btn {
  margin-top: 16px;
}


</style>
