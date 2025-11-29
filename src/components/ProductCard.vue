<template>
  <div class="product-card">
    <!-- BADGE -->
    <div v-if="badgeText" class="badge" :class="badgeColor">
      {{ badgeText }}
    </div>

    <!-- IMAGE -->
    <img :src="image" class="product-img" />

    <div class="info">
      <p class="brand">{{ product.brand }}Hado Foods</p>
      <h3 class="title">{{ product.name }}</h3>

      <!-- RATING -->
      <div class="rating">
        <i 
          v-for="n in 5" 
          :key="n"
          :class="n <= Math.floor(product.rating) ? 'fas fa-star filled' : 'far fa-star empty'"
        ></i>
        <span class="rating-number">({{ product.rating.toFixed(1) }})</span>
      </div>

      <p class="size">{{ product.size }}</p>
      <p class="weight">{{ product.weight ? product.weight + ' gram' : '500 gram' }}</p>

      <p class="isHot" v-if="product.isHot">Hot</p>
      <p class="isSale" v-if="product.isSale">Sale</p>

      <!-- PRICE + ADD BUTTON -->
      <div class="price-add-row">
        <div class="price-row">
          <span class="new-price">${{ product.price?.toFixed(2) }}</span>
          <span v-if="finalOldPrice" class="old-price">${{ finalOldPrice }}</span>
        </div>
        <button class="btn-add" @click="addToCart">Add +</button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue"

const props = defineProps<{
  product: {
    id?: number
    name: string
    brand?: string
    rating?: number
    size?: string
    price?: number
    promotionAsPercentage?: number
    isHot?: boolean
    isSale?: boolean
    image?: string
    weight?: number
    oldPrice?: number
  }
}>()

const API_BASE_URL = "http://localhost:3000"

function normalizeImagePath(img?: string) {
  if (!img) return null
  try {
    const arr = JSON.parse(img)
    return arr[0].replace(/\\/g, "/")
  } catch {
    return img.replace(/\\/g, "/")
  }
}

const image = computed(() => {
  const clean = normalizeImagePath(props.product.image)
  if (!clean) return "https://via.placeholder.com/300x200?text=No+Image"
  if (clean.startsWith("http")) return clean
  return `${API_BASE_URL}/${clean}`
})

const badgeText = computed(() => {
  if (props.product.promotionAsPercentage)
    return `-${props.product.promotionAsPercentage}%`
  if (props.product.isHot) return "Hot"
  if (props.product.isSale) return "Sale"
  return null
})

const badgeColor = computed(() => {
  if (props.product.promotionAsPercentage) return "green"
  if (props.product.isHot) return "red"
  if (props.product.isSale) return "yellow"
  return ""
})

const finalOldPrice = computed(() => {
  // Prefer backend oldPrice if available
  if (props.product.oldPrice !== undefined && props.product.oldPrice !== null) {
    return props.product.oldPrice;
  }

  // Always generate an old price (example: +20%)
  const price = props.product.price;
  return (price * 1.116).toFixed(2);
});


function addToCart() {
  console.log("Added to cart:", props.product.name)
}
</script>

<style scoped>
.product-card {
  width: 225px;
  padding: 30px;
  border: 1px solid #10b981;
  border-radius: 14px;
  background: white;
  position: relative;
  transition: 0.25s ease-in-out;
}
.product-card:hover {
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
  transform: translateY(-3px);
}

/* BADGES */
.badge {
  position: absolute;
  top: 12px;
  left: 12px;
  padding: 4px 12px;
  color: white;
  font-weight: bold;
  border-radius: 8px;
  font-size: 14px;
}
.badge.green { background: #10b981; }
.badge.red { background: #ef4444; }
.badge.yellow { background: #fbbf24; }

/* IMAGE */
.product-img {
  width: 180px;
  height: 160px;
  object-fit: contain;
  margin: 10px auto;
  display: block;
}

/* INFO */
.brand {
  font-size: 12px;
  color: #6b7280;
}
.title {
  font-size: 15px;
  font-weight: 600;
  margin-top: 5px;
}

/* RATING */
.rating {
  display: flex;
  align-items: center;
  gap: 3px;
  margin: 6px 0;
}
.filled { color: #f6ad55; }
.empty { color: #d1d5db; }
.rating-number {
  margin-left: 6px;
  color: #6b7280;
  font-size: 13px;
}

/* SIZES & PRICES */
.size, .weight {
  color: #6b7280;
  font-size: 13px;
}
.price-row {
  display: flex;
  align-items: center;
  gap: 10px;
}
.new-price {
  font-size: 20px;
  font-weight: bold;
  color: #10b981;
}
.old-price {
  text-decoration: line-through;
  font-size: 14px;
  color: #9ca3af;
}

/* PRICE + ADD BUTTON ROW */
.price-add-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 8px;
}

/* ADD BUTTON */
.btn-add {
  background: #3BB77E;
  color: white;
  font-weight: bold;
  padding: 8px 14px;
  border-radius: 8px;
  border: none;
  cursor: pointer;
}
.btn-add:hover {
  background: #2ca76a;
}
.rating i {
  font-family: "Font Awesome 6 Free";
  font-weight: 900;
  font-size: 16px;
}
</style>
