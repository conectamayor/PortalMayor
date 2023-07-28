<template>
    <button @click="openFacebookApp">Abrir Facebook</button>
  </template>
  
  <script>
  export default {
    methods: {
      openFacebookApp() {
        window.location.href = "fb://"; // URL de esquema personalizado de Facebook
      }
    }
  }
  </script>  