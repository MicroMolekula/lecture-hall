<script setup>
    import SearchLine from "./SearchLine.vue"
    import HeaderContent from "./HeaderContent.vue";
    import ProfileItem from "./ProfileItem.vue";
</script>

<template>
    <div class="flex h-20 border-solid border-b-2 border-gray w-full items-center pl-5">
        <HeaderContent class="mr-16" iconPath="driveIcon.svg" text="Математическое программирование"/>
        
        <SearchLine class="ml-auto mr-20"/>
        <ProfileItem name="Юрий" surname="Качановский"/>
    </div>
</template>