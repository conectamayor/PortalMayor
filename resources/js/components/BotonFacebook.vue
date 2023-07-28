<template>
    <div>
      <button @click="openFacebookApp">Open Facebook</button>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      openFacebookApp() {
        const urlScheme = 'instagram://'; // Facebook URI scheme for opening the app
  
        // Try to open the Facebook app
        window.location.href = urlScheme;

      },
    },
  };
  </script>
  
  <style>
  button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }
  </style>