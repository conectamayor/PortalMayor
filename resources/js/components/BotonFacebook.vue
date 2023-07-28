<template>
    <button @click="openWhatsAppApp">Abrir WhatsApp</button>
  </template>
  
  <script>
  export default {
    methods: {
      openWhatsAppApp() {
        window.location.href = "whatsapp://"; // Reemplaza el número de teléfono con el número al que deseas enviar un mensaje
      }
    }
  }
  </script>