<script setup>
    import FileTable from './FileTable.vue'
    import SubjectCard from './SubjectCard.vue'
    import { createVuetify } from 'vuetify'
    import { ref } from 'vue'
    import axios from 'axios'

    function onFileSelected(event){
        var reader = new FileReader()
        reader.onload = res =>  {
            image.value = res.target.result;
            console.log(image.value)
        }
        console.log(event.target)
        reader.readAsDataURL(event.target.files[0])
    }

    function getTeachers(){
        const requestOptions = {
                method: "GET",
                headers: { 'authorization': `Bearer ${localStorage.access_token}`},
                body: null,
                };
        
            fetch("http://localhost/api/teachers", requestOptions)
            .then(response =>{
                if(response.ok){
                    return response.json()
                }
                throw new Error('error')
            })
            .then(data => teacherList.value = data.data )
            .catch((error)=>{
                console.log(error.message)
            })
    }

    function getGroups(){
        const requestOptions = {
                method: "GET",
                headers: { 'authorization': `Bearer ${localStorage.access_token}`},
                body: null,
                };
        
            fetch("http://localhost/api/group", requestOptions)
            .then(response =>{
                if(response.ok){
                    return response.json()
                }
                throw new Error('error')
            })
            .then(data => groupList.value = data.data )
            .catch((error)=>{
                console.log(error.message)
            })
    }

    function addSubject(){
        let template = {title : subjectName.value, groups: groupModel.value, teachers:teacherModel.value}
        let requestOptions = {
                headers: { 'authorization': `Bearer ${localStorage.access_token}`},
                };
        
            axios.post('http://localhost/api/subject', template,requestOptions)
            .then(response =>{
                if(response.ok){
                    return response.json()
                }
                else{
                    console.log(response)
                    throw new Error('error')
                }
                
            })
            .then(data => console.log(data) )
            .catch((error)=>{
                console.log(error)
            })
    }
    

    function onInputClear(){
        image.value = ""
    }

    let subjectName = ref(" ")
    let image = ref(null)
    let teacherList = ref([])
    let teacherModel = ref([])

    let groupList = ref([])
    let groupModel = ref([])
    getGroups()
    getTeachers()
</script>

<template>
    <div class="flex ">
        <div class="flex flex-row h-full">
            <div class="block w-1/3 h-10 p-5 ">
                <p>Превью</p>
                <subject-card class="mb-5" :name="subjectName" :image="image"></subject-card>
                <v-text-field label="Название предмета"  v-model="subjectName"></v-text-field>
                <v-file-input accept="image/*" @click:clear="onInputClear" @input="onFileSelected" class="w-72" prepend-icon="" color="data" variant="solo-filled" bg-color="blue" label="📌 Прикрепить фото на карточку"> </v-file-input>
                <v-btn @click="addSubject" color="success" prepend-icon="mdi-check-circle">Добавить новый предмет</v-btn>
            </div>
            <div class="block w-1/3 h-auto p-5">
                <v-select
                    label="Добавить преподавателей"
                    chips
                    v-model="teacherModel"
                    :items="teacherList"
                    item-value="id" 
                    item-title="name"
                    multiple
                ></v-select>
            </div>
            <div class="flex w-1/3 h-autoblack p-5">
                <v-select
                    label="Добавить группы"
                    chips
                    :items="groupList"
                    v-model="groupModel"
                    item-value="id"
                    item-title="title"
                    multiple
            ></v-select>
            </div>

        </div>
    </div>
    
</template>