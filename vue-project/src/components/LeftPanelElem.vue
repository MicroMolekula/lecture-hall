<script setup>
    defineProps({
        text: String
    })
</script>


<template>

    <div class="inline-block w-52">
        <div class=" rounded-md  flex hover:bg-blue-300">
            <v-btn .text-normal class="m-0 p-0 w-full h-full rounded-md">
                <img class="inline w-6 mr-3" src="../assets/logos/fileIcon.svg" alt="">
                <div class="inline font-inter text-white text-lg">{{ text }}</div>
            </v-btn>
        </div> 
    </div>
    
</template>

<style scoped>
    .bg-blue{
        background-color: rgba(96, 187, 251, 1);
    }
</style>