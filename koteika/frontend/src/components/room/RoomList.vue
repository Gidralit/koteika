<script setup>

import {RoomCard} from "@/components/index.js";
</script>

<template>

<section class="room-list">
  <RoomCard
      v-for="room in 4"
      :key="room"

  />
</section>
</template>

<style scoped lang="scss">
.room-list{
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 20px;
}
</style>