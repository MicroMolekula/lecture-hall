<script setup>
    import {ref} from 'vue';
    import LeftPanelElem from './LeftPanelElem.vue'
    defineProps({
       name : String
    })
</script>


<template>
    <div class="w-72 bg-blue1 h-screen inline box-border">
        <div class="bg-blue-500 bg-blue2 w-full h-20 flex items-center justify-center">
            <div class="flex">
                <img class="w-7 mr-2"src="../assets/logos/logoLSTUwhite.png" alt="">
                <div>
                    <div class="relative text-xl text-white  center1 font-inter">
                       ЛГТУ Файлы
                    </div>
                </div>
            </div>
            
        </div>
        <div class="text-center block w-auto h-auto pt-6">
            <LeftPanelElem text="Файл1"/>
            <LeftPanelElem text="Файл2"/>
            <LeftPanelElem text="Файл2"/>
            <LeftPanelElem text="Файл2"/>
            <LeftPanelElem text="Файл2"/>
            <LeftPanelElem text="Файл2"/>
            <LeftPanelElem text="Файл2"/>
        </div>
        
    </div>
</template>

<style scoped>

    .bg-blue1{
        background-color: rgba(55, 160, 234, 1);
    }
    .bg-blue2{
        background-color: rgba(42, 143, 215, 1);
    }
    .center1{
        position: relative;
        top:50%;
        bottom: 50%;
        transform: translate(0%,-50%);
    }
</style>