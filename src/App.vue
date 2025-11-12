<template>
  <div id="app">
    <!-- Category Section -->
    <section class="categories">
      <Category
        v-for="(cat, index) in categories"
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
        v-for="(promo, index) in promotions"
        :key="index"
        :title="promo.title"
        :image="getImageUrl(promo.image)"
        :bgColor="promo.color"
        :buttonText="promo.buttonText"
        :buttonColor="promo.buttonColor"
      />
    </section>
  </div>
</template>

<script setup lang="ts">
import Category from './components/CategoryComponent.vue'
import axios from 'axios'
import { ref, onMounted, defineAsyncComponent } from 'vue'
const Promotion = defineAsyncComponent(() => import('./components/PromotionComponent.vue'))

// Define types
interface Category {
  id?: number
  name: string
  url: string
  productCount: number
  color: string
  image: string
}

interface Promotion {
  id: number
  title: string
  color: string
  image: string
  url: string
  buttonText: string
  buttonColor: string
}

// Reactive variables
const categories = ref<Category[]>([])
const promotions = ref<Promotion[]>([])

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

const fetchProducts = async () => {
  try {
    const response = await axios.get<Category[]>('http://localhost:3000/api/categories')
    console.log('Categories API Response:', response.data)
    categories.value = response.data
  } catch (error) {
    console.error('Error fetching products:', error)
  }
}

const fetchPromotions = async () => {
  try {
    const response = await axios.get<Promotion[]>('http://localhost:3000/api/promotions')
    console.log('Promotions API Response:', response.data)
    promotions.value = response.data
  } catch (error) {
    console.error('Error fetching promotions:', error)
  }
}

onMounted(() => {
  fetchProducts()
  fetchPromotions()
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
  height: auto;
}
.promotions {
  display: flex;
  flex-direction: row;
  gap: 5px;
}
h1 {
  text-align: center;
  margin-bottom: 20px;
}
</style>
