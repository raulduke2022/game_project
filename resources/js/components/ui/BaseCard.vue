<template>
  <div class="card">
    <slot></slot>
  </div>
</template>

<style scoped>
.card {
  border-radius: 20px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  padding: 5rem;
  margin: 1rem 1rem;
  max-width: 40rem;
}
</style>
