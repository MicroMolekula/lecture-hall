<script setup>
    import {ref} from 'vue'
    import { defineComponent } from "vue";
    import axios from 'axios'
    let password = ref("")
    let login = ref("")

    const emit = defineEmits(['successfulJoin'])


    function makeLogin(){
        axios.post("http://localhost:888/api/login",userData)
        .then(response => console.log(response))
        console.log(password)
        console.log(login)
        //tryToJoin()
    }

    function tryToJoin(){
        emit('successfulJoin')
    }

    const userData = ref({
        login: "",
        password: "",
    });


</script>


<template>
<div class=" bg-slate-200 z-10 w-full h-full absolute">
    <v-sheet class="mx-auto p-5 rounded-xl" width="500" height="250">
        <v-form @submit.prevent>
        <v-text-field
            v-model="userData.login"
            label="Логин"
        ></v-text-field>

        <v-text-field
            v-model="userData.password"
            label="Пароль"
        ></v-text-field>

        <v-btn @click="makeLogin" class="mt-2" type="submit" block>Войти</v-btn>
        </v-form>
    </v-sheet>
</div>


</template>