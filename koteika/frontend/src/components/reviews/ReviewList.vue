<script setup>
import {ReviewCard} from "@/components/index.js";
import { useReviewStore } from "@/stores/review.js";
import { storeToRefs } from "pinia";

const { reviewData } = storeToRefs(useReviewStore())

</script>

<template>
<ReviewCard

/>
</template>

<style scoped lang="scss">

</style>