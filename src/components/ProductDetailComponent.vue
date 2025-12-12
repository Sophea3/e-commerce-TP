<template>
  <div class="product-detail">

    <!-- Product Name -->
    <h1 class="title">{{ product.name }}</h1>

    <!-- Rating -->
    <div class="rating-row">
      <span class="stars">⭐ ⭐ ⭐ ⭐ ⭐</span>
      <span class="reviews">(32 reviews)</span>
    </div>

    <!-- Price -->
    <div class="price-row">
      <span class="new-price">${{ product.price }}</span>
      <span class="old-price">${{ product.oldPrice }}</span>
    </div>

    <!-- Short Description -->
    <p class="short-desc">
      {{ product.shortDescription }}
    </p>

    <!-- Quantity + Add to Cart -->
    <div class="action-row">
      <div class="quantity-box">
        <button @click="decreaseQty">-</button>
        <span>{{ qty }}</span>
        <button @click="increaseQty">+</button>
      </div>

      <button class="add-cart-btn">
        Add To Cart
      </button>
    </div>

    <!-- Extra Info -->
    <div class="extra-info">
      <p><strong>SKU:</strong> {{ product.sku }}</p>
      <p><strong>Vendor:</strong> {{ product.vendor }}</p>
      <p><strong>Availability:</strong> In Stock</p>
    </div>

  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";

const props = defineProps({
  product: {
    type: Object,
    required: true
  }
});

const qty = ref(1);

const increaseQty = () => qty.value++;
const decreaseQty = () => {
  if (qty.value > 1) qty.value--;
};
</script>

<style scoped>
.product-detail {
  padding: 20px;
  max-width: 450px;
}

/* Title */
.title {
  font-size: 28px;
  font-weight: bold;
  margin-bottom: 15px;
  color: #1a1a1a;
}

/* Rating */
.rating-row {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 15px;
}

.stars {
  color: #ffcc00;
}

/* Prices */
.price-row {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 20px;
}

.new-price {
  font-size: 32px;
  color: #2ecc71;
  font-weight: 700;
}

.old-price {
  font-size: 18px;
  color: #888;
  text-decoration: line-through;
}

/* Description */
.short-desc {
  color: #444;
  margin-bottom: 25px;
  line-height: 1.5;
}

/* Quantity + Cart */
.action-row {
  display: flex;
  align-items: center;
  gap: 20px;
  margin-bottom: 25px;
}

.quantity-box {
  display: flex;
  border: 1px solid #ccc;
  border-radius: 8px;
  overflow: hidden;
}

.quantity-box button {
  padding: 10px 15px;
  background: #f7f7f7;
  border: none;
  cursor: pointer;
  font-size: 18px;
}

.quantity-box span {
  padding: 10px 20px;
  font-size: 18px;
  display: flex;
  align-items: center;
}

.add-cart-btn {
  background: #2ecc71;
  border: none;
  padding: 12px 25px;
  color: white;
  font-size: 16px;
  border-radius: 8px;
  cursor: pointer;
}

.add-cart-btn:hover {
  background: #28b765;
}

/* Extra info */
.extra-info {
  margin-top: 20px;
  font-size: 14px;
  color: #444;
}

.extra-info p {
  margin: 5px 0;
}
</style>
