<script setup>
    import FileTable from './FileTable.vue'
    import SubjectCard from './SubjectCard.vue'
    import { createVuetify } from 'vuetify'
    import { ref } from 'vue'
    let fileTableRef = ref()
    const props = defineProps({
        id : Number
    })
    
    function loadFilesById(id){
        idIn.value = id
    }


    defineExpose({
        loadFilesById
    })

   
    let idIn = ref("id")
    fileTableRef.value = "fileTable"
</script>

<template>
    <div class="w-5 ">
        <FileTable ref="fileTable" :id="idIn"/>
    </div>
</template>