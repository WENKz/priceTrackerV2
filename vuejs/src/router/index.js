import Vue from 'vue'
import Router from 'vue-router'
import List from '../components/List'
import HelloWorld from '../components/HelloWorld'
import Callback from '../components/Callback'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
     {
       path:'/list',
         name:'List',
         component:List
      }
    ,
    {
      path:'/callback',
      name: 'Callback',
      component:Callback
    }
  ]
})
