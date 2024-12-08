<script setup>
import {AppHeader} from "@/components/index.js";
import {useRoute} from "vue-router";
import {useMetaStore} from "@/stores/meta.js";
import {onMounted, ref} from "vue";
import {useReviewStore} from "@/stores/review.js";
import {useAuthStore} from "@/stores/auth.js";

const route = useRoute();
const { getHeader, getContacts } = useMetaStore()
const { getReviews } = useReviewStore()
const { register } = useAuthStore()

const isLoading = ref(true)


onMounted(async () => {
  await Promise.all([getHeader(), getContacts(), getReviews()])
  isLoading.value = false
})

</script>

<template>
  <template v-if="!isLoading">
    <AppHeader />
    <RouterView />
  </template>
  <template v-else>
    <h1>Загрузка страницы</h1>
  </template>
</template>

<style lang="scss">
#app{
  min-height: 100vh;
  display: grid;
  grid-template-rows: auto 1fr;
}
</style>
