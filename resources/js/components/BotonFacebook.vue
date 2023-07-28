<template>
    <button @click="openInstagramProfile">Abrir Instagram</button>
  </template>
  
  <script>
  export default {
    methods: {
      openInstagramProfile() {
        window.open("https://www.instagram.com/tu_perfil_de_instagram", "_blank");
      }
    }
  }
  </script>