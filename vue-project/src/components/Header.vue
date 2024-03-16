<script setup>
    import SearchLine from "./SearchLine.vue"
    import HeaderContent from "./HeaderContent.vue";
    import ProfileItem from "./ProfileItem.vue";

    const props = defineProps({
        headerTitle : String,
        name : String,
        surname : String
    })
</script>

<template>
    <div class="flex h-20 border-solid border-b-2 border-gray w-full items-center pl-5">
        <HeaderContent class="mr-16" iconPath="driveIcon.svg" :text="props.headerTitle"/>
        
        <SearchLine class="ml-auto mr-20"/>
        <ProfileItem :name="props.name" :surname="props.surname"/>
    </div>
</template>