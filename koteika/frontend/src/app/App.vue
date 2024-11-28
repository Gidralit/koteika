<script setup>
import {AppHeader} from "@/components/index.js";
import {useRoute} from "vue-router";

const route = useRoute();
</script>

<template>
  <app-header v-if="route.name !== 'home'" />
  <RouterView />
</template>

<style scoped>

</style>
