<script setup>
import {useMetaStore} from "@/stores/meta.js";
import {storeToRefs} from "pinia";
import {LandingBanner, ReviewList} from "@/components/index.js";
import { RoomList } from "@/components/index.js";
import { AboutUs } from "@/components/index.js";

</script>

<template>
<main>
  <landing-banner />
  <section class="rooms">
    <div class="container">
      <h2 class="rooms-title font-bold">Популярные номера</h2>
      <room-list />
    </div>
  </section>
  <about-us />
  <section class="reviews">
    <div class="container">
      <h2 class="reviews-title font-bold">Отзывы</h2>
      <ReviewList />
    </div>
  </section>
</main>
</template>

<style scoped lang="scss">
.rooms{
  margin-bottom: 80px;
  &-title{
    font-size: 36px;
    margin-bottom: 40px;
  }
}
.reviews{
  &-title{
    font-size: 36px;
    margin-bottom: 40px;
  }
}
</style>