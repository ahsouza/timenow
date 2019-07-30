import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/pages/index/Index'
import Home from '@/pages/home/Home'
import Login from '@/pages/login/Login'
import Register from '@/pages/register/Register'
import Messages from '@/pages/messages/Messages'
import Records from '@/pages/records/Records'
import Documents from '@/pages/documents/Documents'
import Images from '@/pages/images/Images'
import Friends from '@/pages/friends/Friends'
import Groups from '@/pages/groups/Groups'
import Tasks from '@/pages/tasks/Tasks'
import TasksConfirmed from '@/pages/tasks/confirmed/TasksConfirmed'
import TasksPending from '@/pages/tasks/pending/TasksPending'
import Settings from '@/pages/settings/Settings'
import Profile from '@/pages/profile/Profile'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index
    },
    {
      path: '/dash',
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
      path: '/friends',
      name: 'Friends',
      component: Friends
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
      path: '/tasks/pending',
      name: 'TasksPending',
      component: TasksPending
    },
    {
      path: '/tasks/confirmed',
      name: 'TasksConfirmed',
      component: TasksConfirmed
    },
    {
      path: '/records',
      name: 'Records',
      component: Records
    },
    {
      path: '/documents',
      name: 'Documents',
      component: Documents
    },
    {
      path: '/images',
      name: 'Images',
      component: Images
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
