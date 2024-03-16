<script setup>
    import {ref} from 'vue'
    import FileDialog from './FileDialog.vue'
    class File{
        name;
        creatingDate;
        type;
        size;

        constructor(name,creatingDate,type,size){
            this.name = name;
            this.creatingDate = creatingDate;
            this.type = type;
            this.size = size;
        }
    }

    const emit = defineEmits('loadButtonClicked')

    function loadButtonFunc(){
        emit('loadButtonClicked')
    }


    let file1 = new File("Назв","Дата создание","png","12mb")
    let file2 = new File("awe1231","asdsa","qewq","qwewq")
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
            <tr class="hover:bg-gray-300">
                <td class="w-4 p-1 pl-5">
                    <img src="../assets/logos/docIcon.svg" alt="">
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
                <td class="px-6 py-4">
                    <v-btn color="#60BBFB" icon="../assets/logos/plusIcon.svg" size="small">
                        <img src="../assets/logos/additionIcon.svg" alt="">
                    </v-btn>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>
