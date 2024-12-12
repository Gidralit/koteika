<script setup>

</script>

<template>
  <nav class="navigation">
    <router-link to="/" class="navigation-link">Главная</router-link>
    <router-link to="/room" class="navigation-link">Номера</router-link>
    <a href="#" class="navigation-link">Отзывы</a>
    <a href="#" class="navigation-link">О нас</a>
  </nav>
</template>

<style scoped lang="scss">
.navigation {
  display: flex;
  gap: 50px;
}
</style>