<script setup>
import {useCounterStore} from "@/stores/counter.js";
import {storeToRefs} from "pinia";

const { increment } = useCounterStore()
const { count, doubleCount } = storeToRefs(useCounterStore())
</script>

<template>
  <div>
    <p>{{count}}</p>
    <p>{{doubleCount}}</p>
    <button @click="increment">sdffs</button>
  </div>
</template>

<style scoped>

</style>