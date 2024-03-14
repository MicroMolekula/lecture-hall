<script setup>
    import {ref} from 'vue'
    const props = defineProps({
        subjectId : Number,
        name : String
    })
    const emit = defineEmits(['cardClick'])


    let id = ref(props.subjectId)

    function cardClicked(){
        console.log("clicknuli")
        emit('cardClick',id) 
        
    }
    let img = ref('')
    
</script>


<template>
    <v-btn @click="cardClicked" height="auto" min-width="250" class="rounded-3xl p-0">
        <v-card width="auto" height="auto" class="rounded-3xl">
            <v-card-title>{{ name }}</v-card-title>
            <v-img
            class="text-white "
            width="250"
            height="150"
            :src=img
            cover
            >
            
            </v-img>
        </v-card>    
    </v-btn>
    
</template>

