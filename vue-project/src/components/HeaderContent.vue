<script setup>
    import { computed } from 'vue'
    import { ref } from 'vue'
    const props = defineProps({
        text : String,
        iconPath : String
    })
    let path1 = ref("src/assets/logos/" + String(props.iconPath))
</script>

<template>
    <div class="flex">
        <img class="mr-5" :src= "path1" alt="111">
        <p class="font-bold text-lg">{{ text }}</p>
    </div>

</template>