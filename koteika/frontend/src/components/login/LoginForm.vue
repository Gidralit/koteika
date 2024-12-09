<script setup>
import * as yup from 'yup'
import { useForm } from "vee-validate";
import { useAuthStore } from "@/stores/auth.js";
import {storeToRefs} from "pinia";
import router from "@/app/router/index.js";

const { login } = useAuthStore()
const { errorStatusLog } = storeToRefs(useAuthStore())

const yupValidationSchema = yup.object({
  email: yup
      .string()
      .required('Поле является обязательным')
      .email('Некорректная почта'),
  password: yup
      .string()
      .min(8)
})

const {
  defineField,
  errors,
  handleSubmit
} = useForm({
  validationSchema: yupValidationSchema
})

const [email, emailAttrs] = defineField('email')
const [password, passwordAttrs] = defineField('password')

const submit = handleSubmit((values) => {
  login(values.email, values.password)
      .then((bool) => { if(bool) router.push('/') })
})
</script>

<template>
  <form
      @submit.prevent="submit"
      class="login-form"
      novalidate
  >
    <div class="login-information">
      <label for="email" class="login-label">E-mail</label>
      <input
          type="email"
          class="login-input font-regular"
          :class="{ red: errors.email }"
          placeholder="Введите e-mail"
          v-model="email"
          v-bind="emailAttrs"
          id="email"
      >
    </div>
    <div class="login-information">
      <label for="password" class="login-label">Пароль</label>
      <input
          type="password"
          class="login-input font-regular"
          :class="{ red: errors.password }"
          id="password"
          v-model="password"
          v-bind="passwordAttrs"
          placeholder="Введите пароль"
      >
    </div>
    <p class="error" v-if="errorStatusLog">Неверный логин или пароль</p>
    <button class="login-btn font-regular">Войти</button>
  </form>
</template>

<style scoped lang="scss">
.login{
  &-form{
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
  &-information{
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  &-label{
    font-size: 20px;
  }

  &-input{
    font-size: 16px;
    padding: 15px;
    border: 1px solid var(--main-blackopacity);
    border-radius: 10px;
  }

  &-btn{
    border-radius: 10px;
    padding: 15px 40px;
    border: none;
    background: var(--main-accent);
    font-size: 20px;
    cursor: pointer;
  }

  .red{
    border: 2px solid #931818;
  }
  .errors{
    font-size: 16px;
  }
}
</style>