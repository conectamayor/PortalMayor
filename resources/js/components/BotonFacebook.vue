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
      const twitterDeepLink = "twitter://user?screen_name=conectamayor"; // Reemplaza 'nombre_de_usuario' por el nombre de usuario del perfil de Twitter

      // Intentamos abrir la aplicación de MercadoLibre
      window.location.href = mercadoLibreDeepLink;

    },
  },
};
</script>
