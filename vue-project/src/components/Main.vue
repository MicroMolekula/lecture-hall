<script setup>
     import Header from './Header.vue'
     import MainFileContainer from './MainFileContainer.vue'
     import MainSubjectContainer from './MainSubjectContainer.vue'
     import {ref, watch} from 'vue'
     import MainAdminSubjectForm from './MainAdminSubjectForm.vue'
     const props = defineProps({
        userId : Number,
        currentButton : String,
        reDrawed : Boolean,
    })

    const emit = defineEmits(['drawCall'])

    watch(props, (newCurrentButton) => {
        unseeAll()
        makeSee(props.currentButton)
        emit('drawCall',true)
    })

    let showFiles = ref(false)
    let showAdminSubjectForm = ref(false)
    let showSubjectContainer = ref(false)


    function onCardClicked(id){
        unseeAll()
        showFiles.value = true
        console.log(showFiles)
    }
    function unseeAll(){
        showFiles.value = false
        showAdminSubjectForm.value = false
        showSubjectContainer.value = false
    }
    function makeSee(buttonArg){
        if(buttonArg == "LectionButton"){
            showFiles.value = true
        }
        if(buttonArg == "AddSubjectButton"){
            showAdminSubjectForm.value = true
        }
        if(buttonArg == "SubjectButton"){
            showSubjectContainer.value = true
        }
    }
</script>

<template>
    <div class="table w-full h-auto">
        <div class="table-row h-10"><Header/></div>

        <MainFileContainer v-show="showFiles" class="table-row"/>
        <MainAdminSubjectForm v-show="showAdminSubjectForm" class="table-row"/>
        <MainSubjectContainer v-show="showSubjectContainer" @cardClick="onCardClicked"  class="table-row"/>
    </div>
    
</template>