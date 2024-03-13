<script setup>
  import LeftPanel from './components/LeftPanel.vue';
  import Main from './components/Main.vue';
</script>

<template>
  <div class="flex">
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
