<script setup>
import {LawIcon} from "@/components/icons/index.js";
import defaultPhoto from '@/assets/img/default-img.jpg'
import {storeToRefs} from "pinia";
import {useAuthStore} from "@/stores/auth.js";
const { isAuth } = storeToRefs(useAuthStore())

const props = defineProps({
  id: {
    type: Number,
    default: null
  },
  name: {
    type: String,
    default: ''
  },
  square: {
    type: Number,
    default: null
  },
  photo_path1: {
    type: String,
    default: ''
  },
  status: {
    type: String,
    default: ''
  },
  price: {
    type: Number,
    default: null
  },
  equipment: {
    type: Array,
    default: () => []
  }
})
</script>

<template>
<article class="room-card">
  <div class="room-card__Image">
    <div class="room-card__image" :style="{ background: `url(${ 'http://localhost/storage/' + photo_path1 || defaultPhoto }) no-repeat`, backgroundSize: 'cover'}">
      <div class="room-card__overlay" v-for="equip in equipment">
        <LawIcon></LawIcon>
        <p>{{ equip.name }}</p>
      </div>
    </div>
  </div>
  <h3 class="room-card__title">{{ name }}</h3>
  <div class="room-card__bottom">
    <p>{{ square }} кв.м</p>
    <div class="room-card__price">
      <p>{{ price }}р.</p>
      <button class="room-card__btn font-bold" v-if="isAuth">Забронировать</button>
    </div>
  </div>
</article>
</template>

<style scoped lang="scss">
  .room-card {
    display: flex;
    flex-direction: column;
    gap: 12px;
    max-width: 415px;
    padding: 12px;
    box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.15);
    background: #fff;
    border-radius: 10px;
    align-self: flex-start;

    &__title{
      font-size: 24px;
    }

    &__image {
      display: flex;
      min-height: 310px;
      width: 100%;
      border-radius: 10px 10px 0 0;
      gap: 10px;
      padding: 12px;
    }

    &__overlay {
      display: flex;
      border-radius: 3px;
      height: fit-content;
      padding: 5px 4px;
      align-items: center;
      color: #fff;
      gap: 4px;
      font-weight: 700;
      font-size: 16px;
      background: var(--main-green);
    }


    &__bottom{
      display: flex;
      font-weight: 400;
      font-size: 24px;
      text-align: center;
      justify-content: space-between;
      align-items: flex-end;
    }

    &__price {
      display: flex;
      font-weight: 400;
      font-size: 32px;
      gap: 10px;
      flex-direction: column;
      align-items: end;
    }

    &__btn{
      display: flex;
      font-size: 16px;
      border-radius: 5px;
      padding: 12px 11px;
      background: var(--main-accent);
      color: var(--main-black);
      border: none;
    }

  }
</style>