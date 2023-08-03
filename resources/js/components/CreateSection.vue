<template>
    <div>
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">
          Crear Sección
        </h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row">
              <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Información</h6>
              </div>
              <div class="col-sm-6">
                <h6 class="m-0 text-danger float-right">* Campos Obligatorios</h6>
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Loading spinner while data is being fetched -->
            <div v-if="loading">
              <center>
                <clip-loader :color="color"></clip-loader>
              </center>
            </div>
            <!-- Form section for creating a new section -->
            <div v-else>
              <form @submit.prevent="onSubmit" ref="createBill" enctype="multipart/form-data">
                <!-- Display validation errors, if any -->
                <div v-if="errors.length" class="alert alert-danger" role="alert">
                  <b>Por favor, corrija los siguientes errores:</b>
                  <ul>
                    <li v-for="error in errors">{{ error }}</li>
                  </ul>
                </div>
                <!-- Section Title input -->
                <div class="form-group row">
                  <div class="col-sm-4">
                    <label for="exampleInputEmail1">Título <h6 class="m-0 text-danger float-right">*</h6></label>
                    <input
                      type="text" 
                      v-model="form.title" 
                      maxlength="36"
                      class="form-control"
                      placeholder="Ingresa el título"
                    >
                    <span class="col-sm-12">{{charactersLeft}}</span>
                  </div>
                  <!-- Subtitle input -->
                  <div class="col-sm-4">
                    <label for="exampleInputEmail1">Sub-título</label>
                    <input
                      type="text" 
                      v-model="form.subtitle" 
                      maxlength="30"
                      class="form-control"
                      placeholder="Ingresa el subtítulo"
                    >
                  </div>
                  <!-- Google Tag input -->
                  <div class="col-sm-4">
                    <label for="exampleInputEmail1">Google Tag <h6 class="m-0 text-danger float-right">*</h6></label>
                    <input
                      type="text" 
                      v-model="form.google_tag" 
                      class="form-control"
                      placeholder="Ingresa el google tag"
                    >
                  </div>
                </div>
                <!-- Color input -->
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="exampleInputEmail1">Color <h6 class="m-0 text-danger float-right">*</h6></label>
                    <div class="form-group row">
                      <div class="col-sm-2">
                        <!-- Color picker component -->
                        <v-input-colorpicker v-model="color" @change="handleChange" />
                      </div>
                      <div class="col-sm-10">
                        <input
                          type="text" 
                          v-model="form.color" 
                          class="form-control"
                          placeholder="Ingresa el color"
                        >
                      </div>
                    </div>
                  </div>
                  <!-- Position input -->
                  <div class="col-sm-6">
                    <label for="exampleInputEmail1">Posición <h6 class="m-0 text-danger float-right">*</h6></label>
                    <input
                      type="number" 
                      v-model="form.position" 
                      min="0"
                      class="form-control"
                      placeholder="Ingresa la posición"
                    >
                  </div>
                </div>
                <!-- Icon available selection -->
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="exampleInputEmail1">¿La sección tiene icono? <h6 class="m-0 text-danger float-right">*</h6></label>
                    <select class="form-control" id="exampleFormControlSelect1"
                      v-model="form.icon_available_id"
                    >
                      <option :value="1">Si</option>
                      <option :value="2">No</option>
                    </select>
                    <input type="hidden" v-model="form.icon_type_id">
                  </div>
                  <!-- Icon input (if icon available) -->
                  <div class="col-sm-6" v-if="form.icon_available_id == 1">
                    <label for="exampleInputEmail1">Fa Icon - <a href="https://fontawesome.com/icons" target="_blank">Ver iconos</a></label>
                    <input
                      type="text" 
                      v-model="form.fai" 
                      class="form-control"
                      placeholder="Ingresa el icono"
                    >
                  </div>
                </div>
                <!-- Direct content question selection -->
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="exampleInputEmail1">¿Es directo a Contenido? <h6 class="m-0 text-danger float-right">*</h6></label>
                    <select class="form-control" id="exampleFormControlSelect1"
                      v-model="form.direct_content_question_id"
                    >
                      <option :value="1">Si</option>
                      <option :value="2">No</option>
                    </select>
                  </div>
                </div>
                <!-- Link question selection -->
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="exampleInputEmail1">¿Es un enlace a una página externa? <h6 class="m-0 text-danger float-right">*</h6></label>
                    <select class="form-control" id="exampleFormControlSelect1"
                      v-model="form.link_question_id"
                    >
                      <option :value="1">Si</option>
                      <option :value="2">No</option>
                    </select>
                  </div>
                  <!-- URL input (if link question is yes) -->
                  <div class="col-sm-6" v-if="form.link_question_id == 1">
                    <label for="exampleInputEmail1">Url o enlace</label>
                    <input
                      type="text" 
                      v-model="form.url" 
                      v-mask="'http://XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'"
                      class="form-control"
                      placeholder="Ingresa la url o enlace"
                    >
                  </div>
                </div>
                <!-- Iframe question selection -->
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="exampleInputEmail1">¿Es un Iframe? <h6 class="m-0 text-danger float-right">*</h6></label>
                    <select class="form-control" id="exampleFormControlSelect1"
                      v-model="form.iframe_question_id"
                    >
                      <option :value="1">Si</option>
                      <option :value="2">No</option>
                    </select>
                  </div>
                  <!-- Iframe URL input (if iframe question is yes) -->
                  <div class="col-sm-6" v-if="form.iframe_question_id == 1">
                    <label for="exampleInputEmail1">Url del Iframe</label>
                    <input
                      type="text" 
                      v-model="form.iframe"
                      class="form-control"
                      placeholder="Ingresa la url o enlace"
                    >
                  </div>
                </div>
                <!-- Youtube question selection -->
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="exampleInputEmail1">¿Es un video de Youtube? <h6 class="m-0 text-danger float-right">*</h6></label>
                    <select class="form-control" id="exampleFormControlSelect1"
                      v-model="form.youtube_question_id"
                    >
                      <option :value="1">Si</option>
                      <option :value="2">No</option>
                    </select>
                  </div>
                  <!-- Youtube video URL input (if youtube question is yes) -->
                  <div class="col-sm-6" v-if="form.youtube_question_id == 1">
                    <label for="exampleInputEmail1">URL del Video</label>
                    <input
                      type="text" 
                      v-model="form.video_id"
                      class="form-control"
                      placeholder="Ingresa el Id del Video"
                    >
                  </div>
                </div>
                <!-- Save and Cancel buttons -->
                <button 
                  type="submit"
                  class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                  </span>
                  <span class="text">Guardar</span>
                </button>
                <router-link to="/section" class="btn btn-danger btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-times"></i>
                  </span>
                  <span class="text">Cancelar</span>
                </router-link>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <!-- JavaScript section -->
  <script>
    // Import necessary components and libraries
    import { ClipLoader } from 'vue-spinner/dist/vue-spinner.min.js';
    import InputColorPicker from 'vue-native-color-picker';
  
    // Export the Vue component
    export default {
      components: {
        ClipLoader,
        "v-input-colorpicker": InputColorPicker
      },
      // Called when the component is created
      created() {
        this.storeAudit();
      },
      // Component data
      data: function() {
        return {
          errors: [],   // Array to store validation errors
          color: '#0A2787',  // Initial color value
          loading: false,    // Flag to indicate if data is being fetched
          color: "#0f4c81",  // Initial color value (Note: 'color' variable is being redefined twice)
          noFile: false,     // Flag to indicate if no file is selected
          form: {
            title: '',
            color: '',
            icon: '',
            position: '',
            icon_type_id: 2,
            fai: '',
            link_question_id: 2,
            video_id: '',
            youtube_question_id: 2,
            google_tag: '',
            subtitle: '',
            iframe_question_id: 2,
            iframe: '',
            direct_content_question_id: 2,
            icon_available_id: 2
          }
        }
      },
      // Component methods
      methods: {
        // Function to store audit data
        storeAudit() {
          let formData = new FormData();
          formData.append('page', 'CreateSection');
          axios.post('/api/audit/store?api_token='+App.apiToken, formData)
            .then(function (response) {
              currentObj.success = response.data.success;
            })
            .catch(function (error) {
              console.log(error);
            });
        },
        // Function to handle color change
        handleChange() {
          this.form.color = this.color;
        },
        // Function to handle file change
        onFileChange(e){
          this.file = e.target.files[0];
          this.noFile = e.target.files.length;
        },
        // Function to handle form submission
        onSubmit(e) {
          this.loading = true; // Set loading flag to true
          e.preventDefault();
          let currentObj = this;
  
          // Configure headers for file upload
          const config = {
            headers: { 'content-type': 'multipart/form-data' }
          }
  
          // Validate form fields before submission
          if (this.form.title != ''
            && this.form.color != ''
            && this.form.google_tag != ''
            && (this.form.fai != '' && this.form.icon_available_id == 1)
            && (this.file != null || this.form.fai != '')
            && this.form.position != ''
            && this.form.direct_content_question_id != ''
            && this.form.link_question_id != ''
            && this.form.iframe_question_id
            && this.form.youtube_question_id
          ) {
            // Create form data to be sent via POST request
            let formData = new FormData();
            formData.append('title', this.form.title);
            formData.append('color', this.form.color);
            formData.append('icon_type_id', this.form.icon_type_id);
            formData.append('icon', this.form.fai);
            formData.append('position', this.form.position);
            formData.append('link_question_id', this.form.link_question_id);
            formData.append('url', this.form.url);
            formData.append('video_id', this.form.video_id);
            formData.append('subtitle', this.form.subtitle);
            formData.append('iframe', this.form.iframe);
            formData.append('google_tag', this.form.google_tag);
            formData.append('direct_content_question_id', this.form.direct_content_question_id);
            formData.append('icon_available_id', this.form.icon_available_id);
  
            // Perform the POST request to store the section data
            axios.post('/api/section/store?api_token='+App.apiToken, formData, config)
              .then(function (response) {
                currentObj.success = response.data.success;
              })
              .catch(function (error) {
                console.log(error);
              })
              .finally(() => {
                this.loading = false; // Set loading flag to false after request completion
                this.$awn.success("El registro ha sido agregado", {labels: {success: "Éxito"}});
                this.$router.push('/section'); // Redirect to the section page after successful submission
              });
          } else {
            // If form validation fails, display error messages
            this.loading = false; // Set loading flag to false
            this.errors = [];
            
            if (this.form.title == '') {
              this.errors.push('El título es obligatorio.');
            }
            // Add more validation checks for other fields (color, fai, position, etc.)
            // ...
  
            $('html,body').scrollTop(0); // Scroll to the top of the page
  
            e.preventDefault();
          }
        },
      },
      // Computed properties for dynamic behavior
      computed: {
        isDisabled() {
          return true;
        },
        charactersLeft() {
          var char = this.form.title.length,
            limit = 36;
  
          return (limit - char) + " / " + limit + " caracteres disponibles";
        }
      }
    }
  </script>
  <style lang="scss">
    @import '~vue-awesome-notifications/dist/styles/style.scss';
  </style>
  