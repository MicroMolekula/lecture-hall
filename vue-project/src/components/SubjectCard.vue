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

    let subjectTemplate = {
        title: props.name,
        titleShort: "",
        id: 1,
    }
    makeTitleShort(subjectTemplate)

    function makeTitleShort(subjectArg){
        const maxletters = 25
        console.log(subjectArg.title.length)
        subjectArg.titleShort = subjectArg.title
        if(subjectArg.title.length > maxletters){
            subjectArg.titleShort = subjectArg.titleShort.substring(0,maxletters)
            subjectArg.titleShort += "..."
        }
    }
    let img = ref('')
    let subjectRef = ref(subjectTemplate)
</script>


<template>
    <v-btn @click="cardClicked" height="auto" min-width="250" class="rounded-3xl p-0">
        <v-card width="auto" height="auto" class="rounded-3xl">
            <v-card-title class="text-sm">{{ subjectRef.titleShort }}</v-card-title>
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

