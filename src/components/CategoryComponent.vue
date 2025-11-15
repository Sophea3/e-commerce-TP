<template>
  <div class="category" :style="{ backgroundColor: color }">
    <img :src="image" alt="Category images" />
    <h3>{{ title }}</h3>
    <p>{{ subtitle }}</p>
  </div>
</template>

<script lang="ts">
// defineProps({
//   title: String,
//   subtitle: String,
//   image: String,
//   color: String
// });
export default {
  name: 'CategoryComponent',
  props: {
    title: {
      type: String,
      required: true
    },
    subtitle: {
      type: String,
      required: true
    },
    image: {
      type: String,
      required: true
    },
    color: {
      type: String,
      required: true
    }
  }
}
</script>

<style scoped>
.category {
  padding: 12px;
  border-radius: 12px;
  color: #253D4E;
  text-align: center;
  width: 100px;
}
.category img {
  width: 100%;
  height: 70px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 0px;
}
</style>
