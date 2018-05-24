<template>

  <div>
    <v-app >

      <v-navigation-drawer
        persistent
        :mini-variant="miniVariant"
        :clipped="clipped"
        v-model="drawer"
        enable-resize-watcher
        fixed
        app
      >
        <v-list>
          <v-list-tile :href="item.path"
                       value="true"
                       v-for="(item, i) in items"
                       :key="i"
          >
            <v-list-tile-action>
              <v-icon v-html="item.icon"></v-icon>

            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title v-text="item.title"></v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
          <v-list-tile  v-if="authenticated"
                        @click="logout()">
            <v-list-tile-action>
              <v-icon >bubble_chart</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title >logout</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>

        </v-list>
      </v-navigation-drawer>
      <v-toolbar
        app
        :clipped-left="clipped"
      >
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
        <v-btn icon @click.stop="miniVariant = !miniVariant">
          <v-icon v-html="miniVariant ? 'chevron_right' : 'chevron_left'"></v-icon>
        </v-btn>
        <v-btn icon @click.stop="clipped = !clipped">
          <v-icon>web</v-icon>
        </v-btn>
        <v-btn icon @click.stop="fixed = !fixed">
          <v-icon>remove</v-icon>
        </v-btn>
        <v-toolbar-title v-text="title"></v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn icon @click.stop="rightDrawer = !rightDrawer">
          <v-icon>menu</v-icon>
        </v-btn>
      </v-toolbar>
      <v-content>
        <router-view :auth="auth"
                     :authenticated="authenticated"/>
      </v-content>
      <v-navigation-drawer
        temporary
        :right="right"
        v-model="rightDrawer"
        fixed
        app
      >
        <v-list>
          <v-list-tile @click="right = !right">
            <v-list-tile-action>
              <v-icon>compare_arrows</v-icon>
            </v-list-tile-action>
            <v-list-tile-title>Switch drawer (click me)</v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-navigation-drawer>
      <v-footer :fixed="fixed" app>
        <span>&copy; 2017</span>
      </v-footer>
    </v-app>
  </div>
</template>

<script>
  import AuthService from './Auth/AuthService'

  const auth = new AuthService()

  const { login, logout, authenticated, authNotifier } = auth


  export default {
    name: 'App',
    data() {
      authNotifier.on('authChange', authState => {
        this.authenticated = authState.authenticated
      })
      return {
        auth,
        authenticated,
        clipped: false,
        drawer: true,
        fixed: false,
        items: [{
          icon: 'bubble_chart',
          title: 'Inspire'
        }, {
          icon: 'bubble_chart',
          title: 'List',
          path: '/list'
        }],
        miniVariant: false,
        right: true,
        rightDrawer: false,
        title: 'Vuetify.js'
      }
    },
    methods: {
      login,
      logout
    },
    mounted() {
      auth.isAuthenticated().then(res => {
        if(res === false && window.location.pathname.search('callback') == -1){
          login()
        }
      })

    }


  }
</script>
