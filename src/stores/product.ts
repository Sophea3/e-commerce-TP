import { defineStore } from "pinia";
import axios from "axios";

const API = 'http://localhost:3000'

interface Group {
  id: number | string;
  name: string;
}

interface Promotion {
  id: number | string;
  title: string;
  image: string;
  color: string;
  buttonText: string;
  buttonColor: string;
}

interface Category {
  id: number | string;
  name: string;
  group: string;
  productCount: number;
  image: string;
  color: string;
}

interface Product {
  id: number | string;
  name: string;
  group: string;
  brand: string;
  countSold: number;
  price: number;
  rating: number;
  weight: number;
  image: string;
  originalPrice?: number; // optional for discount display
}

export const useProductStore = defineStore("product", {
  state: () => ({
    groups: [] as Group[],
    promotions: [] as Promotion[],
    categories: [] as Category[],
    products: [] as Product[],
    filteredProducts: [] as Product[],
    filteredPopularProducts: [] as Product[]
  }),

  getters: {
    getCategoriesByGroup: (state) => {
      return (groupName: string) =>
        state.categories.filter((category) => category.group === groupName);
    },

    getProductsByGroup: (state) => {
      return (groupName: string) =>
        state.products.filter((product) => product.group === groupName);
    },

    getProductsByCategory: (state) => {
      return (categoryId: string | number) =>
        state.products.filter((product) => product.categoryId === categoryId);
    },

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
        this.filteredProducts = prodRes.data; // default to all
        this.filteredProducts = this.products.filter((product) => product.countSold > 10); // default popular
      } catch (err) {
        console.error("Failed loading API:", err);
      }
    },

    filterProducts(groupName: string) {
      if (groupName === 'All') {
        this.filteredProducts = this.products;
      } else {
        this.filteredProducts = this.products.filter(p => p.group === groupName);
      }
    },

    filterPopularProducts(groupName: string) {
      if (groupName === 'All') {
        this.filteredPopularProducts = this.getPopularProducts;
      } else {
        this.filteredPopularProducts = this.getPopularProducts.filter(
          (p) => p.group === groupName
        );
      }
    }
  }
});
