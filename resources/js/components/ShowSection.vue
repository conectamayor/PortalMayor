<template>
    <div class="container pt-32">
        <div class="row">
            <!-- Columna 8 -->
            <div class="col-8 col-8-scroll" ref="col8">
                <div class="p-3 border">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>
            
            <!-- Columna 4 -->
            <div class="col-4">
                <div class="d-flex flex-column align-items-center">
                <button @click="scrollContent(-50)" class="btn btn-primary mb-2">Subir</button>
                <button @click="scrollContent(50)" class="btn btn-secondary">Bajar</button>
                </div>
            </div>
        </div>
    </div>
	
</template>
<script>
    export default {
        methods: {
            scrollContent(offset) {
                const col8 = this.$refs.col8;
                col8.scrollTop += offset;
            }
        }
    }
</script>
<style>
    /* Agrega estilos para la altura máxima y oculta el scrollbar en la columna de ancho 8 */
    .col-8-scroll {
      max-height: 400px; /* Ajusta la altura máxima según tus necesidades */
      overflow-y: scroll;
      scrollbar-width: none; /* Oculta el scrollbar en navegadores Firefox */
      -ms-overflow-style: none; /* Oculta el scrollbar en navegadores Edge */
    }
    
    /* Estilos para ocultar el scrollbar en navegadores Chrome, Safari, y nuevos navegadores Edge */
    .col-8-scroll::-webkit-scrollbar {
      width: 0;
      height: 0;
    }
  </style>