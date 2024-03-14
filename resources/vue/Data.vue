<template>
  <el-card class="box-card">
    <el-table v-if="properties.length > 0" :data="properties" stripe v-loading="isLoading">
      <el-table-column prop="name" label="Name" />
      <el-table-column prop="price" label="Price" />
      <el-table-column prop="bedrooms" label="Bedrooms" />
      <el-table-column prop="bathrooms" label="Bathrooms" />
      <el-table-column prop="storeys" label="Storeys" />
      <el-table-column prop="garages" label="Garages" />
    </el-table>
    <el-empty v-else description="Nothing found" />
  </el-card>
</template>

<script setup>
import { inject } from 'vue';

const properties = inject('properties');
const isLoading = inject('isLoading');
</script>
