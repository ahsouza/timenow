<template>

  <LoginTemplate>
    
    <span slot="menu-left">
      <img src="https://pbs.twimg.com/profile_images/1554788274/logo_TNE.jpg" class="responsive-img" alt="@ahsouza">
    </span>

    <span slot="main">
        <h4>Criar conta</h4><br><br>
        <input type="text" placeholder="Nome" value="">
        <input type="text" placeholder="E-mail" value="">
        <input type="password" placeholder="Senha" value="">
        <input type="password" placeholder="Confirme sua senha" value=""><br><br><br>
        <router-link class="btn deep-purple" to="/login">JÁ TENHO UMA CONTA</router-link>&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn light-blue">ENVIAR</button>

    </span>

  </LoginTemplate>
</template>

<script>
import LoginTemplate from '@/templates/LoginTemplate'

export default {
  name: 'Register',
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
