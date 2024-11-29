<script setup>
import HeaderNavigation from "@/components/header/HeaderNavigation.vue";



</script>

<template>
<header class="header">
  <div class="header-inner container">
    <a href="#" class="header-logo">
      <h1 class="logo">{{  }}</h1>
      <p class="logo-slogan">{{  }}</p>
    </a>
    <p class="header-city">  {{  }}</p>
    <header-navigation />
  </div>
</header>
</template>

<style scoped lang="scss">
.header{
  display: flex;
  &-inner{
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
  }
}
</style>