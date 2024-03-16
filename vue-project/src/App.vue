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

  function leftPanelButtonClicked(event){
    leftButtonCurrent.value = event
    drawVar.value = false
    console.log(event)
  }

  function reDrawed(bool){
    drawVar.value = bool
  }
  let drawVar = ref("false")
  let leftButtonCurrent = ref("")
</script>

<template>
  <div class="flex">
    <LoginWindow @successfulJoin="login" v-show="loginShow"/>
    <LeftPanel @buttonClickedEvent="leftPanelButtonClicked" name="ЛГТУ Лекции"/>
    <Main :currentButton="leftButtonCurrent" @drawCall="reDrawed" :reDrawed="drawVar"/>
  </div>
  
</template>

<style>
  *{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
  }
  
</style>
