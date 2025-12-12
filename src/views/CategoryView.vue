<template>
  <div class="category-page">
    <!-- Search Box -->
    <SearchBoxComponent />

    <!-- Top Menu Bar (banner hidden here) -->
    <MenuItemComponent :showBanner="false" />

    <!-- Category Title -->
   <section class="category-header">
    <h2 class="category-title">{{ categoryId }}</h2>
    <div class="breadcrumb">
    <p>Home > Categories > {{ categoryId }}</p>
    </div>
 
  </section>


    <!-- Product Grid -->
    <section class="product-grid">
      <div v-for="(product, index) in products" :key="index" class="product-card">
        <img :src="product.image" alt="Product image" />
        <h3>{{ product.name }}</h3>
        <p>{{ product.description }}</p>
      </div>
    </section>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { useRoute } from 'vue-router';
import MenuItemComponent from '../components/MenuItemComponent.vue';
import SearchBoxComponent from '../components/SearchBoxComponent.vue';

export default defineComponent({
  name: 'CategoryView',
  components: {
    MenuItemComponent,
    SearchBoxComponent
  },
  setup() {
    const route = useRoute();
    const categoryId = decodeURIComponent(route.params.categoryId as string);

    // Example product data (add category field to match filtering)
    // const allProducts = [
    //   {
    //     id: 1,
    //     name: 'Coca-Cola',
    //     description: 'Refreshing soft drink',
    //     image: '/images/coke.jpg',
    //     category: 'Cake&Milk'
    //   },
    //   {
    //     id: 2,
    //     name: 'Fresh Milk',
    //     description: 'Organic dairy milk',
    //     image: '/images/milk.jpg',
    //     category: 'Cake&Milk'
    //   }
    // ];

    // const products = allProducts.filter(p => p.category === categoryId);

    return { categoryId };
  }
});
</script>

<style scoped>
.category-header {
  background-color: #e6f5ec; /* soft mint green */
  padding: 32px 24px;
  border-radius: 12px;
  margin: 24px;
  background-image: url('/Image/bg-leaves.png'); /* optional decorative background */
  background-repeat: no-repeat;
  background-position: right bottom;
  background-size: contain;
}

.breadcrumb {
  font-size: 14px;
  color: #777;
  margin-bottom: 8px;
}
.category-title {
  margin: 24px;
  font-size: 28px;
  font-weight: bold;
  color: #253D4E;
}
.product-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  padding: 0 24px 24px;
}
.product-card {
  width: 140px;
  border: 1px solid #eee;
  border-radius: 8px;
  padding: 12px;
  text-align: center;
}
.product-card img {
  width: 100%;
  height: 80px;
  object-fit: cover;
  border-radius: 6px;
}
</style>
