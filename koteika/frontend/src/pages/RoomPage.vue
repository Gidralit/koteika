<script setup>
import defaultPhoto from "@/assets/img/default-img.jpg";
import {useRoute} from "vue-router";
import {onMounted} from "vue";
import {useRoomStore} from "@/stores/room.js";
import {storeToRefs} from "pinia";
const route = useRoute()

const { getOneRoom } = useRoomStore()
const { oneRoom } = storeToRefs(useRoomStore())

console.log(route.params.id)

onMounted(() => {
  getOneRoom()
})
</script>

<template>
  <section class="room">
    <div class="container">
      <div class="room-block">
        <div class="room-images">
          <img class="room-main-image" :src="`${oneRoom.photos.photo_path1 || defaultPhoto }`" alt="Главная картинка">
        </div>
        <div class="room-info">
          <h3 class="room-title">{{oneRoom.name}}</h3>
          <div class="room-equipment">
            <p>Когтеточка</p>
            <p>Лоток</p>
          </div>
          <p>Цена за сутки: 1234р</p>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped lang="scss">

</style>