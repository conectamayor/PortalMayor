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
      // Esquema de URL personalizado para la aplicación de MercadoLibre
      const mercadoLibreDeepLink = "mercadoLibre://";

      // Intentamos abrir la aplicación de MercadoLibre
      window.location.href = mercadoLibreDeepLink;
    },
  },
};
</script>