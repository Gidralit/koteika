<script setup>
import HeaderNavigation from "@/components/header/HeaderNavigation.vue";

const headerData = {
  name: 'Котейка',
  slogan: 'Пушистые мечты',
  city: 'Москва'
}
</script>

<template>
<header class="header">
  <div class="header-inner container">
    <a href="#" class="header-logo">
      <h1 class="logo">{{ headerData.name }}</h1>
      <p class="logo-slogan">{{ headerData.slogan }}</p>
    </a>
    <p class="header-city">{{ headerData.city }}</p>
    <header-navigation />
  </div>
</header>
</template>

<style scoped>

</style>