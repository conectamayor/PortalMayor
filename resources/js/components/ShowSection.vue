<template>
    <div class="container pt-32">
        <div class="row" v-if="post.section_subtitle != ''">
            <hr>
            <h2><center><strong>{{ post.section_subtitle }}</strong></center></h2>
        </div>
        <div v-if="post.video_id != 0" class="row">
            <h1><center>{{ post.section_title }}</center></h1>
            <iframe width="560" height="315" :src="`https://www.youtube.com/embed/${post.video_id}?autoplay=1`" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div v-else>
            <div v-if="post.iframe != null && post.iframe != ''" class="row">
                <h1><center>{{ post.section_title }}</center></h1>
                <iframe width="600" height="600" :src="`${post.iframe}`" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div v-if="check_category_poll == 0">
                <div v-if="poll_question_posts == ''" class="row">
                    <div class="col-8 col-8-scroll" ref="col8">
                        <div class="col-12" v-for="(post, index) in posts" v-bind:index="index">
                            <div v-if="post.link_question_id == 1">
                                <button class="boton2" v-if="post.icon_available_id == 2" :style="{ background: post.color}" v-on:click="goWeb(post.url,post.google_tag)" >
                                    <font class="title">{{ post.title }}</font>
                                </button>
                                <button class="boton2" v-else :style="{ background: post.color}" v-on:click="goWeb(post.url,post.google_tag)" >
                                    <i v-bind:class="post.icon"></i><br><font class="title">{{ post.title }}</font>
                                </button>
                            </div>
                            <div v-else>
                                <div v-if="post.icon_available_id == 2">
                                    <router-link @click.native="Track(post.google_tag)" v-if="post.highlight_id == 0"  class="boton2 link" :style="{ background: post.color}" :to="`/category/show/${post.category_id}`"> 
                                        <font class="title">{{ post.title }}</font>
                                    </router-link>

                                    <router-link @click.native="Track(post.google_tag)" v-if="post.highlight_id == 1"  class="botonhighlight link" :style="{ background: post.color}" :to="`/category/show/${post.category_id}`"> 
                                        <font class="title">{{ post.title }}</font>
                                    </router-link>
                                </div>
                                <div v-else>
                                    <router-link @click.native="Track(post.google_tag)" v-if="post.highlight_id == 0"  class="boton2" :style="{ background: post.color}" :to="`/category/show/${post.category_id}`"> 
                                        <i v-bind:class="post.icon"></i><br><font class="title">{{ post.title }}</font>
                                    </router-link>

                                    <router-link @click.native="Track(post.google_tag)" v-if="post.highlight_id == 1"  class="botonhighlight" :style="{ background: post.color}" :to="`/category/show/${post.category_id}`"> 
                                        <i v-bind:class="post.icon"></i><br> <font class="title">{{ post.title }}</font>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-column align-items-center">
                        <button @click="scrollContent(-50)" class="btn btn-primary mb-2">Subir</button>
                        <button @click="scrollContent(50)" class="btn btn-secondary">Bajar</button>
                        </div>
                    </div>
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
      max-height: 650px; /* Ajusta la altura máxima según tus necesidades */
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