<script setup>
import { FooterNavigation } from "@/components/index.js";
import {useMetaStore} from "@/stores/meta.js";
import {storeToRefs} from "pinia";
import {UpArrowIcon} from "@/components/icons/index.js";

const { headerData } = storeToRefs(useMetaStore())
</script>

<template>
<div class="footer">
  <div class="footer-inner container">
    <router-link to="/" class="footer-logo">
      <h1 class="logo font-bold">{{ headerData.title }}</h1>
      <p class="logo-slogan">{{ headerData.text }}</p>
    </router-link>
    <FooterNavigation />
    <div class="footer-scroll">
      <p class="footer-scroll__text">Вернуться наверх</p>
      <UpArrowIcon />
    </div>
  </div>
</div>
</template>

<style scoped lang="scss">
.footer {
  display: flex;
  background: var(--main-accent);

  &-inner {
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
  }

  &-logo {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3px;

    .logo {
      font-size: 28px;

      &-slogan {
        font-size: 12px;
      }
    }
  }
  &-scroll{
    display: flex;
    gap: 5px;
    align-items: center;
    &__text{

    }
  }
}
</style>