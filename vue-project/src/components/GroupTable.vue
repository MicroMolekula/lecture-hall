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

    const emit = defineEmits('loadButtonClicked')

    function loadButtonFunc(){
        emit('loadButtonClicked')
    }
    

    let g1 = new Group("ПИ",["пп","png","12mb"])
    let g2 = new Group("АИ",["пп","png","12mb"])
 
    let groups = ref([g1,g2])
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
        <tbody v-for="group in groups">
            
            <tr class="hover:bg-gray-300" @click="fileClickFunc">
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
                        :items=group.students
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