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
                        <div class="p-3 border">
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
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-column align-items-center">
                            <div class="circle" @click="scrollContent(-50)">
                                <i class="fas fa-chevron-up"></i>
                            </div>
                            <div class="circle" @click="scrollContent(50)">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</template>

<script>
    export default {
        created() {
            this.checkVideo();
            this.checkCategoryPoll();
            this.getPollQuestions();
            this.getPollQuantity();
            this.getPosts();
            this.getPolls();
            this.checkDate();

            localStorage.setItem('circle_position', '10');
        },
        methods: {
            scrollContent(offset) {
                const col8 = this.$refs.col8;
                col8.scrollTop += offset;
            },
            goWeb(url, google_tag) {
                this.$gtag.event('page_view', {
                    page_title: google_tag
                });

                window.location.href = url;
            },
            Track(google_tag) {
                this.$gtag.event('page_view', {
                    page_title: google_tag
                });
            },
            checkDate() {
                let formData = new FormData();
                formData.append('page', 'Home');
               
                axios.post('/api/content/date', formData)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                        console.log(error);
                });
            },
            onSubmit(e) {
                this.loading = true;
                e.preventDefault();
                let currentObj = this;
    
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
            
                formData.append('poll_id', this.$route.params.id);
                formData.append('yes_no_answers', this.form.yes_no_answer);
                formData.append('text_answers', this.form.text_answer);

                axios.post('/api/poll/answer', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => {
                    this.loading = false;
                    this.$awn.success("La encuesta han sido contestada", {labels: {success: "Éxito"}});
                    this.$router.push('/');
                });
            },
            getPollQuantity() {
                axios.get('/api/poll/quantity/'+ this.$route.params.id)
                .then(response => {
                    this.poll_quantity = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => {
                    this.loading = false;
                });
            },
            checkCategoryPoll() {
                axios.get('/api/section/poll/'+ this.$route.params.id)
                .then(response => {
                    this.check_category_poll = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => {
                    this.loading = false;
                });
            },
            getPolls() {
                axios.get('/api/poll/all/'+ this.$route.params.id)
                .then(response => {
                    this.polls = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => {
                    this.loading = false;
                });
            },
            getPollQuestions() {
                axios.get('/api/poll/show/'+ this.$route.params.id)
                .then(response => {
                    this.poll_question_posts = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => {
                    this.loading = false;
                });
            },
            catchUser() {
                let formData = new FormData();
                formData.append('page', 'section_id_'+this.$route.params.id);
               
                axios.post('/api/user/catch', formData)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            goHome() {
                this.$router.push('/')
            },
            goBack() {
                this.$router.go(-1)
            },
            checkVideo() {
                this.loading = true;

                axios.get('/api/section/'+ this.$route.params.id+'/edit')
                .then(response => {
                    this.post = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => {
                    this.loading = false;
                });
            },
            getPosts() {
                this.loading = true;

                axios.get('/api/category/show/'+ this.$route.params.id)
                .then(response => {
                    this.posts = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => {
                    this.loading = false;
                });
            }
        },
        data: function() {
            return {
                posts: [],
                post: '',
                polls: [],
                poll_question_posts: [],
                poll_quantity: 0,
                check_category_poll: '',
                form: {
                    yes_no_answer: [],
                    text_answer: []
                },
            }
        }
    }
</script>
<style>
    /* Agrega estilos para la altura máxima y oculta el scrollbar en la columna de ancho 8 */
    .col-8-scroll {
      max-height: 580px; /* Ajusta la altura máxima según tus necesidades */
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