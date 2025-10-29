<template>
  <div class="category-card" :style="{ backgroundColor: bgColor }">
    <img :src="image" alt="category image" />
    <h3>{{ title }}</h3>
    <p>{{ items }} items</p>
  </div>
</template>

<script>
export default {
  name: 'CategoryComponent',
  props: {
    title: String,
    items: Number,
    image: String,
    bgColor: {
      type: String,
      default: '#ffffff',
    },
  },
}
</script>

<style scoped>
.category-card {
  width: 140px;
  padding: 12px;
  border-radius: 12px;
  background-color: #fff;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  text-align: center;
  font-family: 'Inter', sans-serif;
}
.category-card img {
  width: 100%;
  height: auto;
  border-radius: 8px;
  margin-bottom: 8px;
}
.category-card h3 {
  font-size: 14px;
  margin: 4px 0;
}
.category-card p {
  font-size: 12px;
  color: #777;
}
</style>
