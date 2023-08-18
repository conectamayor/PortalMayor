<template>
    <div class="container pt-32">
        <div class="row">
            <!-- Columna 8 -->
            <div class="col-8 col-8-scroll" ref="col8">
                <div class="p-3 border">
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
                const newScrollTop = col8.scrollTop + offset;

                if (newScrollTop >= 0 && newScrollTop <= col8.scrollHeight - col8.clientHeight) {
                    col8.scrollTop = newScrollTop;
                } else if (newScrollTop > col8.scrollHeight - col8.clientHeight) {
                    col8.scrollTop = col8.scrollHeight - col8.clientHeight;
                }
            }
        }
    }
</script>
<style scoped>
    /* Agrega estilos para la altura máxima y el scroll en la columna de ancho 8 */
    .col-8-scroll {
      max-height: 400px; /* Ajusta la altura máxima según tus necesidades */
      overflow-y: auto;
    }
</style>