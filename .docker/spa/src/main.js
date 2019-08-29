import Vue from 'vue'
import Vuex from 'vuex'
import Vuesax from 'vuesax'
import axios from 'axios'
import App from './App'
import router from './router'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import 'vuesax/dist/vuesax.css'
import 'material-icons/iconfont/material-icons.css'

library.add(faUserSecret)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.use(Vuex)
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
      dark_purple:'#4A148C',
      dark_red:'#AD1457',
      light_blue:'#81D4FA',
      light_cyan:'#18FFFF',
      light_green:'#00E676',
      light_gray:'#E0E0E0',
      light_orange:'#FFAB40',
      light_yellown:'#FFFF8D',
      light_purple:'#AA00FF',
      light_red:'#E91E63'
    }
  }
})

Vue.config.productionTip = false
Vue.prototype.$http = axios
Vue.prototype.$url = 'http://127.0.0.1:8000/api/'

const store = {
  state: {
    user: sessionStorage.getItem('user') ? JSON.parse(sessionStorage.getItem('user')) : null,
    contentsTimeLine: []
  },
  getters: {
    getUser: state => {
      return state.user
    },
    getToken: state => {
      return state.user.token

    },
    getContentsTimeLine: state=> {
      return state.contentsTimeLine
    }
  },
  mutations: {
    setUser(state, x) {
      state.user = x
    },
    setContentsTimeLine(state, x) {
      state.contentsTimeLine = x
    },
    setPaginationContentsTimeLine(state, array) {
      state.contentsTimeLine = x

      for(let item of array) {
        state.contentsTimeLine.push(item)
      }
    }
  }
}

new Vue({
  el: '#app',
  store: new Vuex.Store(store),
  router,
  components: { App },
  template: '<App/>'
})
