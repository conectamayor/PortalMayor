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
      const mercadoLibreDeepLink = "instagram.com/p/";
      const mercadoLibreWebURL = "https://www.mercadolibre.com";

      // Intentamos abrir la aplicación de MercadoLibre
      window.location.href = mercadoLibreDeepLink;

      // Agregamos una espera de 300 ms antes de redirigir al sitio web de MercadoLibre
      // Esto le dará tiempo suficiente al sistema para intentar abrir la aplicación
      setTimeout(() => {
        window.location.href = mercadoLibreWebURL;
      }, 300);
    },
  },
};
</script>
