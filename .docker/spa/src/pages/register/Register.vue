<template>
  <LoginTemplate>
    
    <span slot="menu-left">
      <img src="https://pbs.twimg.com/profile_images/1554788274/logo_TNE.jpg" class="animated pulse responsive-img" alt="@ahsouza">
    </span>

    <span slot="main">
        <h4>Criar conta</h4><br><br>
        
        <label>Usuário</label>
        <input type="text" required>
        <br>
        <label>Senha</label>
        <input type="password" required>

        <label>Confirme senha</label>
        <input type="password">

        <br><br><br>

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
label {
  color: black;
}

.responsive-img {
  margin-top: 40px;
  width: 300px;
}
.btn {
  margin-top: 16px;
}
</style>
