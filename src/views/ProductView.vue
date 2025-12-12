<template>
  <div class="product">
    <!-- 🔹 Search Bar -->
    <SearchBoxComponent />

    <!-- 🔹 Top Menu Bar (banner hidden) -->
    <MenuItemComponent :showBanner="false" />

    <!-- 🔹 Breadcrumb -->
    <nav class="breadcrumb">
      <router-link to="/">Home</router-link> >
      <router-link :to="`/category/${product.category}`">{{ product.category }}</router-link> >
      <span>{{ product.name }}</span>
    </nav>

    <div class="product-container">
      <!-- LEFT: IMAGES + TABS -->
      <div class="product-images">
        <div class="image-wrapper">
          <img class="main-image zoom-image" :src="product.imageUrl" alt="Product Image" />
        </div>

        <div class="thumbs">
          <img v-for="(img, index) in product.gallery" :key="index" :src="img" class="thumb" alt="Gallery Image" />
        </div>

        <div class="tabs mt-4 flex gap-2">
          <button @click="activeTab = 'desc'" :class="activeTab === 'desc' ? 'tab-active' : 'tab'">Description</button>
          <button @click="activeTab = 'info'" :class="activeTab === 'info' ? 'tab-active' : 'tab'">Additional Info</button>
          <button @click="activeTab = 'reviews'" :class="activeTab === 'reviews' ? 'tab-active' : 'tab'">
            Reviews ({{ product.reviews.length }})
          </button>
        </div>

        <div class="mt-3">
          <p v-if="activeTab === 'desc'">{{ product.description }}</p>
          <p v-else-if="activeTab === 'info'">Weight: 500g | Organic | Gluten-Free</p>
          <ul v-else>
            <li v-for="(review, i) in product.reviews" :key="i">{{ review }}</li>
          </ul>
        </div>
      </div>

      <!-- RIGHT: PRODUCT INFO -->
      <div class="product-info">
        <p class="status">In Stock</p>
        <h1 class="title">{{ product.name }}</h1>

        <div class="rating">
          <span v-for="n in 5" :key="n">
            <i class="fa" :class="n <= Math.floor(product.rating) ? 'fa-star' : n - product.rating < 1 ? 'fa-star-half-o' : 'fa-star-o'"></i>
          </span>
          ({{ product.rating }})
        </div>

        <div class="price-rating">
          <span class="price">${{ product.price }}</span>
          <span class="old-price">${{ product.oldPrice }}</span>
        </div>

        <p class="mt-2">Delicious and nutritious organic quinoa. Perfect for healthy meals.</p>

        <div class="actions">
          <input class="input" type="number" v-model="quantity" min="1" />
          <button class="add-to-cart">Add To Cart</button>
          <button class="icon-btn"><i class="fa fa-heart"></i></button>
          <button class="icon-btn"><i class="fa fa-refresh"></i></button>
        </div>

        <p class="vendor">Vendor: {{ product.vendor }}</p>
        <p class="sku">SKU: {{ product.sku }}</p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useRoute } from "vue-router";
import SearchBoxComponent from "../components/SearchBoxComponent.vue";
import MenuItemComponent from "../components/MenuItemComponent.vue";


const route = useRoute();
const id = route.params.id as string;

const quantity = ref(1);
const activeTab = ref("desc");

const product = {
  id,
  category: "Organic-Food",
  name: "Seeds of Change Organic Quinoa, Brown",
  imageUrl: "/Image/18-1.png",
  gallery: ["/Image/4-1.png", "/Image/3-1.png", "/Image/7-1.png"],
  price: 38,
  oldPrice: 42,
  rating: 4.0,
  vendor: "NestMart",
  sku: "FWM15VKT",
  description: "Delicious and nutritious organic quinoa. Perfect for healthy meals and rich in protein.",
  reviews: ["Great taste!", "Healthy choice", "Bit pricey but worth it"]
};
</script>

<style scoped>
.product {
  padding: 20px;
}
.input {
  width: 60px;
  padding: 8px;
  border: 1px solid #86ec6c;
  border-radius: 6px;
  text-align: center;
  outline-color: #4caf50;
}
.product-container {
  display: flex;
  gap: 90px;
  padding: 30px;
}
.breadcrumb {
  font-size: 14px;
  margin-bottom: 15px;
  color: #555;
}
.breadcrumb a {
  color: #333;
  text-decoration: none;
  font-weight: 500;
}
.breadcrumb a:hover {
  text-decoration: underline;
}
.breadcrumb span {
  color: #4caf50;
  font-weight: 600;
}
.product-images {
  flex: 1;
}
.image-wrapper {
  overflow: hidden;
  border-radius: 8px;
}
.main-image {
  width: 100%;
  border-radius: 8px;
}
.zoom-image {
  transition: transform 0.35s ease;
}
.zoom-image:hover {
  transform: scale(1.5);
  cursor: zoom-in;
}
.thumbs {
  display: flex;
  gap: 10px;
  margin-top: 10px;
}
.thumb {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 6px;
  cursor: pointer;
}
.tab {
  padding: 8px 12px;
  background: #fff;
  color: #444;
  border-radius: 6px;
  cursor: pointer;
  border: none;
  outline: none;
}
.tab-active {
  background: #4caf50;
  color: white;
  padding: 8px 12px;
  border-radius: 6px;
  border: none;
  outline: none;
}
.product-info {
  flex: 2;
}
.title {
  font-size: 2rem;
  font-weight: bold;
}
.status {
  color: green;
  margin: 8px 0;
}
.price-rating {
  display: flex;
  gap: 15px;
  align-items: center;
  margin: 10px 0;
}
.price {
  font-size: 1.5rem;
  font-weight: bold;
  color: #4caf50;
}
.old-price {
  text-decoration: line-through;
  color: #999;
}
.rating {
  font-size: 1.2rem;
  color: #ff9800;
  margin: 6px 0;
}
.actions {
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 25px 0;
}
.add-to-cart {
  padding: 10px 20px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
}
.icon-btn {
  width: 40px;
  height: 40px;
  border-radius: 6px;
  border: 1px solid #ddd;
  background: white;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 18px;
  color: #4caf50;
  transition: 0.2s;
}
.icon-btn:hover {
  background: #4caf50;
  color: white;
}
.vendor,
.sku {
  color: #555;
  margin: 6px 0;
}
</style>
