<script setup>
import {useMetaStore} from "@/stores/meta.js";
import {storeToRefs} from "pinia";
import { LandingBanner } from "@/components/index.js";
import { RoomList } from "@/components/index.js";
import { AboutUs } from "@/components/index.js";

</script>

<template>
<main>
  <landing-banner />
  <room-list />
  <about-us />
</main>
</template>

<style scoped>

</style>