<script setup>
    import FileTable from './FileTable.vue'
    import SubjectCard from './SubjectCard.vue'
    import { createVuetify } from 'vuetify'
    import { ref } from 'vue'
    const emit = defineEmits(['cardClick'])


    function onCardClicked(id){
        console.log(id)
        emit('cardClick',id)
    }

</script>

<template>
    <div class="bg-gray-50">
        <v-sheet class="p-5">
            <SubjectCard @cardClick="onCardClicked" name="Матан" :subjectId="1" class="mr-5 mb-5"/>

        </v-sheet>
       
    </div>
</template>