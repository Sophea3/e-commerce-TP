<template>
  <div 
    class="category" 
    :style="{ backgroundColor: color }"
    @click="goToCategory"
  >
    <img :src="image" alt="Category image" />
    <h3>{{ title }}</h3>
    <p>{{ subtitle }}</p>
  </div>
</template>

<script lang="ts">
export default {
  name: "CategoryComponent",
  props: {
    title: { type: String, required: true },
    subtitle: { type: String, required: true },
    image: { type: String, required: true },
    color: { type: String, required: true }
  },

  methods: {
    goToCategory() {
      this.$router.push({
        name: "CategoryView",
          params: { categoryId: encodeURIComponent(this.title) }
      });
    }
  }
};
</script>

<style scoped>
.category {
  padding: 16px;
  border-radius: 12px;
  color: #253D4E;
  text-align: center;
  width: 100px;
  cursor: pointer; /* Make it clickable */
  transition: 0.2s;
}

.category:hover {
  transform: scale(1.05);
}

.category img {
  width: 100%;
  height: 70px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 0px;
}
</style>
