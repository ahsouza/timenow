<template>
  <SiteTemplate>
    
    <span slot="menu-left">
      <img :src="user.avatar" class="animated pulse responsive-img" alt="@ahsouza">
    </span>

    <span slot="main">
      <h4>Editar Perfil</h4>
      <br><br>

      <div>
        <vs-tabs :color="colorx">

          <!-- ALTERAR DADOS PESSOAIS -->
          <vs-tab label="Dados Pessoais" icon="account_circle" @click="colorx = '#0000FF'">
            <br><br>
            <label>Seu Nome</label>
            <input type="text" placeholder="Digite seu nome" v-model="name">
            <br><br>
            <label>Seu E-mail</label>
            <input type="text" placeholder="Digite seu e-mail" v-model="email" required>
            <br><br><br>
            <label>Senha Antiga</label>
            <input type="password" placeholder="Digite sua senha" v-model="password" required>
            <br><br>
            <label>Nova Senha</label>
            <input type="password" placeholder="Confirme sua senha" v-model="password_confirmation">

          </vs-tab>
          
          <!-- ALTERAR IMAGEM AVATAR -->
          <vs-tab label="Alterar Imagem" icon="photo" @click="colorx = '#8B0000'">
            <br><br><br><br>
            <div class="file-field input-field">      
              <a class="btn-small waves-effect waves-light orange">
                <i class="material-icons">photo</i>
                <input type="file" v-on:change="saveAvatar">
              </a>
                  
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
          </vs-tab>

        </vs-tabs>
      </div>




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
      colorx: '#8B0000',
      user: false,
      name: '',
      email: '',
      password: '',
      password_confirmation:'',
      avatar: ''

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
    saveAvatar(e){
      let file = e.target.files || e.dataTransfer.files
      
      if(!file.length) {
        return;
      }

      let reader = new FileReader()

      reader.onload = (e) => {
        this.avatar = e.target.result
      }
      reader.readAsDataURL(file[0])
    },

    profile() {
      axios.put(`http://127.0.0.1:8000/api/profile`, {
        name: this.name,
        email: this.email,
        avatar: this.avatar,
        password: this.password,
        password_confirmation: this.password_confirmation 
      },{"headers":{"authorization":"Bearer " + this.user.token}})
      .then(res => {

        if (res.data.token) {
          // Authentication Success!
          console.log(res.data.token)

          this.user = res.data
          sessionStorage.setItem('user', JSON.stringify(res.data))
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
