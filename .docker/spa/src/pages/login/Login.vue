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
        <input type="password" placeholder="Senha" v-model="password"><br><br><br>
        
        <router-link class="btn pink" to="/register">CADASTRE-SE</router-link>&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn light-blue" v-on:click="login">ENTRAR</button>
    </span>

  </LoginTemplate>
</template>

<script>
import LoginTemplate from '@/templates/LoginTemplate'
import axios from 'axios';


export default {
  name: 'Home',
  data () {
    return {
      user: {
        email: '',
        password
      }
    }
  },
  components:{
    LoginTemplate
  },
  methods: {
    login() {
      
      axios.post(`http://localhost:8000/api/login`, {
        email: this.email,
        password: this.password
      }).then(res => {
        if(res.data.token) {
          console.log('Autenticado with sucess!')

          // localStorage.setItem('user', JSON.stringify(res.data))
          sessionStorage.setItem('user', JSON.stringify(res.data))
        } else if(res.data.status == false){
          
          console.log('User not found!')
          alert('Login invalid')
        } else {
          
          console.log('Error validation!')
          let errors = '';
          for(let error of Object,values(res.data)) {
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
