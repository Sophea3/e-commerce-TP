import { defineStore } from "pinia";
import axios from "axios";


export const useProductStore = defineStore("product", {
  state: () => ({
    groups: [],
    promotions: [],
    categories: [],
    products: []
  }),

  getters: {
    // 1. List all categories by group name
    getCategoriesByGroup: (state) => {
      return (groupName) =>
        state.categories.filter((category) => category.group === groupName);
    },

    // 2. List all products by group name
    getProductsByGroup: (state) => {
      return (groupName) =>
        state.products.filter((product) => product.group === groupName);
    },

    // 3. List all products by categoryId
    getProductsByCategory: (state) => {
      return (categoryId) =>
        state.products.filter((product) => product.categoryId === categoryId);
    },

    // 4. Popular products (countSold > 10)
    getPopularProducts: (state) => {
      return state.products.filter((product) => product.countSold > 10);
    }
  },

  actions: {
    async loadAllData() {
      try {
        const base = "http://localhost:3000/api";

        const [catRes, promoRes, groupRes, prodRes] = await Promise.all([
          axios.get(`${base}/categories`),
          axios.get(`${base}/promotions`),
          axios.get(`${base}/groups`),
          axios.get(`${base}/products`)
        ]);

        this.categories = catRes.data;
        this.promotions = promoRes.data;
        this.groups = groupRes.data;
        this.products = prodRes.data;
      } catch (err) {
        console.error("Failed loading API:", err);
      }
    }
  }
});
