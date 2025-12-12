<template>
  <div>
    <!-- Menu Bar -->
    <nav class="menu-bar">
      <!-- Left "Browse All Categories" Dropdown -->
      <div class="browse-btn">
        📂 Browse All Categories
      </div>

      <!-- Center Menu Items -->
      <ul class="menu-links">
        <li>Hot Deals</li>
        <li>Home</li>
        <li>Food</li>
        <li>Vegetables</li>
        <li>Drink</li>
        <li>Cookies</li>
        <li>Meat & Seafood</li>
        <li>Bakery</li>
      </ul>

      <!-- Right Contact -->
      <div class="contact">
        📞 099 777 888  
        <span class="small-text">24/7 Support Center</span>
      </div>
    </nav>

    <!-- Newsletter Banner -->
    <div v-if="showBanner" class="newsletter-banner">
      <div class="banner-content">
        <h2>Don’t miss amazing grocery deals.</h2>
        <p>Sign up for the daily newsletter.</p>
        <div class="subscribe-form">
          <input type="email" placeholder="Your email address" />
          <button>Subscribe</button>
        </div>
      </div>
      <div class="banner-image">
        <img src="/public/Image/banner.png" alt="Grocery bag with apples" />
      </div>
    </div>
  </div>
</template>
<script lang="ts">
export default {
  name: "MenuItemComponent",
  props: {
    showBanner: {
      type: Boolean,
      default: true // Banner shows by default
    }
  }
};
</script>
<style scoped>
.menu-bar {
  width: 100%;
  display: flex;
  padding: 10px 0px;
  align-items: center;
  justify-content: space-between;
  background: white;
  border-bottom: 1px solid #eee;
}

.browse-btn {
  background: #3bb77e;
  color: white;
  padding: 10px 14px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 600;
}

.menu-links {
  display: flex;
  list-style: none;
  gap: 25px;
  font-size: 15px;
  color: #333;
}

.menu-links li {
  cursor: pointer;
}

.menu-links li:hover {
  color: #3bb77e;
}

.contact {
  text-align: right;
  font-size: 16px;
  color: #3bb77e;
  font-weight: bold;
}

.small-text {
  display: block;
  font-size: 12px;
  color: #777;
  font-weight: normal;
}

/* Newsletter Banner Styles */
.newsletter-banner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f5f0e6;
  padding: 20px;
  margin-top: 20px;
  border-radius: 20px;
  width: 100%;
  height: 400px;
  padding: 10px 0px;
}

.banner-content {
  max-width: 60%;
  padding: 80px;       /* space inside content block */
  box-sizing: border-box;
  font-family: Quicksand, sans-serif;
  font-size: 40px;
  color: #253D4E;
  
}

.subscribe-form {
  margin-top: 10px;
  margin-left:10px;
  margin-right: 10px;
  margin-bottom:20px;
  padding:15px;
}

.subscribe-form input {
  padding: 8px;
  margin-right: 10px;
  border: 1px solid #ccc;
  border-radius: 20px;
}

.subscribe-form button {
  background-color: #3bb77e;
  color: white;
  padding: 8px 16px;
  border: none;
  border-radius: 15px;
  cursor: pointer;
}

.banner-image img {
  height: 400px;
  width: 100%;
}
</style>
