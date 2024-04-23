<template>
<div>
  This is table = {{counter}}
</div>
  <button @click="counter++" class="bg-danger">click</button>
</template>

<script setup>
  import {ref} from "vue";

  const counter = ref(0)
</script>

<style scoped>

</style>