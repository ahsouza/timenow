<template>
  <span>
    <header>
      <nav-bar logo="" url="/dash" cor="white">
        <li v-if="user"><router-link to="/dash">Home</router-link></li>

        <li v-if="!user"><router-link to="/login">Iniciar sessão</router-link></li>
        <li v-if="!user"><router-link to="/register">Cadastre-se</router-link></li>
        <li v-if="user"><router-link to="/messages">Mensagens</router-link></li>
        <li v-if="user"><router-link to="/tasks">Tarefas</router-link></li>
        <li v-if="user"><router-link to="/groups">Grupos</router-link></li>
        <li v-if="!user"><a href="http://www.timenow.com.br">Nosso Site</a></li>
        
        <li v-if="user"><a href="sass.html"><i class="material-icons">search</i></a></li>
        <li v-if="user"><a v-on:click="exit()"><i class="material-icons">exit_to_app</i></a></li>
      </nav-bar>
    </header>

    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="12 l4 m4">
            <Sidebar></Sidebar><br>

              <vs-button @click="messagesRoute" radius color="primary" type="gradient" icon="question_answer" class="btn-tasks"></vs-button>
              <vs-button @click="recordsRoute" radius color="primary" type="gradient" icon="record_voice_over" class="btn-tasks"></vs-button>
              <vs-button :badge="badge1" @click="friendsRoute" radius color="primary" type="gradient" icon="people" class="btn-tasks"></vs-button>
            
              <br><br>

              <vs-button @click="imagesRoute" radius color="success" type="gradient" icon="photo" class="btn-tasks"></vs-button>
              <vs-button @click="documentsRoute" radius color="success" type="gradient" icon="library_books" class="btn-tasks"></vs-button>
              <vs-button @click="tasksRoute" radius color="success" type="gradient" icon="event_note" class="btn-tasks"></vs-button>

          </grid-vue>
          <div id="openModal" class="modalbg">
            <div class="dialog">
              <a href="#close" title="Close" class="close">X</a>
              <h5>Notificações</h5><br><br>   

              <vs-avatar size="50px" @click="friendsRoute" color="primary" :badge="badgeSolicitations" icon="group_add"/>
              <vs-avatar size="50px" @click="messagesRoute" color="danger" :badge="badgeMessages" icon="email"/>
              <vs-avatar size="50px" @click="recordsRoute" color="dark" :badge="badgeRecords" icon="record_voice_over"/>
              <vs-avatar size="50px" @click="tasksRoute" color="warning" :badge="badgeNotes" icon="event_note"/>
              <vs-avatar size="50px" @click="publicationsRoute" color="success" :badge="badgePublish" icon="public"/>
              
            </div>
          </div>

        <grid-vue tamanho="12 l8 m8">
          <slot name="main" />
        </grid-vue>

        </div>
      </div>
    </main>

      <div class="fixed-action-btn" @mouseover="hover = true" @mouseout="hover = null">
        <a href="#openModal" class="btn-floating btn-large waves-effect waves-light red animated pulse"><i class="medium material-icons">notifications_active</i></a>
        <ul>
          <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
          <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
          <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
          <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
        </ul>
      </div>
  </span>
</template>

<script>
import NavBar from '@/components/layouts/NavBar'
import FooterVue from '@/components/layouts/FooterVue'
import GridVue from '@/components/layouts/GridVue'
import CardMenuVue from '@/components/layouts/CardMenuVue'
import Sidebar from '@/components/sidebar/SidebarReduce'
  
export default {
  name: 'SiteTemplate',
  data() {
    return {
      badgeSolicitations: 6,
      badgeMessages: 26,
      badgeRecords: 2,
      badgePublish: 12,
      badgeNotes: 4,
      user: false,
 
    }
  },
  components:{
    NavBar,
    FooterVue,
    GridVue,
    CardMenuVue,
    Sidebar
  },
  created() {
    let userSession = sessionStorage.getItem('user')
    if(userSession) {
      this.user = JSON.parse(userSession)
    } else {
      this.$router.push('/login')
    }
  },
  methods: {
    exit() {
      sessionStorage.clear()
      this.user = false
      this.$router.push('/login')
    },
    messagesRoute() {
      this.$router.push('/messages')
    },
    recordsRoute() {
      this.$router.push('/records')
    },
    friendsRoute() {
      this.$router.push('/friends')
    },
    documentsRoute() {
      this.$router.push('/documents')
    },
    imagesRoute() {
      this.$router.push('/images')
    },
    tasksRoute() {
      this.$router.push('/tasks')
    },
    publicationsRoute() {
      this.$router.push('/dash')
    },
  }
}
</script>

<style scoped>
.btn-tasks {
  margin-right: 8px
}

a {
  color: black;
}

/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
  #favorites { display: none;}
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
  
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  
}

.margin-transition{
  position: relative;
  left: 0;
  transition: all 0.1s ease;
}
.margin-transition:hover{
  margin-bottom: 20px;
}

</style>



