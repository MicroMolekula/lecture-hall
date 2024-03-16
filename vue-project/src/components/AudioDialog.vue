<script setup>
    import { AVWaveform } from 'vue-audio-visual';
</script>


<template>
    <v-bottom-sheet inset>
      <template v-slot:activator="{ props }">
        <div class="text-center">
            <v-btn v-bind="props" color="#60BBFB" icon="../assets/logos/plusIcon.svg" size="small">
                <img src="../assets/logos/soundIcon.svg" alt="">
            </v-btn>
        </div>
      </template>
  
      <v-sheet>
        <AVWaveform :playtime-line-width="5" canv-width="1200" src="src/assets/audio.mp3"/>

      </v-sheet>
    </v-bottom-sheet>
  </template>