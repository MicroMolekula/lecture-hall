<script setup>
    import {onMounted, ref} from 'vue'
    
    const props = defineProps({
      roles : Array
    })

    function tryLoadFile(){
      if(userName.value.length != 0 && userSurname.value.length != 0 && userLogin.value.length != 0 && userPassword.value.length != 0 && userRole.value.length != 0){
        message.value = "Загрузка..."
      }
      message.value = "Поле не должно быть пустыми"
    }

    let userName = ref("")
    let userSurname = ref("")
    let userLogin = ref("")
    let userPassword = ref("")
    let userRole = ref("")

    let message = ref("")

    let rule = ref([(value)=>{
      console.log(value)
      if(value) return true
      return "Поле не должно быть пустым"
    }])

    let roles = ref(props.roles)
</script>

<template>
  <v-dialog max-width="500">
    <template v-slot:activator="{ props: activatorProps }">
      <v-btn v-bind="activatorProps" color="#60BBFB" icon="../assets/logos/plusIcon.svg" size="small">
        <img src="../assets/logos/plusIcon.svg" alt="">
      </v-btn>
    </template>

    <template v-slot:default="{ isActive }">
      <v-card title="Добавить пользователя">
        <f-form @submit.prevent>
        <v-card-text>
          <v-text-field v-model="userName" :rules="rule" label="Имя"></v-text-field>
          <v-text-field v-model="userSurname" :rules="rule" label="Фамилия"></v-text-field>
          <v-text-field v-model="userLogin" :rules="rule" label="Логин"></v-text-field>
          <v-text-field v-model="userPassword" :rules="rule" label="Пароль"></v-text-field>
          <v-select :items="roles" :messages="message" v-model="userRole" prepend-icon="" label="Роль"></v-select>
    
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