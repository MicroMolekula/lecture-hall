<script setup>
    import {ref} from 'vue';
    defineProps({
       name : String
    })

    const emit = defineEmits(['buttonClickedEvent'])

    function buttonClickedFunc(buttonArg){
        emit('buttonClickedEvent',buttonArg)
    }

    class group{
        name;
        infos;
        constructor(name,infos){
            this.name = name;
            this.infos = infos
        }
    }
    class buttInfo{
        name;
        text;
    }

    // let groupList = [new group("СЕРВИС",[new  buttInfo("LectionButton","📄Лекции"),new buttInfo("SubjectsButton","📄Предметы") ]),
    // new group("ФОРМЫ ДОБАВЛЕНИЯ",[new buttInfo("SubjectAddButton","🔐Предмет"),new buttInfo("SubjectsButton","🔐Группа"),new buttInfo("SubjectsButton","🔐Пользователь"),new buttInfo("SubjectsButton","🔐Факультет") ])]
    
</script>


<template>
    <div class="w-72 bg-blue1 h-screen flex-col box-border">
        <div class="bg-blue-500 bg-blue2 w-full h-20 flex items-center justify-center box-border mb-5">
            <div class="flex">
                <img class="w-7 mr-2"src="../assets/logos/logoLSTUwhite.png" alt="">
                <div>
                    <div class="relative text-xl text-white  center1 font-inter">
                       {{ name }}
                    </div>
                </div>
            </div>
            
        </div>
        <div class="text-center grow-1 w-auto h-auto box-border">
            <v-text class=" text-gray-900rounded-md w-52 h-52 mb-5  font-inter text-lg ">СЕРВИС</v-text>
            <v-btn evalation="4" class="buttonLeftStyle text-white" height="40" @click="buttonClickedFunc('LectionButton')">📄Лекции</v-btn>
            <v-btn evalation="4" class="buttonLeftStyle text-white" height="40" @click="buttonClickedFunc('SubjectButton')">📚Предметы</v-btn>
            <v-text class="text-gray-900 rounded-md w-52 h-52 mb-5  font-inter text-lg">ФОРМЫ ДОБАВЛЕНИЯ</v-text>
            <v-btn evalation="4" class="buttonLeftStyle text-white" height="40" @click="buttonClickedFunc('AddSubjectButton')">🔐Предмет</v-btn>
            <v-btn evalation="4" class="buttonLeftStyle text-white" height="40" @click="buttonClickedFunc('AddGroupButton')">🔐Группа</v-btn>
            <v-btn evalation="4" class="buttonLeftStyle text-white" height="40" @click="buttonClickedFunc('AddFacultButton')">🔐Институт</v-btn>
            <v-btn evalation="4" class="buttonLeftStyle text-white" height="40" @click="buttonClickedFunc('AddUserButton')">🔐Пользователь</v-btn>
            <v-text class="text-gray-900  rounded-md w-52 h-52 mb-5  font-inter text-lg">ОСТАЛЬНОЕ</v-text>
            <v-btn evalation="4" class="hover:bg-red-400 bg-red-300 text-white buttonLeftStyle " @click="buttonClickedFunc  ('LeaveButton')" height="40">Выход</v-btn>
        </div>
        
    </div>
</template>

<style scoped>
    
    .grow-1{
        flex-grow: 1;
    }
    *{
        box-sizing: border-box;
    }
    
</style>