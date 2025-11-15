<template>
  <div id="app">
    <!-- Category Section -->
    <section class="categories">
      <Category
        v-for="(cat, index) in productStore.categories"
        :key="index"
        :title="cat.name"
        :subtitle="`${cat.productCount} items`"
        :image="getImageUrl(cat.image)"
        :color="cat.color"
      />
    </section>

    <!-- Promotion Section -->
    <section class="promotions">
      <Promotion
        v-for="(promo, index) in productStore.promotions"
        :key="index"
        :title="promo.title"
        :image="getImageUrl(promo.image)"
        :bgColor="promo.color"
        :buttonText="promo.buttonText"
        :buttonColor="promo.buttonColor"
      />
    </section>

    <section class="groups">
      <div
        class="group-card"
        v-for="grp in productStore.groups"
        :key="grp.id"
      >
        <h3>{{ grp.name }}</h3>
      </div>
    </section>

    <section class="products">
      <div
        class="product-card"
        v-for="prod in productStore.products"
        :key="prod.id"
      >
        <img :src="prod.image" alt="" />
        <h4>{{ prod.name }}</h4>
        <p>{{ prod.price }} USD</p>
      </div>
    </section>


  </div>
</template>

<script setup lang="ts">

import { onMounted } from 'vue'
import CategoryComponent from './components/CategoryComponent.vue'
import PromotionComponent from './components/PromotionComponent.vue'
import { useProductStore } from "@/stores/productStore"

const productStore = useProductStore()

const API_BASE_URL = 'http://localhost:3000'
const getImageUrl = (imagePath: string | undefined) => {
  if (!imagePath) {
    return 'https://via.placeholder.com/300x200?text=No+Image'
  }
  if (imagePath.startsWith('http')) {
    return imagePath
  }
  return `${API_BASE_URL}${imagePath.startsWith('/') ? '' : '/'}${imagePath}`
}

onMounted(async () => {
  await productStore.loadAllData()
})
</script>

<style scoped>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  padding: 20px;
}
.categories {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  margin-bottom: 40px;
  justify-content: center;
}
.promotions {
  display: flex;
  flex-direction: row;
  gap: 5px;
}
</style>
