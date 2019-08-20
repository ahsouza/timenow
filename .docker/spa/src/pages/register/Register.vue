<template>
  <LoginTemplate>
    
    <span slot="menu-left">
      <img src="https://pbs.twimg.com/profile_images/1554788274/logo_TNE.jpg" class="animated pulse responsive-img" alt="timenow">
    </span>

    <span slot="main">
        <h4>Novo Usuário</h4><br><br>
        
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

        <vs-button color="primary" type="filled" to="/login">JÁ TENHO UMA CONTA</vs-button>&nbsp;
        &nbsp;&nbsp;
        <vs-button v-on:click="register()" @click="$vs.notify({
          title:'Salvando Usuário...',
          text:'Cadastro efetuado com sucesso!',
          color:'success',
          icon:'done',
          position:'top-center'
        })" color="success" type="filled">SALVAR</vs-button>

    </span>

  </LoginTemplate>
</template>

<script>
import LoginTemplate from '@/templates/LoginTemplate'

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
      this.$http.post(this.$url + `register`, {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation 
      })
      .then(res => {
        if (res.data.status) {

          console.log('Registrado com sucesso!')
          this.$store.commit('setUser', res.data.user)
          sessionStorage.setItem('user',JSON.stringify(res.data.user))
          
          setInterval(() => {
            this.$router.push('/dash')
          }, 1000)

        } else if (res.data.status == false && res.data.validacao) {
          
          console.log('Error de validação')
          let erros = '';
          for(let erro of Object.values(res.data.erros)) {
            erros += erro + " ";
          }

        } else {

          alert('Erro ao tentar cadastrar usuário. Tente novamente mais tarde')
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
