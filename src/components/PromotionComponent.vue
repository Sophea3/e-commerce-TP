<template>
  <div class="promo-box" :style="{ backgroundColor: bgColor }">
    <div class="promo-text">
      <h2>{{ title }}</h2>
      <p>{{ subtitle }}</p>
      <slot></slot>
    </div>
    <img :src="image" alt="promo image" />
  </div>
</template>

<script>
export default {
  name: 'PromotionComponent',
  props: {
    title: String,
    subtitle: String,
    image: String,
    bgColor: {
      type: String,
      default: '#f9f9f9',
    },
  },
}
</script>

<style scoped>
.promo-box {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 20px;
  padding: 24px;
  border-radius: 16px;
  margin-bottom: 20px;
  font-family: 'Inter', sans-serif;
}

.promo-text {
  flex: 1;
}

.promo-text h2 {
  font-size: 20px;
  margin-bottom: 8px;
}

.promo-text p {
  font-size: 14px;
  color: #555;
}

.promo-box img {
  width: 120px;
  height: auto;
  border-radius: 12px;
}
</style>
