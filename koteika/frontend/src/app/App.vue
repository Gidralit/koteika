<script setup>
import {AppHeader} from "@/components/index.js";
import {useRoute} from "vue-router";
import {useMetaStore} from "@/stores/meta.js";
import {onMounted, ref} from "vue";
import {useReviewStore} from "@/stores/review.js";
import { useRoomStore } from "@/stores/room.js";
import {useProfileStore} from "@/stores/profile.js";

const route = useRoute();
const { getHeader, getContacts } = useMetaStore()
const { getReviews } = useReviewStore()
const { getRoom } = useRoomStore()

const isLoading = ref(true)

onMounted(async () => {
  await Promise.all([getHeader(), getContacts(), getReviews(), getRoom()])
  isLoading.value = false
})

</script>

<template>
  <template v-if="!isLoading">
    <AppHeader />
    <RouterView />
  </template>
  <template v-else>
    <div class="loader-block">
      <span class="loader"></span>
    </div>
  </template>
</template>

<style lang="scss">
#app{
  min-height: 100vh;
  display: grid;
  grid-template-rows: auto 1fr;
}

.loader-block{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
.loader {
  width: 300px;
  height: 300px;
  position: relative;
}
.loader:before , .loader:after {
  content: "";
  position: absolute;
  right: 0;
  top: 0;
  width: 300px;
  height: 300px;
  background: url("@/assets/img/paw.svg") no-repeat;
  animation: push 1s infinite linear alternate;
}
.loader:after {
  top: auto;
  bottom: 0;
  left: 120px;
  background: url("@/assets/img/paw.svg") no-repeat;
  rotate: 15deg;
  animation-direction: alternate-reverse;
}
@keyframes push {
  0% {
    transform: scale(0.7);
  }
  100% {
    transform: scale(1.5);
  }
}

</style>
