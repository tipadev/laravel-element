<template>
  <div class="common-layout">
    <el-container>
      <el-header>
        <h1 class="header">Awesome Data List</h1>
      </el-header>
      <el-container class="page">
        <el-main>
          <Data />
        </el-main>
      </el-container>
    </el-container>
  </div>
</template>

<script setup>
import { api } from '../js/api.js';
import { ref, provide, onMounted } from 'vue';
import Data from './Data.vue';

const properties = ref([]);
const isLoading = ref(true);

provide('properties', properties);
provide('isLoading', isLoading);

const switchLoading = (value) => {
  isLoading.value = Boolean(value);
}

const fetchProperties = () => {
  const promise = api.get('/properties');

  promise.then((response) => {
    properties.value = response.data;
  });

  promise.finally(() =>
    switchLoading(false)
  );
}

onMounted(() => {
  fetchProperties();
});
</script>