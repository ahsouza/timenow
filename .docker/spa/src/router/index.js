import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/pages/home/Home'
import Login from '@/pages/login/Login'
import Register from '@/pages/register/Register'
import Messages from '@/pages/messages/Messages'
import Groups from '@/pages/groups/Groups'
import Tasks from '@/pages/tasks/Tasks'
import Settings from '@/pages/settings/Settings'
import Profile from '@/pages/profile/Profile'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/messages',
      name: 'Messages',
      component: Messages
    },
    {
      path: '/groups',
      name: 'Groups',
      component: Groups
    },
    {
      path: '/tasks',
      name: 'Tasks',
      component: Tasks
    },
    {
      path: '/settings',
      name: 'Settings',
      component: Settings
    },
    {
      path: '/profile',
      name: 'Profile',
      component: Profile
    }
  ]
})
