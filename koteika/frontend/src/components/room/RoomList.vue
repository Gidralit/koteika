<script setup>
import { RoomCard } from "@/components/index.js";
import {storeToRefs} from "pinia";
import {useRoomStore} from "@/stores/room.js";
const { rooms } = storeToRefs(useRoomStore())

</script>

<template>

<div class="room-list">
  <RoomCard
      v-for="room in rooms.splice(0, 4)"
      :key="room"
      v-bind="room"
  />
</div>
</template>

<style scoped lang="scss">
.room-list{
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 20px;
}
</style>