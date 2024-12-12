<script setup>
import defaultAvatar from "@/assets/img/default-avatar.jpg"
import { StarIcon } from "@/components/icons";

const props = defineProps({
  email: {
    type: String,
    required: true
  },
  content: {
    type: String,
    required: true
  },
  rating: {
    type: Number,
    required: true
  },
  image: {
    type: String,
    default: null
  },
  translateValue: {
    type: Number,
    required: true
  }
})

</script>

<template>
<article class="review" :style="{translate: `${translateValue * 100}%`, transition: `${0.3}s` }">
  <div class="review-user-info">
    <img class="review-user-avatar" :src="image ?? defaultAvatar" alt="Дефолт аватарка">
    <p class="review-user-name">{{ email }}</p>
  </div>
  <p class="review-description">
    {{ content }}
  </p>
  <div class="reviews-rating">
    <StarIcon
        class="rating-star"
        v-for="star in rating" :key="star"/>
  </div>
</article>
</template>

<style scoped lang="scss">
.review{
  padding: 20px;
  box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.15);
  min-width: 560px;
  display: flex;
  flex-direction: column;
  gap: 20px;
  border-radius: 10px;
  justify-content: space-between;

  &-user-info{
    display: flex;
    gap: 20px;
    align-items: center;
  }
  &-user-avatar{
    width: 50px;
    border-radius: 100%;
  }
}
</style>