<template>
    <el-form label-position="left" label-width="7em" class="form">
      <el-form-item label="Name">
        <el-input v-model="filters.name" class="form__input" />
      </el-form-item>
      <el-form-item label="Price">
        <div class="form__price">
          <el-input-number 
            v-model="filters.price_min" 
            placeholder="Min" 
            controls-position="right" 
            :min="0"
            class="form__input form__input--price" 
          />
          <el-input-number 
            v-model="filters.price_max" 
            placeholder="Max" 
            controls-position="right" 
            :min="0"
            class="form__input form__input--price" 
          />
        </div>
      </el-form-item>
      <el-form-item label="Bedrooms">
        <el-input-number 
          v-model="filters.bedrooms" 
          controls-position="right" 
          :min="0"
          class="form__input form__input--number" 
        />
      </el-form-item>
      <el-form-item label="Bathrooms">
        <el-input-number 
          v-model="filters.bathrooms" 
          controls-position="right" 
          :min="0"
          class="form__input form__input--number" 
        />
      </el-form-item>
      <el-form-item label="Storeys">
        <el-input-number 
          v-model="filters.storeys" 
          controls-position="right" 
          :min="0"
          class="form__input form__input--number" 
        />
      </el-form-item>
      <el-form-item label="Garages">
        <el-input-number 
          v-model="filters.garages" 
          controls-position="right" 
          :min="0"
          class="form__input form__input--number" 
        />
      </el-form-item>
    </el-form>
    <el-button-group class="form__footer">
      <el-button 
        type="default" 
        size="large" 
        class="form__clear" 
        @click.prevent="reset" 
        :loading="isLoading">
        Reset
      </el-button>
      <el-button 
        type="primary" 
        size="large" 
        class="form__submit" 
        @click.prevent="search" 
        :loading="isLoading">
        Search
      </el-button>
    </el-button-group>
  </template>
  
  <script setup>
  import { api } from '../js/api.js';
  import { ElNotification } from 'element-plus';
  import { ref, inject, onMounted } from 'vue';
  
  const properties = inject('properties');
  const isLoading = inject('isLoading');
  
  const defaultFilters = {
    name: null,
    price_min: null,
    price_max: null,
    bedrooms: null,
    bathrooms: null,
    storeys: null,
    garages: null
  }
  
  const filters = ref({ ...defaultFilters });
  
  const switchLoading = (value) => {
    isLoading.value = Boolean(value);
  }
  
  const search = () => {
    switchLoading(true);
    fetchProperties();
  }
  
  const reset = () => {
    filters.value = { ...defaultFilters };
  
    switchLoading(true);
    fetchProperties();
  }
  
  const fetchProperties = () => {
    const promise = api.get('/properties', {
      params: filters.value
    });
  
    promise.then((response) => {
      properties.value = response.data;
    });
  
    promise.catch((error) => {
      showError(error.response.data);
    });
  
    promise.finally(() =>
      switchLoading(false)
    );
  }
  
  const showError = (message) => {
    ElNotification({
      title: 'Error',
      message,
      type: 'error',
    });
  }
  
  onMounted(() => {
    fetchProperties();
  });
  </script>
  
  <style scoped>
  .form__price {
    display: flex;
    width: 100%;
    gap: .5em;
  }
  
  .form__input--price {
    flex-grow: 1;
  }
  
  .form__input--number {
    width: 100%;
  }
  
  .form__footer {
    display: flex;
    justify-content: end;
  }
  </style>