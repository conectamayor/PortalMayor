<template>
    <button @click="openWhatsAppApp">Abrir WhatsApp</button>
  </template>
  
  <script>
  export default {
    methods: {
      openWhatsAppApp() {
        var destination = "whatsapp://send"; 
        if( navigator.userAgent.match(/Android/i) ) {
            // use Android's redirect
            document.location = destination;   
        }   
        else {
            // use iOS redirect
            window.location.replace( destination );
        }
      }
    }
  }
  </script>