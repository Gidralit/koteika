<script setup>
import { HeaderNavigation } from "@/components/index.js";
import {useMetaStore} from "@/stores/meta.js";
import {storeToRefs} from "pinia";

const { headerData } = storeToRefs(useMetaStore())

</script>

<template>
<header class="header" id="header">
  <div class="header-inner container">
    <router-link to="/" class="header-logo">
      <h1 class="logo font-bold">{{ headerData.title }}</h1>
      <p class="logo-slogan">{{ headerData.text }}</p>
    </router-link>
    <p class="header-city">
      <img src="@/assets/img/location.svg" alt="location">
      {{ headerData.city }}
    </p>
    <header-navigation />
  </div>
</header>
</template>

<style scoped lang="scss">
.header{
  display: flex;

  &-inner{
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
  }
  &-logo{
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3px;

    .logo{
      font-size: 28px;

      &-slogan{
        font-size: 12px;
      }
    }
  }
  &-city{
    display: flex;
    gap: 5px;
    align-items: center;
  }
}
</style>