<script setup>
import {AppHeader} from "@/components/index.js";
import {useRoute} from "vue-router";
import {useMetaStore} from "@/stores/meta.js";
import {onMounted, ref} from "vue";

const route = useRoute();
const { getHeader, getContacts } = useMetaStore()

const isLoading = ref(true)


onMounted(async () => {
  await Promise.all([getHeader(), getContacts()])
  isLoading.value = false
})

</script>

<template>
  <template v-if="isLoading">
    <AppHeader />
    <RouterView />
  </template>
  <template v-else>
    <h1>Загрузка страницы</h1>
  </template>
</template>

<style scoped lang="scss">

</style>
