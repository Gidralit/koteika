<script setup>
import {ReviewCard} from "@/components/index.js";
import { useReviewStore } from "@/stores/review.js";
import { storeToRefs } from "pinia";

const { reviewsData } = storeToRefs(useReviewStore())

</script>

<template>
<section class="reviews">
  <ReviewCard
      v-for="review in reviewsData"
      :key="review"
      :email="review.email"
      :content="review.content"
      :image="review.image"
      :rating="review.rating"
  />
</section>
</template>

<style scoped lang="scss">
.reviews{
  display: flex;
  overflow: hidden;
  flex-wrap: nowrap;
  gap: 20px;
}
</style>