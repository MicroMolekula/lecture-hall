<script setup>
    defineProps({
        text: String
    })
</script>


<template>
    <div class="inline-block ">
        <div class="mb-2 w-52 h-12 rounded-md pl-6 flex items-center hover:bg-blue-300">
            <img class="inline w-6 mr-3" src="../assets/logos/fileIcon.svg" alt="">
            <div class="inline font-inter text-white text-lg">{{ text }}</div>
         </div>
    </div>
    
</template>

<style scoped>
    .bg-blue{
        background-color: rgba(96, 187, 251, 1);
    }
</style>