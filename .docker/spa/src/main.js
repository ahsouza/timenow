import Vue from 'vue'
import Vuesax from 'vuesax'
import Vuetify from 'vuetify'
import App from './App'
import router from './router'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
// import 'vuetify/dist/vuetify.min.css'
import 'vuesax/dist/vuesax.css' //Vuesax styles
import 'material-icons/iconfont/material-icons.css';

library.add(faUserSecret)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.use(Vuetify)
Vue.use(Vuesax)

Vue.config.productionTip = false

new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
