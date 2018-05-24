
<template>
  <div class="spinner">
    p
  </div>
</template>

<script>
  export default {
    name: 'callback',
    props: ['auth'],
    data () {
      return {}
    },mounted(){
      this.auth.handleAuthentication().then(res => {
        if(!this.auth.isAuthenticated()){
          this.auth.login()
        }
      })

    }
  }
</script>

<style>
  .spinner {
    position: absolute;
    display: flex;
    justify-content: center;
    height: 100vh;
    width: 100vw;
    background-color: white;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
  }
</style>
