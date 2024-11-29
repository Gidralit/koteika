<script setup>
import {useMetaStore} from "@/stores/meta.js";
import {storeToRefs} from "pinia";
import {LandingBanner} from "@/components/index.js";
import {RoomList} from "@/components/room/index.js";

</script>

<template>
<main>
  <landing-banner />
  <room-list />
</main>
</template>

<style scoped>

</style>