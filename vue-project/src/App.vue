<script setup>
  import LeftPanel from './components/LeftPanel.vue';
  import Main from './components/Main.vue';
  import LoginWindow from './components/LoginWindow.vue';
  import {ref} from 'vue'

  let loginShow = ref(true)

  function hideLoginWindow(){
    loginShow.value = false
    console.log(loginShow.value)
  }
  function login(){
    hideLoginWindow()
    console.log("logined")
  }

</script>

<template>
  <div class="flex">
    <LoginWindow @successfulJoin="login" v-show="loginShow"/>
    <LeftPanel name="ЛГТУ файлы"/>
    <Main/>
  </div>
  
</template>

<style>
  *{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
  }
  
</style>
