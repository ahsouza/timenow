import Vue from 'vue'
import Vuesax from 'vuesax'
import Vuetify from 'vuetify'
import App from './App'
import router from './router'
// import 'vuetify/dist/vuetify.min.css'
import 'vuesax/dist/vuesax.css' //Vuesax styles
import 'material-icons/iconfont/material-icons.css';

Vue.use(Vuetify)
Vue.use(Vuesax)

Vue.config.productionTip = false


new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
