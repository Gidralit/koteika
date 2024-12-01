<script setup>
import {AppHeader} from "@/components/index.js";
import {useRoute} from "vue-router";
import {useMetaStore} from "@/stores/meta.js";
import {onMounted} from "vue";

const route = useRoute();
const { getHeader } = useMetaStore()

onMounted(() => getHeader())

</script>

<template>
  <app-header />
  <RouterView />
</template>

<style scoped>

</style>
