<script setup>
    import {ref} from 'vue'
    import FileDialog from './FileDialog.vue'
    import LectionDialog from './LectionDialog.vue';
    import Markdown from 'vue3-markdown-it'
    class File{
        name;
        creatingDate;
        type;
        audio;
        size;

        constructor(name,creatingDate,type,size){
            this.name = name;
            this.creatingDate = creatingDate;
            this.type = type;
            this.size = size;
            if(type=="mp3"){
                this.audio = true;
            }
            else{
                this.audio = false;
            }
        }
    }

    const emit = defineEmits('loadButtonClicked')

    function fileClickFunc(){
        console.log("fileclick")
    }

    function loadButtonFunc(){
        emit('loadButtonClicked')
    }
    

    let file1 = new File("Назв","Дата создание","png","12mb")
    let file2 = new File("awe1231","asdsa","mp3","qwewq")
    let file3 = new File("qweqweowqjiojdaiojdioaxdjas","asdsa","qewq","qwewq")
    let files = ref([file1,file2,file3])
</script>

<template>
 <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-wheat uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="w-20">
                    <v-col cols="auto" class="pl-5">
                        
                        <FileDialog></FileDialog>
                    </v-col>
                </th>
                <th scope="col" class="px-6 py-3">
                    Файл
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата создания
                </th>
                <th scope="col" class="px-6 py-3">
                    Тип файла
                </th>
                <th scope="col" class="px-6 py-3">
                    Размер
                </th>
                <th scope="col" class="px-6 py-3">
                    Действие
                </th>
            </tr>
        </thead>
        <tbody v-for="file in files">
            
            <tr class="hover:bg-gray-300" @click="fileClickFunc">
                <td class="w-4 p-1 pl-5">
                    <img v-if="file.audio" src="../assets/logos/audioIcon.svg" alt="">
                    <img class="imgStyle" v-else src="../assets/logos/docIcon.svg" alt="">
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{ file.name }}
                </td>
                <td class="px-6 py-4">
                    {{ file.creatingDate }}
                </td>
                <td class="px-6 py-4">
                    {{ file.type }}
                </td>
                <td class="px-6 py-4">
                    {{ file.size }}
                </td>
                <td class="">
                    <LectionDialog :activator="activatorProps" :title="file.name"></LectionDialog>
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