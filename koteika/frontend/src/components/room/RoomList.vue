<script setup>

import {RoomCard} from "@/components/index.js";
</script>

<template>
<section class="room-list">
  <div class="container">
    <h2 class="room-list-title font-bold">Популярные номера</h2>
    <RoomCard />
  </div>
</section>
</template>

<style scoped lang="scss">
.room-list{
  margin-bottom: 80px;
  &-title{
    font-size: 36px;
    margin-bottom: 40px;
  }
}
</style>