<script setup>
    import FileTable from './FileTable.vue'
    import SubjectCard from './SubjectCard.vue'
    import { createVuetify } from 'vuetify'
    import { ref } from 'vue'
    const emit = defineEmits(['cardClick'])


    function onCardClicked(id){
        console.log(id)
        emit('cardClick',id)
    }
    let subjectList = ref()

    fetch('http://localhost:888/api/users/55/show')
    .then(response => response.json())
    .then(data => subjectList.value = data.data)


</script>

<template>
    <div class="">
        <v-sheet class="p-5">
            <SubjectCard @cardClick="onCardClicked" v-for="subj in subjectList" :name="subj.title" :subjectId="subj.id" class="mr-5 mb-5"/>

        </v-sheet>
       
    </div>
</template>