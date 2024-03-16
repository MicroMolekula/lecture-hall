<script setup>
    import {ref} from 'vue'
    import InstituteDialog from './InstituteDialog.vue';
    import LectionDialog from './LectionDialog.vue';
    import Markdown from 'vue3-markdown-it'
    import AudioDialog from './AudioDialog.vue';
    import { AVWaveform } from 'vue-audio-visual'
    class Institute{
        name;
        group

        constructor(name,groups){
            this.name = name;
            this.groups = groups;
          
        }
    }

    const emit = defineEmits('loadButtonClicked')

    function loadButtonFunc(){
        emit('loadButtonClicked')
    }
    

    let i1 = new Institute("ИКН",["пп","png","12mb"])
    let i2 = new Institute("ФТФ",["пп","png","12mb"])
 
    let institutes = ref([i1,i2])
</script>

<template>
 <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-wheat uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="w-20">
                    <v-col cols="auto" class="pl-5">
                        <InstituteDialog></InstituteDialog>
                    </v-col>
                </th>
                <th scope="col" class="px-6 py-3">
                    Институт
                </th>
                <th scope="col" class="px-6 py-3">
                    Группа
                </th>

                <th scope="col" class="px-6 py-3">
                    Действие
                </th>
            </tr>
        </thead>
        <tbody v-for="inst in institutes">
            
            <tr class="hover:bg-gray-300" @click="fileClickFunc">
                <td class="w-4 p-1 pl-5">
                    <div></div>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <v-text-field v-model="inst.name"></v-text-field>
                </td>
                <td class="px-6 py-4">
                    
                    <v-select
                        label="Добавить группы"
                        chips
                        :items=inst.groups
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