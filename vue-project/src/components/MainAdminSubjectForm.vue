<script setup>
    import FileTable from './FileTable.vue'
    import SubjectCard from './SubjectCard.vue'
    import { createVuetify } from 'vuetify'
    import { ref } from 'vue'

    function onFileSelected(event){
        var reader = new FileReader()
        reader.onload = res =>  {
            image.value = res.target.result;
            console.log(image.value)
        }
        console.log(event.target)
        reader.readAsDataURL(event.target.files[0])
    }

    function onInputClear(){
        image.value = ""
    }

    let subjectName = ref(" ")
    let image = ref(null)
</script>

<template>
    <div class="flex ">
        <div class="flex flex-row h-full">
            <div class="block w-1/3 h-10 p-5 ">
                <p>Превью</p>
                <subject-card class="mb-5" :name="subjectName" :image="image"></subject-card>
                <v-text-field label="Название предмета"  v-model="subjectName"></v-text-field>
                <v-file-input accept="image/*" @click:clear="onInputClear" @input="onFileSelected" class="w-72" prepend-icon="" color="data" variant="solo-filled" bg-color="blue" label="📌 Прикрепить фото на карточку"> </v-file-input>
                <v-btn color="success" prepend-icon="mdi-check-circle">Добавить новый предмет</v-btn>
            </div>
            <div class="block w-1/3 h-auto p-5">
                <v-select
                    label="Добавить преподавателей"
                    chips
                    :items="['Качановский Юрий', 'Седых Ирина', 'Алексеев Владимир', 'Водопьянов Сергей', 'Texas', 'Wyoming']"
                    multiple
                ></v-select>
            </div>
            <div class="flex w-1/3 h-autoblack p-5">
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