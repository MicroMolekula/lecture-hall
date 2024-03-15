<script setup>
     import Header from './Header.vue'
     import MainFileContainer from './MainFileContainer.vue'
     import MainSubjectContainer from './MainSubjectContainer.vue'
     import {ref} from 'vue'
     import MainAdminSubjectForm from './MainAdminSubjectForm.vue'
     defineProps({
        userId : Number
    })
    let showFiles = ref(false)
    let showAdminSubjectForm = ref(false)
    let showSubjectContainer = ref(false)
    function onCardClicked(id){
        showFiles.value = true
        console.log(showFiles)
    }
    function unseeAll(){

    }
</script>

<template>
    <div class="table w-full h-auto">
        <div class="table-row h-10"><Header/></div>

        <MainFileContainer v-if="showFiles" class="table-row"/>
        <MainAdminSubjectForm v-else class="table-row"/>
        <!-- <MainSubjectContainer v-else @cardClick="onCardClicked"  class="table-row"/> -->
    </div>
    
</template>