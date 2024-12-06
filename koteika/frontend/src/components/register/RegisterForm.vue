<script setup>
import { useForm } from "vee-validate";
import * as yup from 'yup'



</script>

<template>
<section class="register">
  <div class="register-block">
    <h2 class="register-title">Регистрация</h2>
    <form action="" class="register-form">
      <div class="register-information">
        <label for="name" class="register-label">Имя</label>
        <input type="text" class="register-input font-regular" id="name" placeholder="Введите имя" required>
      </div>

      <div class="register-information">
        <label for="email" class="register-label">E-mail</label>
        <input type="email" class="register-input font-regular" id="email" placeholder="Введите e-mail" required>
      </div>

      <div class="register-information">
        <label for="file" class="register-label">Ваш аватар</label>
        <input type="file" class="register-input font-regular" id="file">
      </div>

      <div class="register-information">
        <label for="password" class="register-label">Пароль</label>
        <input type="password" class="register-input font-regular" id="password" placeholder="Введите пароль" required>
      </div>

      <div class="register-information">
        <label for="password" class="register-label">Подтвердите пароль</label>
        <input type="password" class="register-input font-regular" id="password" placeholder="Введите пароль ещё раз" required>
      </div>

      <button class="register-btn font-regular">Зарегистрироваться</button>
    </form>
  </div>
</section>
</template>

<style scoped lang="scss">
.register{
  display: flex;
  justify-content: center;
  align-items: center;

  &-block{
    box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.15);
    border-radius: 20px;
    padding: 20px;
    min-width: 560px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    height: fit-content;
  }

  &-form{
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  &-title{
    font-size: 28px;
    text-align: center;
  }

  &-information{
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  &-label{
    font-size: 20px;
  }

  &-input:not([type="file"]){
    padding: 15px;
    border: 1px solid var(--main-blackopacity);
    border-radius: 10px;
  }

  &-input{
    font-size: 16px;
  }

  &-btn{
    border-radius: 10px;
    padding: 15px 40px;
    border: none;
    background: var(--main-accent);
    font-size: 20px;
  }
}

</style>