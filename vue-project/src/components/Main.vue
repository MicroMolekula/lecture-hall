<script setup>
    import Header from './Header.vue'
    import MainFileContainer from './MainFileContainer.vue'
    import MainSubjectContainer from './MainSubjectContainer.vue'
    import {ref, watch} from 'vue'
    import MainAdminSubjectForm from './MainAdminSubjectForm.vue'
    import MainAdminGroupForm from './MainAdminGroupForm.vue'
    import MainAdminInstituteForm from './MainAdminInstituteForm.vue'
    import MainAdminUserForm from './MainAdminUserForm.vue'
     const props = defineProps({
        userId : Number,
        currentButton : String,
        reDrawed : Boolean,
    })
    const emit = defineEmits(['drawCall'])
    let userData = ref({data:{name:"name",surname:"surname"}})
    getUserData()

    function getUserData(){
        const requestOptions = {
                method: "GET",
                headers: { 'authorization': `Bearer ${localStorage.access_token}`},
                body: null,
                };
        
            fetch("http://localhost/api/auth/user_or_fail", requestOptions)
            .then(response =>{
                if(response.ok){
                    return response.json()
                }
                throw new Error('error')
            })
            .then(data => userData.value = data )
            .catch((error)=>{
                console.log(error.message)
            })
    }
    
   

    watch(props, (newCurrentButton) => {
        unseeAll()
        makeSee(props.currentButton)
        emit('drawCall',true)
    })

    let showFiles = ref(false)
    let showAdminSubjectForm = ref(false)
    let showSubjectContainer = ref(false)
    let showAdminGroupForm = ref(false)
    let showMainAdminInstituteForm = ref(false)
    let showMainAdminUserForm = ref(false)

    let headerTitle = ref('')
    function onCardClicked(id){
        unseeAll()
        showFiles.value = true
        headerTitle.value = "Лекции"
        console.log(showFiles)
    }
    function unseeAll(){
        showFiles.value = false
        showAdminSubjectForm.value = false
        showSubjectContainer.value = false
        showAdminGroupForm.value = false
        showMainAdminInstituteForm.value = false
        showMainAdminUserForm.value = false
    }
    // :(( 
    function makeSee(buttonArg){
        if(buttonArg == "LectionButton"){
            showFiles.value = true
            headerTitle.value = "Лекции"
        }
        if(buttonArg == "AddSubjectButton"){
            showAdminSubjectForm.value = true
            headerTitle.value = "Редактировать предметы"
        }
        if(buttonArg == "SubjectButton"){
            showSubjectContainer.value = true
            headerTitle.value = "Список предметов"
        }
        if(buttonArg == "AddGroupButton"){
            showAdminGroupForm.value = true
            headerTitle.value = "Редактировать группы"
        }
        if(buttonArg =="AddFacultButton"){
            showMainAdminInstituteForm.value = true
            headerTitle.value = "Редактировать институты"
        }
        if(buttonArg == "AddUserButton"){
            showMainAdminUserForm.value = true
            headerTitle.value = "Редактировать пользователей"
        }
    }
</script>

<template>
    <div class="table w-full h-auto">
        <div class="table-row h-10"><Header :name="userData.data.name" :surname="userData.data.surname" :headerTitle="headerTitle"/></div>
        <MainFileContainer v-show="showFiles" class="table-row"/>
        <MainAdminSubjectForm v-show="showAdminSubjectForm" class="table-row"/>
        <MainSubjectContainer v-show="showSubjectContainer" @cardClick="onCardClicked"  class="table-row"/>
        <MainAdminGroupForm v-show="showAdminGroupForm" class="table-row"></MainAdminGroupForm>
        <MainAdminInstituteForm v-show="showMainAdminInstituteForm" class="table-row"></MainAdminInstituteForm>
        <MainAdminUserForm v-show="showMainAdminUserForm" class="table-row"></MainAdminUserForm>
    </div>
    
</template>