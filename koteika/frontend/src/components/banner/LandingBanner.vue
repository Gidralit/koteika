<script setup>

</script>

<template>
<section class="banner">
  <div class="container">
    <article class="banner-inner">
      <div class="banner-text">
        <h1 class="banner-title">Путешествуйте, <br>не беспокоясь о питомце!</h1>
        <p class="banner-description">Забронируйте комфортное место для вашего четвероногого друга!</p>
      </div>
      <button class="banner-btn font-bold">Забронировать номер</button>
    </article>
  </div>
</section>
</template>

<style scoped lang="scss">
.banner{
  min-height: 700px;
  background: url("@/assets/img/landing-banner-image.png") no-repeat center;
  background-size: cover;
  display: flex;
  margin-bottom: 80px;

  & > .container{
    display: flex;
    flex: 1;
  }

  &-title{
    font-size: 36px;
  }

  &-description{
    max-width: 420px;
  }

  &-inner{
    display: flex;
    flex-direction: column;
    gap: 40px;
    align-items: flex-start;
    justify-content: center;
    padding-left: 125px;
  }

  &-text{
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  &-btn{
    padding: 17px 52px;
    border: none;
    background: var(--main-accent);
    border-radius: 15px;
    font-size: 16px;
  }
}
</style>