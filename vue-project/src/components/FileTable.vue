<script setup>
    import {ref} from 'vue'
    class File{
        name;
        creatingDate;
        type;
        size;

        constructor(name,creatingDate,type,size){
            this.name = name;
            this.creatingDate = creatingDate;
            this.fileType = type;
            this.size = size;
        }
    }
    let file1 = new File("awe","asdsa","qewq","qwewq")
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
            <tr class="bg-white  hover:bg-gray-200 ">
                <td class="w-4 p-1 pl-5">
                    <img src="../assets/logos/docIcon.svg" alt="">
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{ file.name }}
                </th>
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
                    <button class="w-8 h-8"> <img src="@/assets/logos/additionIcon.svg" alt=""></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<style scoped>

</style>