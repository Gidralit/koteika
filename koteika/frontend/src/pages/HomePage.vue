<script setup>
import {useMetaStore} from "@/stores/meta.js";
import {storeToRefs} from "pinia";
import {AppFooter, LandingBanner, ReviewList} from "@/components/index.js";
import { RoomList } from "@/components/index.js";
import { AboutUs } from "@/components/index.js";

</script>

<template>
<main>
  <LandingBanner />
  <section class="rooms">
    <div class="container">
      <h2 class="rooms-title font-bold">Популярные номера</h2>
      <RoomList />
    </div>
  </section>
  <AboutUs />
  <section class="reviews" id="reviews">
    <div class="container">
      <h2 class="reviews-title font-bold">Отзывы</h2>
      <ReviewList />
    </div>
  </section>
</main>
<footer>
  <AppFooter />
</footer>
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
  margin-bottom: 80px;
}
</style>