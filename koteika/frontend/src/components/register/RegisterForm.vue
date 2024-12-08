<script setup>
import { useForm } from "vee-validate";
import * as yup from 'yup'
import { useAuthStore } from "@/stores/auth.js";
import { storeToRefs } from "pinia";
import {ref} from "vue";
import router from "@/app/router/index.js";

const { register } = useAuthStore()
const { errorStatusReg } = storeToRefs(useAuthStore())

const nameRegex = /^[А-Яа-яЁё.\-\s]+$/
const MAX_FILE_SIZE = 2 * 1024 * 1024
const SUPPORTED_FORMATS = ['image/jpeg', 'image/png']

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
      .required('Телефон обязателен для заполнения')
      .min(16, 'Введите полный номер телефона'),
  password: yup
      .string()
      .min(8, 'Пароль должен содержать не менее 8 символов')
      .matches(/^[A-Za-z0-9!@#$%^&*(),.?":{}|<>]+$/,
          'Пароль не должен содержать пробелы и может содержать только разрешенные символы'),
  passwordConfirm: yup
      .string()
      .required()
      .oneOf([yup.ref('password')], 'Пароли не совпадают'),
  avatar: yup
      .mixed()
      .nullable()
      .test(
          'fileType',
          'Разрешены только файлы формата jpeg или png',
          (value) => {
            if(!value) return true
            return SUPPORTED_FORMATS.includes(value.type)
          }
      )
      .test(
          'fileType',
          'Размер файла не должен превышать 2 МБ',
          (value) => {
            if(!value) return true
            return value.size <= MAX_FILE_SIZE
          }
      )
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
const [ telephone, telephoneAttrs ] = defineField('telephone')
const [ password, passwordAttrs ] = defineField('password')
const [ passwordConfirm, passwordConfirmAttrs ] = defineField('passwordConfirm')
const [ avatar, avatarAttrs ] = defineField('avatar')

const submit = handleSubmit((values) => {
  register(values.name, values.telephone, values.email, values.password, values.passwordConfirm, values.avatar).then(() => router.push('/'))
})

</script>

<template>
<section class="register">
  <div class="register-block">
    <h2 class="register-title">Регистрация</h2>
    <form
        @submit.prevent="submit"
        class="register-form"
    >
      <div class="register-information">
        <label for="name" class="register-label">Имя</label>
        <input
            type="text"
            class="register-input font-regular"
            :class="{ red: errors.name }"
            id="name"
            placeholder="Введите имя"
            v-model="name"
            v-bind="nameAttrs"
            required
        >
        <p class="errors" v-if="errors.name">{{ errors.name }}</p>
      </div>

      <div class="register-information">
        <label for="email" class="register-label">E-mail</label>
        <input
            type="email"
            class="register-input font-regular"
            :class="{ red: errors.email }"
            id="email"
            placeholder="Введите e-mail"
            v-model="email"
            v-bind="emailAttrs"
            required
        >
        <p class="errors" v-if="errors.email">{{ errors.email }}</p>
      </div>

      <div class="register-information">
        <label for="file" class="register-label">Ваш аватар</label>
        <input
            type="file"
            class="register-input font-regular"
            :class="{ red: errors.file }"
            @change="(event) => avatar = event.target.files[0]"
            v-bind="avatarAttrs"
            id="file"
        >
      </div>

      <div class="register-information">
        <label for="phone" class="register-label">Номер телефона</label>
        <input
            class="register-input font-regular"
            :class="{ red: errors.telephone }"
            id="phone"
            v-model="telephone"
            v-bind="telephoneAttrs"
            v-mask="'+7(###)###-##-##'"
            placeholder="+7(999)999-99-99"
        >
        <p class="errors" v-if="errors.telephone">{{ errors.telephone }}</p>
      </div>

      <div class="register-information">
        <label for="password" class="register-label">Пароль</label>
        <input
            type="password"
            class="register-input font-regular"
            :class="{ red: errors.password }"
            v-model="password"
            v-bind="passwordAttrs"
            id="password"
            placeholder="Введите пароль"
            required
        >
        <p class="errors" v-if="errors.password">{{ errors.password }}</p>
      </div>

      <div class="register-information">
        <label for="password_confirm" class="register-label">Подтвердите пароль</label>
        <input
            type="password"
            class="register-input font-regular"
            :class="{ red: errors.passwordConfirm }"
            v-model="passwordConfirm"
            v-bind="passwordConfirmAttrs"
            id="password_confirm"
            placeholder="Введите пароль ещё раз"
            required>
        <p class="errors" v-if="errors.passwordConfirm">{{ errors.passwordConfirm }}</p>
      </div>
      <button class="register-btn font-regular" :disabled="errors.email || errors.password">Зарегистрироваться</button>
      <p class="errors" v-if="errorStatusReg">Пользователь с такими данными уже существует</p>
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
    min-width: 660px;
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