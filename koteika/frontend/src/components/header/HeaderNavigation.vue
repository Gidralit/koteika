<script setup>

</script>

<template>
  <nav class="navigation">
    <div class="navigation-inner">
      <router-link to="/" class="navigation-link">Главная</router-link>
      <router-link to="/catalog" class="navigation-link">Номера</router-link>
      <a href="#" class="navigation-link">Отзывы</a>
      <a href="#" class="navigation-link">О нас</a>
    </div>
    <div class="register">
      <router-link to="/register" class="navigation-link">Регистрация</router-link>
      <a href="#" class="navigation-link">Авторизация</a>
    </div>
  </nav>
</template>

<style scoped lang="scss">
.navigation{
  display: flex;
  gap: 13vw;
  &-inner{
    display: flex;
    gap: 50px;
  }
  .register{
    display: flex;
    gap: 40px;
  }
}
</style>