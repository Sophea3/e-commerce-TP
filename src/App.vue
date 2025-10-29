<template>
  <div class="app-container">
    <h1>This is my first VueJs project</h1>

    <!-- Categories -->
    <div class="category-grid">
      <CategoryComponent
        v-for="(cat, index) in categories"
        :key="index"
        :title="cat.title"
        :items="cat.items"
        :image="cat.image"
        :bgColor="cat.bgColor"
      />
    </div>

    <!-- Promotions -->
    <div class="promo-grid">
      <PromotionComponent
        v-for="(promo, index) in promotions"
        :key="index"
        :title="promo.title"
        :subtitle="promo.subtitle"
        :image="promo.image"
        :bgColor="promo.bgColor"
      >
        <ButtonComponent text="Shop Now" />
      </PromotionComponent>
    </div>
  </div>
</template>

<script>
import CategoryComponent from './components/CategoryComponent.vue'
import PromotionComponent from './components/PromotionComponent.vue'
import ButtonComponent from './components/ButtonComponent.vue'

export default {
  name: 'App',
  components: {
    CategoryComponent,
    PromotionComponent,
    ButtonComponent,
  },
  data() {
    return {
      categories: [
        { title: 'Cake & Milk', items: 14, image: '/Image/burger.jpg', bgColor: '#F2FCE4' },
        { title: 'Peach', items: 12, image: '/Image/peach.jpg', bgColor: '#FFFCEB' },
        { title: 'Organic Kiwi', items: 21, image: '/Image/kiwi.jpg', bgColor: '#ECFFEC' },
        { title: 'Red Apple', items: 68, image: '/Image/apple.jpg', bgColor: '#FEEFEA' },
        { title: 'Snack', items: 34, image: '/Image/snack.jpg', bgColor: '#FFF3EB' },
        { title: 'Black Plum', items: 25, image: '/Image/plum.jpg', bgColor: '#FFF3FF' },
        { title: 'Vegetables', items: 65, image: '/Image/vegetables.jpg', bgColor: '#F2FCE4' },
        { title: 'Headphone', items: 33, image: '/Image/headphone.jpg', bgColor: '#FFFCEB' },
        { title: 'Cake & Milk', items: 54, image: '/Image/cake.jpg', bgColor: '#F2FCE4' },
        { title: 'Orange', items: 63, image: '/Image/orange.jpg', bgColor: '#FFF3FF' },
      ],
      promotions: [
        {
          title: 'Everyday Fresh & Clean with Our Products',
          subtitle: 'Thise MEJERI',
          image: '/Image/smoothie.jpg',
          bgColor: '#ffe0e0',
        },
        {
          title: 'Make your Breakfast Healthy and Easy',
          subtitle: 'Strawberry Juice',
          image: '/Image/strawberry.jpg',
          bgColor: '#e0f7fa',
        },
        {
          title: 'The best Organic Products Online',
          subtitle: 'Fresh vegetables and fruits',
          image: '/Image/organic.jpg',
          bgColor: '#e8f5e9',
        },
      ],
    }
  },
}
</script>

<style>
.app-container {
  max-width: 1200px;
  margin: auto;
  padding: 20px;
  font-family: 'Inter', sans-serif;
}
.category-grid {
  display: flex;
  gap: 16px;
  justify-content: center;
  margin-bottom: 40px;
  flex-direction: row;
}
.promo-grid {
  display: flex;
  flex-direction: row;
  gap: 24px;
  justify-content: center;
}
</style>
