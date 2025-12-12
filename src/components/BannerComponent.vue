<!-- BannerComponent.vue -->
<template>
  <div class="newsletter-banner">
    <div class="banner-content">
      <h2>Don’t miss amazing grocery deals.</h2>
      <p>Sign up for the daily newsletter.</p>
      <div class="subscribe-form">
        <input type="email" placeholder="Your email address" />
        <button>Subscribe</button>
      </div>
    </div>
    <div class="banner-image">
      <img src="/public/Image/Hero.png" alt="Grocery bag with apples" />
    </div>
  </div>
</template>

<script setup lang="ts">
    defineProps({
    title: {
    type: String,
    default: "Banner"
  }
});
</script>

<style scoped>
.newsletter-banner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f5f0e6;
  padding: 20px;
  border-radius: 8px;
}
.banner-content {
  max-width: 60%;
}
.subscribe-form {
  margin-top: 10px;
}
.subscribe-form input {
  padding: 8px;
  margin-right: 10px;
}
.subscribe-form button {
  background-color: #2e7d32;
  color: white;
  padding: 8px 16px;
  border: none;
  cursor: pointer;
}
.banner-image img {
  max-height: 120px;
}
</style>
