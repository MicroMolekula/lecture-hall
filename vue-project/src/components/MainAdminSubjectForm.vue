<script setup>
    import FileTable from './FileTable.vue'
    import SubjectCard from './SubjectCard.vue'
    import { createVuetify } from 'vuetify'
    import { ref } from 'vue'

    let subjectName = ref('')
</script>

<template>
    <div class="flex">
        <div class="flex flex-row h-full">
            <div class="block w-1/3 h-10 p-2">
                <p>Превью</p>
                <subject-card :name="subjectName"></subject-card>
                <v-text-field v-model="subjectName"></v-text-field>
            </div>
            <div class="block w-1/3 h-auto p-2">
                <v-select
                    label="Добавить преподавателей"
                    chips
                    :items="['Качановский Юрий', 'Седых Ирина', 'Алексеев Владимир', 'Водопьянов Сергей', 'Texas', 'Wyoming']"
                    multiple
                ></v-select>
            </div>
            <div class="flex w-1/3 h-autoblack p-2">
                <v-select
                    label="Добавить группы"
                    chips
                    :items="['Качановский Юрий', 'Седых Ирина', 'Алексеев Владимир', 'Водопьянов Сергей', 'Texas', 'Wyoming']"
                    multiple
            ></v-select>
            </div>

        </div>
    </div>
    
</template>