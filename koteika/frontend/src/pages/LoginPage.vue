<script setup>

import { LoginForm } from "@/components/index.js";
</script>

<template>
<section class="login">
  <div class="login-block">
    <h2 class="login-title">Авторизация</h2>
    <LoginForm />
  </div>
</section>
</template>

<style scoped lang="scss">
.login{
  display: flex;
  justify-content: center;
  align-items: center;

  &-block{
    box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.15);
    border-radius: 20px;
    padding: 20px;
    min-width: 660px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    height: fit-content;
  }

  &-title{
    font-size: 28px;
    text-align: center;
  }
}
</style>