<script setup>
    import {onMounted, ref} from 'vue'
    function tryLoadFile(){
      if(groupName.value.length != 0){
        message.value = "Загрузка..."
      }
      message.value = "Поле не должно быть пустыми"
    }

    let dialog = ref("false")
    let isActive = ref("false")

    let instituteName = ref("")
    let groups = ref("")

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
      <v-card title="Добавить институт">
        <f-form @submit.prevent>
        <v-card-text>
          <v-text-field v-model="instituteName" :rules="rule" label="Название института"></v-text-field>
          <v-select :messages="message" v-model="groups" prepend-icon="" label="Выберите группы"></v-select>
    
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            text="Отмена"
            @click="isActive.value = false"
          ></v-btn>
          <v-btn
            text="Создать"
            type="submit"
            @click="tryLoadFile; isActive.value = false"
          ></v-btn>
        </v-card-actions>
      </f-form>
      </v-card>

    </template>
  </v-dialog>
</template>