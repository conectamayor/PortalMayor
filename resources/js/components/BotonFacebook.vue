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
      const mercadoLibreDeepLink = "fb://";

      // Intentamos abrir la aplicación de MercadoLibre
      window.location.href = mercadoLibreDeepLink;

    },
  },
};
</script>
