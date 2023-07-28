<template>
    <button @click="openInstagramApp">Abrir Instagram</button>
  </template>
  
  <script>
  export default {
    methods: {
      openInstagramApp() {
        window.location.href = "instagram://app"; // URL de esquema personalizado de Instagram
      }
    }
  }
  </script>
  