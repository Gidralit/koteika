<script setup>

</script>

<template>
  <nav class="navigation">
    <div class="navigation-inner">
      <a href="#" class="navigation-link">Главная</a>
      <a href="#" class="navigation-link">Номера</a>
      <a href="#" class="navigation-link">Отзывы</a>
      <a href="#" class="navigation-link">Контакты</a>
    </div>
    <div class="register">
      <a href="#" class="navigation-link">Регистрация</a>
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