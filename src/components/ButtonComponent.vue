<template>
  <button class="shop-button" @click="shopNow">{{ text }}</button>
</template>

<script>
export default {
  name: 'ButtonComponent',
  props: {
    text: String,
    promotion: Object, // Accept promotion data as a prop
  },
  methods: {
    shopNow() {
      alert("Let's shop: " + this.promotion.title)
    },
  },
}
</script>

<style scoped>
.shop-button {
  background-color: #4caf50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 8px;
  font-size: 14px;
  cursor: pointer;
}
.shop-button:hover {
  background-color: #388e3c;
}
</style>
