<script setup>
import Tasks from "@/components/Tasks.vue";

</script>

<template>
  <div class="max-w-3xl mx-auto px-3 border-l border-r border-gray-200">
    <header>
      <div class="flex gap-3 items-center justify-center border-b border-gray-200 py-2">
        <div>
          <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="25" height="25" />
        </div>
        <h2>Docker Lab</h2>
      </div>
      <Tasks></Tasks>
    </header>
  </div>
</template>

<style scoped>
</style>
