import Vue from 'vue'
import Vuesax from 'vuesax'
import Vuetify from 'vuetify'
import axios from 'axios'
import App from './App'
import router from './router'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import 'vuesax/dist/vuesax.css' //Vuesax styles
import 'material-icons/iconfont/material-icons.css'

library.add(faUserSecret)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.use(Vuetify)
Vue.use(Vuesax, {
  theme:{
    colors:{
      purple:'#9C27B0',
      pink:'#AD1457',
      yellown:'#FFEA00',
      brown:'#5D4037',
      lime:'#76FF03',
      gray:'#9E9E9E',
      cyan:'#80DEEA',
      dark_blue:'#0D47A1',
      dark_green:'#2E7D32',
      dark_gray:'#424242',
      dark_orange:'#E65100',
      dark_yellown:'#FFEA00',
      // dark_pink:'#AD1457',
      dark_purple:'#4A148C',
      dark_red:'#AD1457',
      light_blue:'#81D4FA',
      light_cyan:'#18FFFF',
      light_green:'#00E676',
      light_gray:'#E0E0E0',
      light_orange:'#FFAB40',
      light_yellown:'#FFFF8D',
      // light_pink:'#FF80AB',
      light_purple:'#AA00FF',
      light_red:'#E91E63'
    }
  }
})

Vue.config.productionTip = false
Vue.prototype.$http = axios

new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
