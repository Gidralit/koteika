<script setup>
import {ReviewCard} from "@/components/index.js";
import { useReviewStore } from "@/stores/review.js";
import { storeToRefs } from "pinia";
import {ArrowLeftIcon, ArrowRightIcon} from "@/components/icons/index.js";
import {ref} from "vue";

const { reviewsData } = storeToRefs(useReviewStore())

const translateValue = ref(-1)

const arrowLeft = () => {
  if (translateValue.value < 0){
    translateValue.value++
  }
}
const arrowRight = () => {
  if (translateValue.value > -2 ){
    translateValue.value--
  }
}

</script>

<template>
<div class="review-list">
  <ReviewCard
      v-for="review in reviewsData"
      :key="review"
      :email="review.email"
      :content="review.content"
      :image="review.image"
      :rating="review.rating"
      :translateValue="translateValue"
  />
</div>
<div class="arrows">
  <div class="arrow-left" @click="arrowLeft">
    <ArrowLeftIcon />
  </div>
  <div class="arrow-right" @click="arrowRight">
    <ArrowRightIcon />
  </div>
</div>
</template>

<style scoped lang="scss">
.review-list{
  display: flex;
  flex-wrap: nowrap;
  gap: 20px;
  margin-bottom: 20px;
}
.arrows{
  display: flex;
  gap: 20px;
  justify-content: center;

  .arrow-left, .arrow-right{
    padding: 17px 20px;
    background: var(--main-accent);
    border-radius: 5px;
    cursor: pointer;
  }
}

</style>