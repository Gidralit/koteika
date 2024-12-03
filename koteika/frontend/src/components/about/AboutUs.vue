<script setup>
import {useMetaStore} from "@/stores/meta.js";
import {storeToRefs} from "pinia";
import { TGIcon, VKIcon, WAIcon } from "@/components/icons";

const { contactsData } = storeToRefs(useMetaStore())
</script>

<template>
  <section class="about-us">
    <div class="container">
      <h2 class="about-us__title font-bold">О нас</h2>
      <div class="about-us-block">
        <div class="about-us__img">
          <img src="@/assets/img/about-us-cat.png" alt="Картинка о нас">
        </div>
        <div class="about-us-content">
          <div class="about-us__content-top">
            <h3 class="about-us__subtitle">Добро пожаловать в отель для животных "Котейка"!</h3>
            <p class="about-us__description">
              В нашем отеле ваши любимцы найдут идеальное место для отдыха и развлечений, пока вы находитесь вдали.
              Мы предлагаем комфортные номера, внимание квалифицированного персонала и множество
              возможностей для активного времяпрепровождения.
            </p>
          </div>
          <div class="about-us__contacts">
            <h3 class="about-us__contacts-title font-bold">Контакты</h3>
            <p class="about-us__contacts-description">
              Мы всегда рады помочь вам и ответить на любые вопросы!
              Свяжитесь с нами, чтобы узнать больше о наших услугах
              или забронировать номер для вашего питомца.
            </p>
            <p class="about-us__contacts-address">Адрес: {{ contactsData.address }}</p>
            <p class="about-us__contacts-phone">Телефон: {{ contactsData.phone }}</p>
            <p class="about-us__contacts-email">Электронная почта: {{ contactsData.email }}</p>
            <p class="about-us__work-time">Часы работы:</p>
            <p class="opening-hours">Пн - Вс: {{ contactsData.worksWith }} - {{ contactsData.worksUntil }}</p>
            <div class="social">
              <a :href="contactsData.link_to_vk"><VKIcon /></a>
              <a :href="contactsData.link_to_telegram"><TGIcon /></a>
              <a :href="contactsData.link_to_instagram"><WAIcon /></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped lang="scss">
.about-us{
  &__title{
    font-size: 36px;
    margin-bottom: 40px;
  }
  &-block{
    display: flex;
  }
  &-content{
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
  &__content-top{
    box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.15);
    padding: 34px 37px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    border-radius: 10px;
  }
  &__subtitle{
    font-size: 31px;
  }
  &__description{
    font-size: 20px;
  }

  &__contacts{
    padding: 34px 37px;
    box-shadow: 0 10px 15px 0 rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    gap: 20px;

    &-title{
      font-size: 32px;
    }
    &-description{
      font-size: 20px;
    }
    &-phone, &-email{
      font-size: 24px;
    }
  }
  &__work-time{
    font-size: 24px;
  }
  .opening-hours{
    display: flex;
    flex-direction: column;
    gap: 10px;
    & > p{
      font-size: 20px;
    }
  }
  .social{
    display: flex;
    gap: 20px;
  }
}
</style>