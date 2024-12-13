<script setup>

</script>

<template>
  <nav class="navigation">
    <router-link to="/" class="navigation-link">Главная</router-link>
    <router-link to="/room" class="navigation-link">Номера</router-link>
    <router-link to="/#reviews" class="navigation-link">Отзывы</router-link>
    <router-link to="/#abous-us" class="navigation-link">О нас</router-link>
  </nav>
</template>

<style scoped lang="scss">
.navigation {
  display: flex;
  gap: 50px;
}
</style>