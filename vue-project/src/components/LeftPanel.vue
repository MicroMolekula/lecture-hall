<script setup>
    import {ref} from 'vue';
    import LeftPanelElem from './LeftPanelElem.vue'
    defineProps({
       name : String
    })
</script>


<template>
    <div class="w-72 bg-blue1 h-screen inline box-border">
        <div class="bg-blue-500 bg-blue2 w-full h-20 flex items-center justify-center box-border mb-5">
            <div class="flex">
                <img class="w-7 mr-2"src="../assets/logos/logoLSTUwhite.png" alt="">
                <div>
                    <div class="relative text-xl text-white  center1 font-inter">
                       {{ name }}
                    </div>
                </div>
            </div>
            
        </div>
        <div class="text-center min-h-full flex-col w-auto relative box-border">
            <v-btn evalation="4" class="hover:bg-blue-300  rounded-md w-52 h-52 mb-5 text-white font-inter text-lg" height="40" >📄Лекции</v-btn>
            <v-btn evalation="4" class="hover:bg-blue-300 rounded-md w-52 h-52 mb-5 text-white font-inter text-lg" height="40" >📚Предметы</v-btn>
            <v-text class="hover:bg-blue-300 rounded-md w-52 h-52 mb-5 text-white font-inter text-lg">ФОРМЫ ДОБАВЛЕНИЯ</v-text>
            <v-btn evalation="4" class="hover:bg-blue-300 rounded-md w-52 h-52 mb-5 text-white font-inter text-lg" height="40" ></v-btn>
            <v-btn evalation="4" class="hover:bg-blue-300 rounded-md w-52 h-52 mb-5 text-white font-inter text-lg" height="40" >Фрик</v-btn>
            <v-btn evalation="4" class="hover:bg-blue-300 rounded-md w-52 h-52 mb-5 text-white font-inter text-lg" height="40" >Фрик</v-btn>
            <v-btn evalation="4" class="hover:bg-red-400 bg-red-300 rounded-md w-52 h-52 text-white font-inter text-lg" height="40" >Выход</v-btn>
        </div>
        
    </div>
</template>

<style scoped>
    *{
        box-sizing: border-box;
    }
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