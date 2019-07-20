<template>
  <LoginTemplate>
    
    <span slot="menu-left">
      <img src="https://pbs.twimg.com/profile_images/1554788274/logo_TNE.jpg" class="animated pulse responsive-img" alt="@ahsouza">
    </span>

    <span slot="main">
        <h4>Criar conta</h4><br><br>
        
        <label>Nome</label>
        <input type="text" placeholder="Digite seu nome" v-model="name">
        <br>
        <label>Usuário</label>
        <input type="text" placeholder="Digite seu e-mail" v-model="email" required>
        <br>
        <label>Senha</label>
        <input type="password" placeholder="Digite sua senha" v-model="password" required>
        <br>
        <label>Confirme senha</label>
        <input type="password" placeholder="Confirme sua senha" v-model="password_confirmation">

        <br><br>

        <router-link class="btn deep-purple" to="/login">JÁ TENHO UMA CONTA</router-link>&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn light-green" v-on:click="register()">SALVAR</button>

    </span>

  </LoginTemplate>
</template>

<script>
import LoginTemplate from '@/templates/LoginTemplate'
import axios from 'axios'

export default {
  name: 'Register',
  data () {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation:''

    }
  },
  components:{
    LoginTemplate
  },
  methods: {
    register() {
      axios.post(`http://127.0.0.1:8000/api/register`, {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation 
      })
      .then(res => {
        if (res.data.token) {
          alert('Registrado com sucesso!')
          sessionStorage.setItem('user', JSON.stringfy(res.data))
          this.$router.push('/')

        } else if (res.data.status == false) {
          console.log('Login não existe')
          alert('Erro ao tentar cadastrar usuário. Tente novamente mais tarde')
        } else {
          console.log('erros de validação')
          let erros = '';
          for(let erro of Object.values(res.data)) {
            erros += erro + " ";
          }
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
