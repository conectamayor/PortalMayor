<!-- src/components/MercadoLibreButton.vue -->
<template>
  <div>
    <button @click="openMercadoLibre">Abrir Instagram</button>
  </div>
</template>

<script>
export default {
  methods: {
    openMercadoLibre() {
      const twitterDeepLink = "https://www.instagram.com/conectamayor/%3Fhl%3Des&ved=2ahUKEwiY7Zir87SAAxXmppUCHVdVDhwQFnoECBUQAQ&usg=AOvVaw1JdqBOn6f_WLiC4TooIB_m"; // Reemplaza 'nombre_de_usuario' por el nombre de usuario del perfil de Twitter

      // Intentamos abrir la aplicación de MercadoLibre
      window.location.href = twitterDeepLink;

    },
  },
};
</script>
