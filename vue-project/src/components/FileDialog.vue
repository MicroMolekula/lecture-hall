<script setup>
    import {onMounted, ref} from 'vue'
    import axios from 'axios';
    function tryLoadFile(){
      if(fileName.value.length != 0 && filePath.value.length != 0){
        message.value = "Загрузка..."
      }
      message.value = "Поля не должны быть пустыми"
    }

    const props = defineProps({
      id : Number
    })

    let dialog = ref("false")
    let isActive = ref("false")

    let fileName = ref("")
    let filePath = ref("")

    let message = ref("")

    let rule = ref([(value)=>{
      console.log(value)
      if(value) return true
      return "Поле не должно быть пустым"
    }])
    let file = ref()
    function onFileSelected(event){
            let fd = new FormData()
            fd.append('file',event.target.files[0])
            file.value = fd
            console.log(file.value) 
    }

    function loadFile(){
        let requestOptions = {
                headers: { 'authorization': `Bearer ${localStorage.access_token}`, 'content-type' : "application/json",},
                };
            let req = 'http://localhost/api/subject/'+props.id+'/fileUpload'
            console.log(req)
            axios({
  method: "post",
  url: "http://localhost/api/subject/",
  data: {file:file.value},
  headers: { "Content-Type": "application/json" },
})
            .then(response =>{
                if(response.status == 200){
                    return response
                }
                else{
                    console.log(response)
                    throw new Error('error')
                }
                
            })
            .then(data => {console.log(data)})
            .catch((error)=>{
                console.log(error)
            })   
    }

</script>

<template>
  <v-dialog max-width="500">
    <template v-slot:activator="{ props: activatorProps }">
      <v-btn v-bind="activatorProps" color="#60BBFB" icon="../assets/logos/plusIcon.svg" size="small">
        <img src="../assets/logos/plusIcon.svg" alt="">
      </v-btn>
    </template>

    <template v-slot:default="{ isActive }">
      <v-card title="Загрузить лекцию">
        <f-form @submit.prevent>
        <v-card-text>
          <v-text-field v-model="fileName" :rules="rule" label="Название файла"></v-text-field>
          <v-file-input @input="onFileSelected" accept=".mp3,.md" :messages="message" v-model="filePath" :rules="rule" prepend-icon="" label="Выберите файл"></v-file-input>
          Выбирете .mp3 или .md лекцию для загрузки
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            text="Отмена"
            @click="isActive.value = false"
          ></v-btn>
          <v-btn
            text="Загрузить"
            type="submit"
            @click="loadFile"
          ></v-btn>
        </v-card-actions>
      </f-form>
      </v-card>

    </template>
  </v-dialog>
</template>