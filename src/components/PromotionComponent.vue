<template>
  <div class="promo" :style="{ backgroundColor: bgColor }">
    <div class="content">
      <h2>{{ title }}</h2>
      <!-- Shop Now Button -->
      <button 
        class="shop-button"
        :style="{ backgroundColor: buttonColor }" 
        @click="showMessage"
      >
        {{ buttonText }}
      </button>
    </div>
    <div class="image-container">
      <img :src="image" alt="Promotion image" />
    </div>
  </div>
</template>

<script lang="ts">
export default {
  name: 'PromotionComponent',
  props: {
    title: {
      type: String,
      required: true
    },
    image: {
      type: String,
      required: true
    },
    bgColor: {
      type: String,
      required: true
    },
    buttonText: {
      type: String,
      default: 'Shop Now'
    },
    buttonColor: {
      type: String,
      default: '#3b82f6'
    }
  },
  methods: {
    showMessage(): void {
      // Simple handler to satisfy TypeScript; replace with real behavior (emit event, navigate, etc.) as needed
      console.log('Promotion button clicked');
    }
  }
}

</script>

<style scoped>
.promo {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-direction: row;
  padding: 30px;
  border-radius: 16px;
  color: #253D4E;
  gap: 20px;
  width: 600px;
  height: 250px;
  overflow: hidden;
}

.content {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.content h2 {
  margin: 0 0 20px;
  font-size: 20px;
  font-weight: 700;
  line-height: 1.4;
}
.shop-button {
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  color: #fff;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s;
}

.image-container {
  flex: 1;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  height: 100%;
  overflow: hidden;
}

.image-container img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* makes the image fill the space fully */
  border-radius: 12px;
}
</style>
