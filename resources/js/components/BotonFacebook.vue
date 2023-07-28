<template>
    <button @click="openWhatsAppApp">Abrir WhatsApp 2</button>
  </template>
  
  <script>
  export default {
    methods: {
      openWhatsAppApp() {
        var destination = "instagram://"; 
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