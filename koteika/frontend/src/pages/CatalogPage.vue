<script setup>

import {RoomList} from "@/components/index.js";
</script>

<template>
  <section class="catalog">
    <div class="container">
      <h2 class="catalog-title">Каталог</h2>
      <aside class="">

      </aside>
      <RoomList />
    </div>
  </section>
</template>

<style scoped lang="scss">
.catalog{
  &-title{
    font-size: 36px;
    padding: 38px 0;
  }
}
</style>