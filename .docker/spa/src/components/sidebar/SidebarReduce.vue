<template lang="html">

  <div id="parentx">
    <br><br>
    
    <vs-avatar size="70px" @click="active=!active, notExpand = false" :src="user.avatar" :alt="user.name" type="filled" />{{ user.name }}

    <vs-button @click="profileRoute" radius color="primary" type="line" icon="edit"></vs-button>
    
    <br><br><br>

    <vs-sidebar :reduce="reduce" :reduce-not-hover-expand="notExpand" parent="body" default-index="1"  color="success" class="sidebarx" spacer v-model="active">

      <div class="header-sidebar" slot="header">
        <vs-avatar  size="70px" src="https://avatars3.githubusercontent.com/u/28975240?s=460&v=4"/>
      </div>
      <vs-sidebar-group open title="Application">
        <vs-sidebar-item index="1" icon="menu" @click="reduce=!reduce">
         Toggle Sidebaaaar
        </vs-sidebar-item>
   
      <vs-divider icon="event_note" position="left">
        Tarefas
      </vs-divider>
      

        <vs-sidebar-group title="Atividades" icon="event_note">
          <vs-sidebar-item index="2.1" @click="recordsRoute" icon="record_voice_over">
            Gravações De Aúdio
          </vs-sidebar-item>
          <vs-sidebar-item @click="messagesRoute" icon="email">
            Mensagens
          </vs-sidebar-item>
          <vs-sidebar-item index="2.3" @click="imagesRoute" icon="photo">
            Galeria De Imagens
          </vs-sidebar-item>

          <vs-sidebar-item index="2.3" @click="tasksRoute" icon="event_note">
            Tarefas
          </vs-sidebar-item>

          <vs-sidebar-item index="2.3" @click="documentsRoute" icon="library_books">
            Documentos
          </vs-sidebar-item>
        </vs-sidebar-group>

      <vs-divider icon="person" position="left">
        User
      </vs-divider>

        <vs-sidebar-item index="2" @click="friendsRoute" icon="people">
          Amigos
        </vs-sidebar-item>
        <vs-sidebar-item index="3" icon="https">
          Segurança & Privacidade
        </vs-sidebar-item>
        <vs-sidebar-item index="4" icon="help">
          Ajuda
        </vs-sidebar-item>
      </vs-sidebar-group>



      <vs-sidebar-item index="6" @click="logout" icon="exit_to_app">
        Sair
      </vs-sidebar-item>
      
      <div class="footer-sidebar" slot="footer">
        <vs-button icon="settings" color="primary" type="border"></vs-button>
      </div>

    </vs-sidebar>
  </div>

</template>



<style scoped>
.header-sidebar {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  width: 100%;
}
  
h4 {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
}
button{
  margin-left: 10px;

}
.footer-sidebar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}
button {
  border: 0px solid rgba(0,0,0,0) !important;
  border-left: 1px solid rgba(0,0,0,.07) !important;
  border-radius: 0px !important;
}
</style>

<script>
export default {
  name: 'SidebarReduce',
  data:()=>({
    user: false,
    active:false,
    notExpand: false,
    reduce: true
  }),
  created() {
    let userSession = sessionStorage.getItem('user')
    if (userSession) {
      this.user = JSON.parse(userSession)
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
    profileRoute() {
      this.$router.push('/profile')
    },
    logout() {
      sessionStorage.clear()
      this.user = false
      this.$router.push('/login')
    }
  }
}
</script>

