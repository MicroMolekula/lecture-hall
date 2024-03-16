<script setup>
    import {onMounted, ref} from 'vue'
    function tryLoadFile(){
      if(fileName.value.length != 0 && filePath.value.length != 0){
        message.value = "Загрузка..."
      }
      message.value = "Поля не должны быть пустыми"
    }

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
          <v-file-input :messages="message" v-model="filePath" :rules="rule" prepend-icon="" label="Выберите файл"></v-file-input>
          Выбирете mp3 или docx лекцию для загрузки
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
            @click="tryLoadFile"
          ></v-btn>
        </v-card-actions>
      </f-form>
      </v-card>

    </template>
  </v-dialog>
</template>