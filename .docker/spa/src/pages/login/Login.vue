<template>
  <LoginTemplate>
    <span slot="menu-left">
      <img src="https://pbs.twimg.com/profile_images/1554788274/logo_TNE.jpg" class="animated pulse responsive-img" alt="TimeNow">
    </span>

    <span slot="main">
      <h5>Login </h5><br><br>
      <label>Usuário</label>
      <input type="text" placeholder="E-mail" v-model="email">

      <label>Senha</label>
      <input type="password" placeholder="Senha" v-model="password"><br><br><br><br>

      <vs-button color="primary" type="filled" to="/register">CADASTRE-SE</vs-button>&nbsp;&nbsp;&nbsp;
      <vs-button color="success" type="filled" v-on:click="login()">ENTRAR</vs-button>
    </span>

  </LoginTemplate>
</template>

<script>
import LoginTemplate from '@/templates/LoginTemplate'
import Button from '@/components/button/Button'

export default {
  name: 'Login',
  data () {
    return {
      email: '',
      password: ''
      
    }
  },
  components:{
    LoginTemplate,
    Button
  },
  methods: {
    login() {
      this.$http.post(this.$url + `login`, {
        email: this.email,
        password: this.password
      })
      .then(res => {
        if(res.data.status) {

          console.log('Autenticado com sucesso!')
          sessionStorage.setItem('user', JSON.stringify(res.data.user))
          this.$router.push('/dash')

        } else if(res.data.status == false && res.data.validacao){
          
          console.log('Usuário não encontrado!')
          alert('Usuário inválido')
        } else {
          
          console.log('Error de validação!')
          let errors = '';
          for(let error of Object,values(res.data.errors)) {
            errors += error + ""
          }
          alert(errors)
        }
      })
      .catch(e => { 
        console.log(e)
        alert('Tente novamente mais tarde!')
      })
    }
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
