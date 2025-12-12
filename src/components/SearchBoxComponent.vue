<template>
  <header class="search-header">

    <!-- Left Logo -->
    <div class="logo">
      <img src="/public/Image/Logo.png" alt="Logo" />
      
    </div>

    <!-- Category + Search Box -->
    <div class="search-area">
      <select class="category-select">
        <option>All Categories</option>
        <option>Vegetables</option>
        <option>Fruits</option>
        <option>Drinks</option>
      </select>

      <input type="text" class="search-input" placeholder="Search for items..." />

      <button class="search-btn">
        🔍
      </button>
    </div>

    <!-- Right Icons -->
    <div class="right-icons">
      <a class="icon">👤 Account</a>
      <a class="icon">🔄 Compare</a>
      <a class="icon">❤️ Wishlist</a>
      <a class="icon">🛒 Cart</a>
    </div>

  </header>
</template>

<style scoped>
.search-header {
  width: 100%;
  display: flex;
  padding: 10px 0px;
  align-items: center;
  justify-content: space-between;
  background: white;
  border-bottom: 1px solid #eee;
}

.logo {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 22px;
  font-weight: 700;
  color: #2b2b2b;
}

.search-area {
  display: flex;
  width: 45%;
  align-items: center;
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
}

.category-select {
  padding: 10px;
  border: none;
  background: #f7f7f7;
}

.search-input {
  flex: 1;
  padding: 10px 14px;
  border: none;
}

.search-btn {
  background: #3bb77e;
  color: white;
  border: none;
  padding: 10px 16px;
  cursor: pointer;
}

.right-icons {
  display: flex;
  align-items: center;
  gap: 20px;
}

.icon {
  font-size: 15px;
  color: #333;
  cursor: pointer;
}
</style>
