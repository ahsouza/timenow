<template>
  <SiteTemplate>
    
    <span slot="menu-left">
      <img :src="user.avatar" class="animated pulse responsive-img" :alt="user.name">
    </span>

    <span slot="main">
      <h4>Editar Perfil</h4>
      <small>{{user.name}}</small>
      <br><br>

      <div style="padding-bottom: 35%">
        <vs-tabs :color="colorx" class="animated fadeIn">

          <!-- ALTERAR DADOS PESSOAIS -->
          <vs-tab label="Dados Pessoais" icon="account_circle" @click="colorx = '#0000FF'">
            <br><br>

            <label>Seu Nome</label>
            <input type="text" placeholder="Digite seu nome" v-model="name">
            <br><br>
            <label>Seu E-mail</label>
            <input type="text" placeholder="Digite seu e-mail" v-model="email">
            <br><br><br>
            <label>Senha Antiga</label>
            <input type="password" placeholder="Digite sua senha" v-model="password">
            <br><br>
            <label>Nova Senha</label>
            <input type="password" placeholder="Confirme sua senha" v-model="password_confirmation">
            <br><br>
            
          </vs-tab>
          
          <!-- ALTERAR IMAGEM AVATAR -->
          <vs-tab label="Alterar Avatar" icon="photo" @click="colorx = '#8B0000'">
            <br><br><br>
            <div class="file-field input-field">      
              <a class="btn-small waves-effect waves-light purple">
                <i class="material-icons">photo_camera</i>
                <input type="file" v-on:change="saveAvatar">
              </a>
                  
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
            <br><br><br><br><br>
          </vs-tab>

        </vs-tabs>
        <vs-button color="primary" style="margin-left: 50%" type="gradient" icon="refresh" v-on:click="profile()">Atualizar</vs-button>
      </div>

    </span>

  </SiteTemplate>
</template>

<script>
import SiteTemplate from '@/templates/SiteTemplate'

export default {
  name: 'Profile',
  data () {
    return {
      user: false,
      colorx: '#8B0000',
      name: '',
      email: '',
      password: '',
      password_confirmation:'',
      avatar: ''
    }
  },
  created() {
    let userSession = this.$store.getters.getUser
    
    if(userSession) {
      this.user = this.$store.getters.getUser
      this.name = this.user.name
      this.email = this.user.email
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

      reader.onloadend = (e) => {
        this.avatar = e.target.result
      }
      reader.readAsDataURL(file[0])
    },
    profile() {
      this.$http.post(this.$url + `profile`, {
        name: this.name,
        email: this.email,
        avatar: this.avatar,
        password: this.password,
        password_confirmation: this.password_confirmation

      },{"headers": {"authorization":"Bearer " + this.$store.getters.getToken}})
      .then(res => {

        if (res.data.status) {

          this.user = res.data.user
          this.$store.commit('setUser', res.data.user)
          sessionStorage.setItem('user', JSON.stringify(this.user))
          alert('Perfil atualizado com sucesso!')
          this.$router.push('/dash')

        } else if (res.data.status == false && res.data.validacao) {
          
          let erros = '';
          for(let erro of Object.values(res.data.erros)) {
            erros += erro + " ";
          }
          alert(erros)
        }
       
      })
      .catch(e => {
        console.log(e)
        alert('Não foi possível atualizar perfil!')
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