<style scoped>
@font-face {
  font-family: 'Yanone Kaffeesatz';
  font-style: normal;
  font-weight: 400;
  src: local('Yanone Kaffeesatz Regular'), local('YanoneKaffeesatz-Regular'), url(https://fonts.gstatic.com/s/yanonekaffeesatz/v11/3y976aknfjLm_3lMKjiMgmUUYBs04Y8bH-8.ttf) format('truetype');
}
body {
  width: 100%;
  background: url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/grid.png) repeat #fefefe;
}
.button {
  margin: 40px auto;
  font-size: 72px;
  font-family: 'Yanone Kaffeesatz', Arial, sans-serif;
  text-decoration: none;
  text-shadow: 1px 1px 0px #fff;
  font-weight: 400;
  color: #666;
  border: 1px solid #ccc;
  cursor: pointer;
  padding: 20px 70px 30px;
  position: relative;
  top: 50px;
  background: #eee;
  width: 300px;
  display: block;
  text-align: center;
  box-shadow: 1px 1px 1px #fff;
  -moz-box-shadow: 1px 1px 1px #fff;
  -webkit-box-shadow: 1px 1px 1px #fff;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-transition: all 0.1s ease-out;
  -webkit-transition: all 0.1s ease-out;
  -o-transition: all 0.1s ease-out;
  transition: all 0.1s ease-out;
}
.button:hover {
  color: #333;
  background: #eeffff;
  -moz-transition: all 0.1s ease-out;
  -webkit-transition: all 0.1s ease-out;
  -o-transition: all 0.1s ease-out;
  transition: all 0.1s ease-out;
}
.modalbg {
  position: fixed;
  font-family: Arial, Helvetica, sans-serif;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(0, 0, 0, 0);
  z-index: 99999;
  -moz-transition: all 0.1s ease-out;
  -webkit-transition: all 0.1s ease-out;
  -o-transition: all 0.1s ease-out;
  transition: all 0.1s ease-out;
  -webkit-transition-delay: 0.1s;
  -moz-transition-delay: 0.1s;
  -o-transition-delay: 0.1s;
  -transition-delay: 0.1s;
  display: block;
  pointer-events: none;
}
.modalbg .dialog {
  width: 380px;
  height: 250px;
  position: relative;
  top: -1000px;
  margin: 10% auto;
  padding: 5px 20px 13px 20px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  background: #fff;
  background: -moz-linear-gradient(#fff, #ccc);
  background: -webkit-linear-gradient(#fff, #ccc);
  background: -o-linear-gradient(#fff, #ccc);
  box-shadow: 0 0 10px #000;
  -moz-box-shadow: 0 0 10px #000;
  -webkit-box-shadow: 0 0 10px #000;
}
.modalbg .dialog .ie7 {
  filter: progid:DXImageTransform.Microsoft.Shadow(color='#000', Direction=135, Strength=3);
}
.modalbg:target {
  display: block;
  pointer-events: auto;
  background: rgba(4, 10, 30, 0.8);
  -moz-transition: all 0.1s ease-out;
  -webkit-transition: all 0.1s ease-out;
  -o-transition: all 0.1s ease-out;
  transition: all 0.1s ease-out;
}
.modalbg:target .dialog {
  top: -20px;
  -moz-transition: all 0.1s ease-out;
  -webkit-transition: all 0.1s ease-out;
  -o-transition: all 0.1s ease-out;
  transition: all 0.1s ease-out;
  -webkit-transition-delay: 0.1s;
  -moz-transition-delay: 0.1s;
  -o-transition-delay: 0.1s;
  -transition-delay: 0.1s;
}
.close {
  background: #606061;
  color: #FFFFFF;
  line-height: 25px;
  position: absolute;
  right: -12px;
  text-align: center;
  top: -10px;
  width: 24px;
  text-decoration: none;
  font-weight: bold;
  -webkit-border-radius: 12px;
  -moz-border-radius: 12px;
  border-radius: 12px;
  box-shadow: 0 0 10px #000;
  -moz-box-shadow: 0 0 10px #000;
  -webkit-box-shadow: 0 0 10px #000;
  -moz-transition: all 0.1s ease-out;
  -webkit-transition: all 0.1s ease-out;
  -o-transition: all 0.1s ease-out;
  transition: all 0.1s ease-out;
  -webkit-transition-delay: 0.1s;
  -moz-transition-delay: 0.1s;
  -o-transition-delay: 0.1s;
  -transition-delay: 0.1s;
}
.close .ie7 {
  filter: progid:DXImageTransform.Microsoft.Shadow(color='#000', Direction=135, Strength=3);
}
.close:hover {
  background: #00d9ff;
  -moz-transition: all 0.1s ease-out;
  -webkit-transition: all 0.1s ease-out;
  -o-transition: all 0.1s ease-out;
  transition: all 0.1s ease-out;
}
.fineprint {
  font-style: italic;
  font-size: 10px;
  color: #646;
}
a {
  color: #333;
  text-decoration: none;
}

</style>