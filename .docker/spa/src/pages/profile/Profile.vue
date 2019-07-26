<template>
  <SiteTemplate>
    
    <span slot="menu-left">
      <img src="https://pbs.twimg.com/profile_images/1554788274/logo_TNE.jpg" class="animated pulse responsive-img" alt="@ahsouza">
    </span>

    <span slot="main">
        <h4>Profile</h4><br><br>

          <div class="file-field input-field">
            <a class="btn-small waves-effect waves-light orange"><i class="material-icons">photo</i><input type="file"></a>
            
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        
        <label>Nome</label>
        <input type="text" placeholder="Digite seu nome" v-model="name">
        <br>
        <label>Usuário</label>
        <input type="text" placeholder="Digite seu e-mail" v-model="email" required>
        <br>
        <label>Senha Antiga</label>
        <input type="text" placeholder="Digite sua senha" v-model="password" required>
        <br>
        <label>Nova Senha</label>
        <input type="password" placeholder="Confirme sua senha" v-model="password_confirmation">

        <br><br>
        <button class="btn light-blue" v-on:click="profile()">ATUALIZAR</button>
        <br><br>
    </span>

  </SiteTemplate>
</template>

<script>
import SiteTemplate from '@/templates/SiteTemplate'
import axios from 'axios'

export default {
  name: 'Profile',
  data () {
    return {
      user: false,
      name: '',
      email: '',
      password: '',
      password_confirmation:''

    }
  },
  created() {
    let userSession = sessionStorage.getItem('user')
    
    if(userSession) {
      this.user = JSON.parse(userSession)
      this.name = this.user.name
      this.email = this.user.email
      this.password = this.user.name
      
    }
  },
  components:{
    SiteTemplate
  },
  methods: {
    profile() {
      axios.put(`http://127.0.0.1:8000/api/profile`, {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation 
      },{"headers":{"authorization":"Bearer " + this.user.token}})
      .then(res => {

        if (res.data.token) {
          // Authentication Success!
          console.log(res.data.token)
          sessionStorage.setItem('user', JSON.stringify(res.data));
          alert('Perfil atualizado com sucesso!')

        } else {
          console.log('erros de validação')
          let erros = '';
          for(let erro of Object.values(res.data)) {
            erros += erro + " ";
          }
          alert(erros)
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
