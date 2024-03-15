<script setup>
    import {ref} from 'vue'
    const props = defineProps({
        imagePath : String,
        name : String,
        surname : String

    })
    let imgPath = ""
    if(props.imagePath == null){
        imgPath = ref("src/assets/logos/" + "profileIcon.svg")
    } 
    else{
        imgPath = ref("src/assets/logos/" + props.imagePath)
    }
</script>


<template>
    <div class="flex h-12 w-70 mr-20  rounded-xl items-center">
        <img class="mr-1" :src="imgPath" alt="qweqwe">
        <p class="mr-6 font-inter">{{ name }} {{ surname }}</p>
        <img class="w-1" src="@/assets/logos/additionIcon.svg" alt="add">
    </div>
</template>