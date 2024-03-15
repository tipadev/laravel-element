<template>
  <div class="common-layout">
    <el-container>
      <el-header>
        <h1 class="header">Awesome Data List</h1>
      </el-header>
      <el-container class="page">
        <el-aside class="page__aside el-main">
          <Search/>
        </el-aside>
        <el-main>
          <Data/>
        </el-main>
      </el-container>
    </el-container>
  </div>
</template>

<script setup>
import { ref, provide } from 'vue';
import Search from './Search.vue';
import Data from './Data.vue';

const properties = ref([]);
const isLoading = ref(true);

provide('properties', properties);
provide('isLoading', isLoading);
</script>

<style scoped>
.page__aside {
  min-width: 20em;
  max-width: 20em;
}

@media screen and (max-width: 1280px) {
  .page {
    display: block;
  }

  .page__aside {
    min-width: 0px;
    max-width: 100%;
  }
}
</style>