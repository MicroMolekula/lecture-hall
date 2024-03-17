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

    let subjectTemplate = {
        title: "wwwwwwwwwwwwwццц",
        id: 1,
    }


    function getSubjects(){
        const requestOptions = {
                method: "GET",
                headers: { 'authorization': `Bearer ${localStorage.access_token}`},
                body: null,
                };
        
            fetch("http://localhost/api/subject", requestOptions)
            .then(response =>{
                if(response.ok){
                    return response.json()
                }
                throw new Error('error')
            })
            .then(data => {
                for(let i = 0; i < data.data.length; i++){
                    subjList.value.push({title: data.data[i].title,id: data.data[i].id})
                }
            } )
            .catch((error)=>{
                console.log(error.message)
            })
    }
    let templateImage = ref("src/assets/p1.jpg")
    let subjList = ref([])
    getSubjects()
</script>

<template>
    <div class="">
        <v-sheet class="p-5">
            <SubjectCard @cardClick="onCardClicked" v-for="subj in subjList"  :image="templateImage" :name="subj.title" :subjectId="subj.id" class="mr-5 mb-5"/>

        </v-sheet>
       
    </div>
</template>