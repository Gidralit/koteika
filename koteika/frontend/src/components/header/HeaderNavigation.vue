<script setup>
import {storeToRefs} from "pinia";
import {useAuthStore} from "@/stores/auth.js";
import {useRouter} from "vue-router";

const router = useRouter()

const { isAuth } = storeToRefs(useAuthStore())
const { logout } = useAuthStore()

const logoutFunc = () => {
  logout()
  router.push('/')
}

</script>

<template>
  <nav class="navigation">
    <div class="navigation-inner">
      <router-link to="/" class="navigation-link">Главная</router-link>
      <router-link to="/catalog" class="navigation-link">Номера</router-link>
      <router-link to="/#reviews" class="navigation-link">Отзывы</router-link>
      <router-link to="/#banner" class="navigation-link">О нас</router-link>
    </div>
    <template v-if="!isAuth">
      <div class="register">
        <router-link to="/register" class="navigation-link">Регистрация</router-link>
        <router-link to="/login" class="navigation-link">Авторизация</router-link>
      </div>
    </template>
    <template v-else>
      <div class="register">
        <router-link to="#" class="navigation-link">Личный профиль</router-link>
        <a href="#" class="navigation-link" @click="logoutFunc">Выйти из аккаунта</a>
      </div>
    </template>
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