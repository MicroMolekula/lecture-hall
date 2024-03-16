<script setup>
    import {ref} from 'vue'
    import UserDialog from './UserDialog.vue';
    import LectionDialog from './LectionDialog.vue';
    import Markdown from 'vue3-markdown-it'
    import AudioDialog from './AudioDialog.vue';
    import { AVWaveform } from 'vue-audio-visual'
    class User{
        name;
        surname;
        login;
        password;
        role;

        constructor(name,surname,login,password,role){
            this.name = name;   
            this.surname = surname;
            this.login = login;
            this.password = password;
            this.role = role;
          
        }
    }
    const roles = ref(["student","teacher","admin"])
    const emit = defineEmits('loadButtonClicked')

    function loadButtonFunc(){
        emit('loadButtonClicked')
    }
    

    let u1 = new User("Иван","Григорьев","tora","tora","admin")
    let u2 = new User("Иван","Григорьев","tora","tora","student")
 
    let users = ref([u1,u2])
</script>

<template>
 <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-wheat uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="w-20">
                    <v-col cols="auto" class="pl-5">
                        <UserDialog :roles="roles"></UserDialog>
                    </v-col>
                </th>
                <th scope="col" class="px-6 py-3">
                    Имя
                </th>
                <th scope="col" class="px-6 py-3">
                    Фамилия
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Логин
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Пароль
                </th>

                <th scope="col" class="px-6 py-3">
                    Роль
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Действие
                </th>
            </tr>
        </thead>
        <tbody v-for="user in users">
            
            <tr class="hover:bg-gray-300" @click="fileClickFunc">
                <td class="w-4 p-1 pl-5">
                    <div></div>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <v-text-field v-model="user.name"></v-text-field>
                </td>

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <v-text-field v-model="user.surname"></v-text-field>
                </td>

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <v-text-field v-model="user.login"></v-text-field>
                </td>

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <v-text-field v-model="user.password"></v-text-field>
                </td>

                <td class="px-6 py-4">
                    
                    <v-select
                        label="Выбрать роль"
                        chips
                        :items=roles
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