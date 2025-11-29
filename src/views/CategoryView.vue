<template>
  <div class="category">
    <h1>Category Page</h1>
    <p>This is where your product categories will be displayed.</p>

    <!-- Example category list -->
    <ul>
      <li>Fruits</li>
      <li>Vegetables</li>
      <li>Spices</li>
      <li>Snacks</li>
    </ul>
  </div>
</template>

<script lang="ts">
export default {
  name: "CategoryView",
};
</script>

<style scoped>
.category {
  padding: 20px;
}
.category h1 {
  color: #42b983;
}
</style>
