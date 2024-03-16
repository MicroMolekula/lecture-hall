
<script setup>
    import {ref} from 'vue'
    const props = defineProps({
        title : String
    })
    let active = ref(true)
</script>

<template>
    <div class="text-center">
      <v-dialog max-width="1400">
        <template v-slot:activator="{props: activatorProps }">
            <v-btn v-bind="activatorProps" color="#60BBFB" icon="../assets/logos/plusIcon.svg" size="small">
                <img src="../assets/logos/eyeIcon.svg" alt="">
            </v-btn>
        </template>
  
        <template v-slot:default="{ isActive }">
          <v-card :title="title">
            <template v-slot:text>
              Cras pellentesque vel sodales accumsan aenean. Feugiat metus sit nec in aliquet amet, porttitor pretium vulputate massa. Consequat ipsum luctus quisque adipiscing libero. Wisi sollicitudin. Eget vitae ac lobortis, lorem natoque vestibulum et, aliquet faucibus at morbi nibh, vel condimentum. Massa unde orci sed id sed, odio donec congue nec praesent amet. Hymenaeos velit lacus, quis vivamus libero tempus duis, eu nisi eu, ipsum at accumsan pede justo morbi donec, massa et libero sit risus neque tortor. Ut sed sed etiam hendrerit dapibus, quis metus suspendisse nibh.
            </template>
  
            <v-card-actions>
              <v-spacer></v-spacer>
  
              <v-btn
                color="surface-variant"
                text="Закрыть"
                variant="flat"
                @click="isActive.value = false"
              ></v-btn>
            </v-card-actions>
          </v-card>
        </template>
      </v-dialog>
    </div>
  </template>