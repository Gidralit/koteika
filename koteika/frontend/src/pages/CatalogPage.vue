<script setup>
import {RoomList} from "@/components/index.js";
import {storeToRefs} from "pinia";
import {useRoomStore} from "@/stores/room.js";
import {onMounted} from "vue";

const { filters, initFilters, equipments, rooms } = storeToRefs(useRoomStore())
const { getRoom, getFilters, getEquipment, resetFilter } = useRoomStore()

onMounted(() => {
  getFilters()
  getEquipment()
})

</script>

<template>
  <section class="catalog">
    <div class="container">
      <div class="catalog-top">
        <h2 class="catalog-title">Каталог</h2>
        <select class="sorting-price font-regular" v-model="filters.order_by">
          <option value="desc">По убыванию</option>
          <option value="asc">По возрастанию</option>
        </select>
      </div>
      <div class="catalog-block">
        <aside class="filter">
          <div class="filter-field">
            <h3 class="filter-field__title font-bold">Цена</h3>
            <div class="filter-field__block">
              <div class="filter-by-price">
                <label class="filter-price-label font-bold" for="from">от</label>
                <input class="filter-input font-regular" v-model="filters.min_price" id="from" type="number" :placeholder="`${initFilters.min_price}р`">
              </div>
              <div class="filter-by-price">
                <label class="filter-label font-bold" for="to">до</label>
                <input class="filter-input font-regular" v-model="filters.max_price" id="to" type="number" :placeholder="`${initFilters.max_price}р`">
              </div>
            </div>
          </div>
          <div class="filter-field">
            <h3 class="filter-field__title font-bold">Площадь</h3>
            <select class="filter-select font-bold" v-model="filters.dimensions">
              <option class="filter-option font-bold" :value="size" v-for="size in initFilters.sizes">{{ size }} кв.м</option>
            </select>
          </div>
          <div class="filter-field">
            <h3 class="filter-field__title font-bold">Оснащение</h3>
            <div class="filter-equipment">
              <div class="filter-equipment__items" v-for="equipment in equipments">
                <input :id="`equipment-${equipment.name}`" type="checkbox" :value="equipment.name" v-model="filters.equipments_names">
                <label :for="`equipment-${equipment.name}`">{{ equipment.name }}</label>
              </div>
            </div>
          </div>
          <div class="filter-btn">
            <button class="filter-btn__orange font-regular" @click="getRoom()">Применить</button>
            <button class="filter-btn__grey font-regular" @click="resetFilter()">Сбросить фильтр</button>
          </div>
        </aside>
        <h3 class="nothing-found" v-if="!rooms.length">Ничего не найдено</h3>
        <RoomList :is-main="false" />
      </div>
    </div>
  </section>
</template>

<style scoped lang="scss">
.catalog{
  &-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

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
  .sorting-price{
    background: var(--main-green);
    border: none;
    padding: 12px 20px;
    color: white;
    border-radius: 5px;
    cursor: pointer;
  }
  .nothing-found{
    font-size: 32px;
    text-align: center;
  }
}
</style>