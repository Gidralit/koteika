<script setup>
import { useForm } from "vee-validate";
import * as yup from 'yup'
import { useAuthStore } from "@/stores/auth.js";
import { storeToRefs } from "pinia";
import { useRouter } from "vue-router";
import {ref} from "vue";

const { register } = useAuthStore()
const { errorStatusReg } = storeToRefs(useAuthStore())

const nameRegex = /^[А-Яа-яЁё.\-\s]+$/
const telephone = ref('')

const yupValidationSchema = yup.object({
  name: yup
      .string()
      .required('Имя должно быть обязательно заполнено')
      .matches(nameRegex, 'Имя может содержать только кириллицу, пробелы, точки и тире'),
  email: yup
      .string()
      .required('Поле является обязательным')
      .email('Некорректная почта'),
  telephone: yup
      .string()
      .required()
      .min(16),
  password: yup
      .string()
      .min(8)
      .matches(/^[A-Za-z0-9!@#$%^&*(),.?":{}|<>]+$/,
          'Пароль не должен содержать пробелы и может содержать только разрешенные символы'),
  passwordConfirm: yup
      .string()
      .required()
      .oneOf([yup.ref('password')], 'Пароли не совпадают')
})

const {
    defineField,
    errors,
    handleSubmit
} = useForm({
  validationSchema: yupValidationSchema
})

const [ name, nameAttrs ] = defineField('name')
const [ email, emailAttrs ] = defineField('email')


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
        <label for="phone" class="register-label">Номер телефона</label>
        <input
            class="register-input font-regular"
            type="tel"
            id="phone"
            v-model="telephone"
            v-mask="'+7(###)###-##-##'"
            placeholder="+7(999)999-99-99"
        >
      </div>

      <div class="register-information">
        <label for="password" class="register-label">Пароль</label>
        <input type="password" class="register-input font-regular" id="password" placeholder="Введите пароль" required>
      </div>

      <div class="register-information">
        <label for="password_confirm" class="register-label">Подтвердите пароль</label>
        <input type="password" class="register-input font-regular" id="password_confirm" placeholder="Введите пароль ещё раз" required>
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