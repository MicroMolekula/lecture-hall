<script setup>
    import {ref} from 'vue'
    import GroupDialog from './GroupDialog.vue';
    import LectionDialog from './LectionDialog.vue';
    import Markdown from 'vue3-markdown-it'
    import AudioDialog from './AudioDialog.vue';
    import { AVWaveform } from 'vue-audio-visual'
    class Group{
        name;
        students

        constructor(name,students){
            this.name = name;
            this.students = students;
        }
    }

    let groupData
    let allUsersData

    function getAllUsers(){
        const requestOptions = {
                method: "GET",
                headers: { 'authorization': `Bearer ${localStorage.access_token}`},
                body: null,
                };
        
            fetch("http://localhost/api/users", requestOptions)
            .then(response =>{
                if(response.ok){
                    return response.json()
                }
                throw new Error('error')
            })
            .then(data => {allUsersData = data.data; loadUsers()})
            .catch((error)=>{
                console.log(error)
            })
    }

    function getGroupData(){
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
            .then(data => {groupData = data.data; loadGroups()})
            .catch((error)=>{
                console.log(error)
            })
    }

   

    const emit = defineEmits('loadButtonClicked')

    function loadButtonFunc(){
        emit('loadButtonClicked')
    }
    
    function loadUsers(){
        for(let i = 0 ; i < allUsersData.length; i++){
            //let u = {id:allUsersData[i].id,name : allUsersData[i].name +" "+ allUsersData[i].surname}
            let u = allUsersData[i].name +" "+ allUsersData[i].surname
            users.value.push(u)
        }
    }

    function loadGroups(){
        for(let i = 0 ; i < groupData.length ; i++){
            let users = []
            for(let j = 0 ; j < groupData[i].users.length;j++){
                users.push(groupData[i].users[j].name +" "+ groupData[i].users[j].surname)
            }
            let gNew = new Group(groupData[i].title,users)
            groups.value.push(gNew)
        } 
    }

 
    let groups = ref([])
    let users = ref([])
    getGroupData()
    getAllUsers()
</script>

<template>
 <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-wheat uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="w-20">
                    <v-col cols="auto" class="pl-5">
                        <GroupDialog></GroupDialog>
                    </v-col>
                </th>
                <th scope="col" class="px-6 py-3">
                    Группа
                </th>
                <th scope="col" class="px-6 py-3">
                    Пользователи
                </th>

                <th scope="col" class="px-6 py-3">
                    Действие
                </th>
            </tr>
        </thead>
        <tbody >
            
            <tr v-for="group in groups" class="hover:bg-gray-300" @click="fileClickFunc">
                <td class="w-4 p-1 pl-5">
                    <div></div>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <v-text-field v-model="group.name"></v-text-field>
                </td>
                <td class="px-6 py-4">
                    
                    <v-select
                        label="Добавить студентов"
                        chips
                        :items="users"
                        v-model="group.students"
                        return-object
                        multiple
                    ></v-select>
                </td>

                <td class="">
                    <div class="flex">
                        <v-btn color="info">Изменить</v-btn>
                        <v-btn color="error">Удалить</v-btn>
                    </div>
                </td>   
            </tr>
        </tbody>
    </table>
</div>
</template>


<style scoped>
    .imgStyle{
        width: 41px;
        height: 42px;
    }
</style>