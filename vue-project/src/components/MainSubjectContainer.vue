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

 //   fetch('http://localhost:888/api/users/55/show')
  //  .then(response => response.json())
  //  .then(data => subjectList.value = data.data)

    let subjectTemplate = {
        title: "wwwwwwwwwwwwwццц",
        titleShort: "",
        id: 1,
    }
    makeTitleShort([subjectTemplate])

    function makeTitleShort(subjectListArg){
        for(let i = 0; i < subjectListArg.length ; i++){
            console.log(subjectListArg[0].title.length)
            subjectListArg[i].titleShort = subjectListArg[i].title
            if(subjectListArg[i].title.length > 14){
                subjectListArg[i].titleShort = subjectListArg[i].titleShort.substring(0,13)
                subjectListArg[i].titleShort += "..."
                console.log(subjectListArg[i].titleShort)
            }
        }
    }
    let subjList = ref([subjectTemplate])
</script>

<template>
    <div class="">
        <v-sheet class="p-5">
            <SubjectCard @cardClick="onCardClicked" v-for="subj in subjList" :name="subj.title" :subjectId="subj.id" class="mr-5 mb-5"/>

        </v-sheet>
       
    </div>
</template>