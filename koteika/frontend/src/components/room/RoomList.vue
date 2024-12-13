<script setup>
import { RoomCard } from "@/components/index.js";
import {storeToRefs} from "pinia";
import {useRoomStore} from "@/stores/room.js";
import {computed} from "vue";
const { rooms } = storeToRefs(useRoomStore())

const props = defineProps({
  isMain: {
    type: Boolean,
    default: true
  }
})

const slicedRooms = computed(() => {
  if(props.isMain){
    return rooms.value.slice(0, 4)
  }
  else {
    return rooms.value
  }
})

</script>

<template>

<div class="room-list">
  <RoomCard
      v-for="room in slicedRooms"
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