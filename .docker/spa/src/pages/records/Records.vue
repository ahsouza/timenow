<template>
  <SiteTemplate>
    <span slot="menu-left">

      <div class="row valign-wrapper">
        <grid-vue tamanho="1 l6 m12">
          <img :src="user.avatar" :alt="user.name" width="75" class="circle responsive-img">
        </grid-vue>
        
        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            <h6>{{user.name}}</h6>
            <br>
            Pts: <b>120</b>
          </span> 
        </grid-vue>

      </div>

    </span>

    <span slot="main">

      <div class="row" style="margin-top: 18%">
        
        <div class="col s6 m6 l6">

          <a id="btn-record" class="btn-floating btn-large waves-effect waves-light red"><i id="icon-record" class="material-icons">mic</i></a>

        </div>
        

   <!-- ******************************************************
        ******* LIST VOICES DESKTOP/TABLETS/NOTEBOOKS ********
        ****************************************************** -->

        <div class="col s6 m6 l6 animated fadeInRight list-voices-friends"> 

          <vs-list style="overflow-y: scroll; overflow-x: hidden; height: 340px;">
            <!-- GRAVAÇÕES REALIZADAS -->
            <vs-list-header title="Gravações Enviadas"></vs-list-header>

            <vs-list-item title="Morgan Monderfani" subtitle="04/08/2019 - 14:11">
              <vs-avatar color="primary" icon="keyboard_voice"/>
            </vs-list-item>

            <vs-list-item title="Hudson Ossi" subtitle="12/06/2019 - 08:00">
              <vs-avatar color="primary" icon="keyboard_voice"/>
            </vs-list-item>

            <vs-list-item title="Edson Boltrini" subtitle="20/07/2019 - 10:30">
              <vs-avatar color="primary" icon="keyboard_voice"/>
            </vs-list-item>

            <!-- GRAVAÇÕES RECEBIDAS -->
            <vs-list-header title="Gravações Recebidas" color="primary"></vs-list-header>          

            <vs-list-item title="Morgan Monderfani" subtitle="04/08/2019 - 14:59">    
              <vs-avatar color="danger" icon="keyboard_voice"/>
            </vs-list-item>              

            <vs-list-item title="Hudson Ossi" subtitle="12/06/2019 - 08:15">
              <vs-avatar color="primary" icon="keyboard_voice"/>
            </vs-list-item>

            <vs-list-item title="Edson Boltrini" subtitle="20/07/2019 - 11:07">
              <vs-avatar color="danger" icon="keyboard_voice"/>
            </vs-list-item>

          </vs-list>
        </div>

      </div>
    <!--******************************************************
        ******* LIST VOICES MOBILE ********
        ****************************************************** -->



      <div class="row row-mobile" style="margin-top: 10%">

        <div class="col s6 m6 l6 animated fadeInRight list-voices-friends-mobile"> 

          <vs-list style="overflow-y: scroll; overflow-x: hidden; width: 250px; height: 340px;">
              <!-- GRAVAÇÕES REALIZADAS -->
            <vs-list-header title="Gravações Enviadas"></vs-list-header>

            <vs-list-item title="Roberta Monderfani" subtitle="04/08/2019 - 14:11">
              <vs-avatar color="primary" icon="keyboard_voice"/>
            </vs-list-item>

            <vs-list-item title="Veronika Ossi" subtitle="12/06/2019 - 08:00">
              <vs-avatar color="primary" icon="keyboard_voice"/>
            </vs-list-item>

            <vs-list-item title="Edson Boltrini" subtitle="20/07/2019 - 10:30">
              <vs-avatar color="primary" icon="keyboard_voice"/>
            </vs-list-item>

            <!-- GRAVAÇÕES RECEBIDAS -->
            <vs-list-header title="Gravações Recebidas" color="primary"></vs-list-header>          

            <vs-list-item title="Roberta Monderfani" subtitle="04/08/2019 - 14:59">    
              <vs-avatar color="danger" icon="keyboard_voice"/>
            </vs-list-item>              

            <vs-list-item title="Veronika Ossi" subtitle="12/06/2019 - 08:15">
              <vs-avatar color="primary" icon="keyboard_voice"/>
            </vs-list-item>

            <vs-list-item title="Edson Boltrini" subtitle="20/07/2019 - 11:07">
              <vs-avatar color="danger" icon="keyboard_voice"/>
            </vs-list-item>

          </vs-list>
        </div>

      </div>

    </span>

  </SiteTemplate>
  
</template>


<script>
import SiteTemplate from '@/templates/SiteTemplate'
import CardContentVue from '@/components/patterns/CardContentVue'
import CardDetailVue from '@/components/patterns/CardDetailVue'
import PublicContentVue from '@/components/patterns/PublicContentVue'
import GridVue from '@/components/layouts/GridVue'

export default {
  head: {
    script: [
      { src: 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js' },
    ]
  },
  name: 'Records',
  data() {
    return {
      user: false,
      record: true,
      recordReceived: true
    }
  },
  components:{
    CardContentVue,
    SiteTemplate,
    CardDetailVue,
    PublicContentVue,
    GridVue
  },
  created() {
    let userSession = sessionStorage.getItem('user')
    if (userSession) {
      this.user = JSON.parse(userSession)
    }
  },
  beforeCreate() {
    console.log("Before Create!")
  },
  methods: {

  },
  mounted() {
    $(function() {
        let mediaRecorder
        let chunks = []

          navigator
            .mediaDevices
              .getUserMedia({ audio: true, video: false })

              .then( stream => {
                mediaRecorder = new MediaRecorder(stream)

                mediaRecorder.ondataavailable = data => {
                  chunks.push(data.data)
                }

                mediaRecorder.onstop = () => {
                  const blob = new Blob(chunks, { type: 'audio/ogg; code=opus'})

                  const reader = new window.FileReader()
                  reader.readAsDataURL(blob)
                  reader.onloadend = () => {
                    const audio = document.createElement('audio')
                    audio.src = reader.result
                    audio.controls = true
                    $('body').append(audio)
                  }
                } 


              }, err => {
                alert('Você precisa permitir o microfone para gravações de voz')
              })
              $('#btn-record').click(function() {

                if ($('#icon-record').text() === "mic") {
                  
                  mediaRecorder.start()
                  $('#btn-record').addClass('animated pulse')
                  $('#btn-record').removeClass('red').addClass('blue')
                  $('#icon-record').text('mic_off')
                } else {

                  mediaRecorder.stop()
                  $('#btn-record').removeClass('animated pulse')
                  $('#btn-record').removeClass('blue').addClass('red')
                  $('#icon-record').text('mic')
                }

              })
        })
  }
  
}
</script>
<style scoped>

.about-avatar {
  margin-left: 15px;
}

@media only screen and (max-width: 600px) {
  .list-voices-friends {
    display: none;
  }

}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    .list-voices-friends-mobile {
    display: none;
  }
  .row-mobile {
    display: none;
  }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  .list-voices-friends-mobile {
    display: none;
  }
  .row-mobile {
    display: none;
  }

} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
  .list-voices-friends-mobile {
    display: none;
  }
  .row-mobile {
    display: none;
  }
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  .list-voices-friends-mobile {
    display: none;
  }
  .row-mobile {
    display: none;
  }
}

</style>
