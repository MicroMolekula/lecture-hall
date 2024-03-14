<script setup>
     import Header from './Header.vue'
     import MainFileContainer from './MainFileContainer.vue'
     import MainSubjectContainer from './MainSubjectContainer.vue'
     import {ref} from 'vue'
     defineProps({
        userId : Number
    })
    let showFiles = ref(false)

    function onCardClicked(id){
        showFiles.value = true
        console.log(showFiles)
    }

</script>

<template>
    <div class="table w-full h-auto">
        <div class="table-row h-10"><Header/></div>

        <MainFileContainer v-if="showFiles" class="table-row"/>
        <MainSubjectContainer v-else @cardClick="onCardClicked"  class="table-row"/>
    </div>
    
</template>