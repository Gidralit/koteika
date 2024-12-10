<script setup>

import {RoomList} from "@/components/index.js";
</script>

<template>
  <section class="catalog">
    <div class="container">
      <h2 class="catalog-title">Каталог</h2>
      <div class="catalog-block">
        <aside class="filter">
          <div class="filter-field">
            <h3 class="filter-field__title font-bold">Цена</h3>
            <div class="filter-field__block">
              <div class="filter-by-price">
                <label class="filter-price-label font-bold" for="from">от</label>
                <input class="filter-input font-regular" id="from" type="number" placeholder="10р">
              </div>
              <div class="filter-by-price">
                <label class="filter-label font-bold" for="to">до</label>
                <input class="filter-input font-regular" id="to" type="number" placeholder="30р">
              </div>
            </div>
          </div>
          <div class="filter-field">
            <h3 class="filter-field__title font-bold">Площадь</h3>
            <select class="filter-select font-bold" name="" id="">
              <option class="filter-option font-bold" value="16 кв.м">16кв</option>
              <option class="filter-option font-bold" value="16 кв.м">16кв</option>
              <option class="filter-option font-bold" value="16 кв.м">16кв</option>
              <option class="filter-option font-bold" value="16 кв.м">16кв</option>
            </select>
          </div>
          <div class="filter-field">
            <h3 class="filter-field__title font-bold">Оснащение</h3>
            <div class="filter-equipment">
              <div class="filter-equipment__items">
                <input id="equipment" type="checkbox">
                <label for="equipment">Когтеточка</label>
              </div>
              <div class="filter-equipment__items">
                <input id="equipment1" type="checkbox">
                <label for="equipment1">Когтеточка</label>
              </div>
              <div class="filter-equipment__items">
                <input id="equipment2" type="checkbox">
                <label for="equipment2">Когтеточка</label>
              </div>
              <div class="filter-equipment__items">
                <input id="equipment3" type="checkbox">
                <label for="equipment3">Когтеточка</label>
              </div>
              <div class="filter-equipment__items">
                <input id="equipment4" type="checkbox">
                <label for="equipment4">Когтеточка</label>
              </div>
              <div class="filter-equipment__items">
                <input id="equipment5" type="checkbox">
                <label for="equipment5">Когтеточка</label>
              </div>
            </div>
          </div>
          <div class="filter-btn">
            <button class="filter-btn__orange font-regular">Применить</button>
            <button class="filter-btn__grey font-regular">Сбросить фильтр</button>
          </div>
        </aside>
        <RoomList :is-main="false" />
      </div>
    </div>
  </section>
</template>

<style scoped lang="scss">
.catalog{
  &-title{
    font-size: 36px;
    padding: 38px 0;
  }

  &-block{
    display: grid;
    grid-template-columns: 415px 1fr;
    gap: 20px;
  }

  .filter{
    box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    height: fit-content;
    padding: 30px;
    display: flex;
    flex-direction: column;
    gap: 40px;

    &-field{
      display: flex;
      flex-direction: column;
      gap: 20px;

      &__title{
        font-size: 20px;
      }
      &__block{
        display: flex;
        gap: 20px;
      }
    }

    &-by-price{
      display: flex;
      gap: 10px;
      align-items: center;
    }
    &-input{
      border: 1px solid #999999;
      border-radius: 5px;
      width: 132px;
      height: 30px;
      padding-left: 5px;
    }

    &-select{
      padding: 11px 16px;
      border-radius: 5px;
      border: 1px solid #999999;
      font-size: 16px;
    }
    &-option{
      font-size: 16px;
    }
    &-equipment{
      display: flex;
      flex-direction: column;
      gap: 15px;
      max-height: 150px;
      overflow-y: scroll;

      &__items{
        display: flex;
        gap: 10px;
        align-items: center;
      }
    }
    &-btn{
      display: flex;
      flex-direction: column;
      gap: 10px;

      &__orange{
        border: none;
        background: var(--main-accent);
        font-size: 16px;
        padding: 12px 0;
        border-radius: 5px;
      }

      &__grey{
        border: none;
        background: #C8C8C8;
        font-size: 16px;
        padding: 12px 0;
        border-radius: 5px;
      }
    }
  }
}
</style>