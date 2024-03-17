<script setup>
    import {ref,watch} from 'vue'
    import FileDialog from './FileDialog.vue'
    import LectionDialog from './LectionDialog.vue';
    import Markdown from 'vue3-markdown-it'
    import AudioDialog from './AudioDialog.vue';
    import { AVWaveform } from 'vue-audio-visual'
    import axios from 'axios';
    const props = defineProps({
        id : Number
    })


    watch(props, (newValue, oldValue) => {
        console.log("p " + props.id)
        loadFiles(props.id)
        idSubj.value = props.id
    })
    let idSubj = ref('props.id')
    function loadFiles(id){
        files.value.length = 0
        let requestOptions = {
                headers: { 'authorization': `Bearer ${localStorage.access_token}`},
                };
            
            axios.get('http://localhost/api/subject/'+id,requestOptions)
            .then(response =>{
                if(response.status == 200){
                    return response
                }
                else{
                    console.log(response)
                    throw new Error('error')
                }
                
            })
            .then(data => {
                console.log(data.data.data.files);
                let dataF = data.data.data.files
                for(let i = 0 ; i < dataF.length; i++){
                    console.log(dataF[i])
                    files.value.push(new File(dataF[i].title,"17.03.2024",dataF[i].type))
                }
                 
                } )
            .catch((error)=>{
                console.log(error)
            })   
    }
    class File{
        name;
        creatingDate;
        type;
        audio;


        constructor(name,creatingDate,type){
            this.name = name;
            this.creatingDate = creatingDate;
            this.type = type;
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
                        
                        <FileDialog :id="idSubj"></FileDialog>
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
                    Действие
                </th>
            </tr>
        </thead>
        <tbody v-for="file in files">
            
            <tr class="hover:bg-gray-300" @click="fileClickFunc">
                <td class="w-4 p-1 pl-5">
                    <img class="imgStyle" v-if="file.audio" src="../assets/logos/audioIcon.svg" alt="">
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
                <td class="">
                    <div class="flex">
                        <AudioDialog v-if="file.audio"></AudioDialog>
                        <LectionDialog :title="file.name"></LectionDialog>
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