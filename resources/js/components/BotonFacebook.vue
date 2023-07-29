<!-- src/components/MercadoLibreButton.vue -->
<template>
  <div>
    <button @click="openMercadoLibre">Abrir MercadoLibre</button>
  </div>
</template>

<script>
export default {
  methods: {
    openMercadoLibre() {
      if(navigator.userAgent.toLowerCase().indexOf("android") > -1){
        window.location.href = 
        'http://play.google.com/store/apps/details?id=com.mercadolibre&hl=es_CL&gl=US';
      }
          if(navigator.userAgent.toLowerCase().indexOf("iphone") > -1){
              window.location.href = 
        'http://itunes.apple.com/lb/app/PACKAGEURL';
      }
    }
  },
};
</script>
