<script setup>
import { useProfileStore } from "@/stores/profile.js";
import { storeToRefs } from "pinia";
import {onMounted} from "vue";
import defaultPhoto from '@/assets/img/default-img.jpg'
const { getProfile } = useProfileStore()

const { profileData } = storeToRefs(useProfileStore())

onMounted(async () => {
  await Promise.all([getProfile()])
})
</script>

<template>
<section class="profile">
  <div class="container">
    <div class="profile-block">
      <h2>Ваш профиль:</h2>
      <div class="profile-content">
        <img class="profile-avatar" :src="`http://localhost/storage${ profileData.avatar }`" alt="">
        <div class="profile-info">
          <div class="profile-info-block">
            <p class="profile-info__name">{{ profileData.name }}</p>
            <p class="profile-info__email">{{ profileData.email }}</p>
            <p class="profile-info__telephone">{{ profileData.phone }}</p>
          </div>
          <button class="profile-change-btn font-regular">Изменить профиль</button>
        </div>
      </div>
    </div>
  </div>
</section>
</template>

<style scoped lang="scss">
.profile{
  &-block{
    box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.15);
    padding: 87px 144px;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  &-content{
    display: flex;
    align-items: center;
    gap: 35px;
  }

  &-info{
    display: flex;
    flex-direction: column;
    gap: 35px;
    align-items: flex-start;
    &-block{
      display: flex;
      flex-direction: column;
      gap: 7px;
    }
  }
  &-avatar{
    width: 200px;
    height: 200px;
    border-radius: 100%;
  }
  &-change-btn{
    padding: 12px 11px;
    border: none;
    border-radius: 5px;
    background: var(--main-accent);
    font-size: 16px;
  }
}
</style>