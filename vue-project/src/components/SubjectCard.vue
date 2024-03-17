<script setup>
    import {ref,watch} from 'vue'
    const props = defineProps({
        subjectId : Number,
        name : String,
        image : String
    })



    function cardClicked(){
        console.log("clicknuli")
        emit('cardClick',id) 
    }

    watch(props, (newValue, oldValue) => {
        name.value = props.name
        image.value = props.image
    })

    const emit = defineEmits(['cardClick'])

    let id = ref(props.subjectId)
    let name = ref(props.name)
    let image = ref(props.image)

    
</script>


<template>
    <v-btn @click="cardClicked" height="auto" min-width="250" max-width="250" class="rounded-3xl p-0">
        <v-card width="auto" height="auto" class="rounded-3xl" max-width="250">
            <v-card-title class="text-sm font-bold font-inter">{{ name }}</v-card-title>
            <v-img
            class="text-white "
            width="250"
            height="150"
            :src="image"
            cover
            >
            
            </v-img>
        </v-card>    
    </v-btn>
    
</template>

