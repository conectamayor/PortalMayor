<template>
    <div>
      <button @click="openFacebookApp">Open Facebook</button>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      openFacebookApp() {
        const urlScheme = 'fb://'; // Facebook URI scheme for opening the app
        const webUrl = 'https://www.facebook.com'; // Fallback URL to open if the app is not installed
  
        // Try to open the Facebook app
        window.location.href = urlScheme;
  
        // If the app is not installed, open the Facebook website in a new tab
        setTimeout(() => {
          window.location.href = webUrl;
        }, 500);
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