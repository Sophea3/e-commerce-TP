<template>
  <button class="btn" 
    :style="{ backgroundColor: props.color }"
    @click="handleClick">
    {{ props.text }}
  </button>
</template>

<script setup>
const props = defineProps({
  text: { type: String, default: 'Shop Now' },
  color: { type: String, default: '#3b82f6' }
})
const emit = defineEmits(['click']);

function handleClick() {
  emit('click');
}
</script>

<style scoped>
.btn {
  border: none;
  color: white;
  padding: 15px 35px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  font-size: 16px;
  margin-top: 20px;
}
.btn:hover {
  opacity: 0.9;
}
</style>
