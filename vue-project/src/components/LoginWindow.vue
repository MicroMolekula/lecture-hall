<script setup>
    import {ref} from 'vue'
    import { defineComponent } from "vue";
    import axios, { formToJSON } from 'axios'
    let password = ref("")
    let login = ref("")

    const emit = defineEmits(['successfulJoin'])


    function makeLogin(){
        formMessage.value = "Входим..."
        let request = JSON.stringify(userData.value)
        console.log(request)

        const requestOptions = {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: request,
        };
        fetch("http://localhost:888/api/login", requestOptions)
            .then(response =>{
                if(response.ok){
                    return response.json()
                }
                throw new Error('error')
            })
            .then(data => console.log(data))
            .catch((error)=>{
                console.log(error.message)
                formMessage.value = error.message
            })
    }

    function tryToJoin(data){
        if(data.data.message == "Success"){
            formMessage.value = data.data.message
            emit('successfulJoin')
        }
        else{
            formMessage.value = "Введен неверный пароль"
        }
        
    }
    
    function join(){
        emit('successfulJoin')
    }

    const userData = ref({
        login: "",
        password: "",
    });
    let formMessage = ref('')

</script>


<template>
<div class=" bg-slate-200 z-10 w-full h-full absolute">
    <v-sheet class="mx-auto p-5 rounded-xl" width="500" height="auto">
            <v-form @submit.prevent>
            <v-text-field
                v-model="userData.login"
                label="Логин"
            ></v-text-field>

            <v-text-field
                v-model="userData.password"
                label="Пароль"
                :error-messages="formMessage"
            ></v-text-field>

            <v-btn @click="join" color="error" class="mt-2" type="submit" block>Войти</v-btn>
            <v-btn @click="makeLogin" color="info" class="mt-2" prepend-icon="../assets/logos/vkIcon.svg" block>
                <img class="w-6 fill-current text-blue-400" src="../assets/logos/vkIconWhite.svg" alt="">
                Войти через VKID
            </v-btn>
        </v-form>
    </v-sheet>
</div>


</template>