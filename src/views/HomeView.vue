<template>
  <div id="app">
    <!-- 🔹 Featured Categories Header -->
    <HeaderComponent title="Featured Categories" />

    <!-- 🔹 Category Section -->
    <section class="categories">
      <Category
        v-for="cat in productStore.categories"
        :key="cat.id"
        :title="cat.name"
        :subtitle="`${cat.productCount} items`"
        :image="getImageUrl(cat.image)"
        :color="cat.color"
      />
    </section>

    <!-- 🔹 Promotion Section -->
    <section class="promotions">
      <Promotion
        v-for="promo in productStore.promotions"
        :key="promo.id"
        :title="promo.title"
        :image="getImageUrl(promo.image)"
        :bgColor="promo.color"
        :buttonText="promo.buttonText"
        :buttonColor="promo.buttonColor"
      />
    </section>

    <!-- 🔹 Featured Products Header with Filters -->
    <HeaderComponent title="Popular Products" :showFilters="true" />

    <!-- 🔹 Product Group Buttons (Optional) -->
    <section class="groups">
      <div
        class="group-card"
        v-for="grp in productStore.groups"
        :key="grp.id"
      >
        <h3>{{ grp.name }}</h3>
      </div>
    </section>

    <!-- 🔹 Products Grid -->
    <section class="products">
      <ProductCard 
        v-for="prod in productStore.filteredProducts" 
        :key="prod.id" 
        :product="prod" 
      />
    </section>
  </div>
</template>

<script setup lang="ts">
import Category from "../components/CategoryComponent.vue"
import Promotion from "../components/PromotionComponent.vue"
import HeaderComponent from "../components/HeaderComponent.vue"
import ProductCard from "../components/ProductCard.vue"

import { onMounted } from "vue"
import { useProductStore } from "../stores/product"

const productStore = useProductStore()

const API_BASE_URL = "http://localhost:3000"
const getImageUrl = (imagePath: string | undefined) => {
  if (!imagePath){ return "https://via.placeholder.com/300x200?text=No+Image" }
  if (imagePath.startsWith("http")){ return imagePath }
  return `${API_BASE_URL}/${imagePath.replace(/^\//, "")}`
}

onMounted(async () => {
  await productStore.loadAllData()
  productStore.filterProducts("All")
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
  margin-bottom: 40px;
  
}

.groups {
  display: flex;
  gap: 15px;
  margin: 0px 5px;
  
}

/* .group-card {
  padding: 10px 20px;
  background-color: #f5f5f5;
  border-radius: 8px;
  font-weight: bold;
} */

.products {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(245px, 1fr));
  gap: 51px;
  margin-top: 10px;
  
}
</style>
