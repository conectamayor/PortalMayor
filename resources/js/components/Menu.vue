<template>
    <div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <router-link class="nav-link" to="/account">
            <i class="fas fa-fw fa-home"></i>
            <span>Inicio</span></router-link>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" v-if="rols_permissions[0]">
            <router-link class="nav-link" to="/alliance">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Alianzas</span></router-link>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" v-if="rols_permissions[1]">
            <router-link class="nav-link" to="/section">
            <i class="fas fa-fw fa-arrow-up"></i>
            <span>Secciones</span></router-link>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" v-if="rols_permissions[2]">
            <router-link class="nav-link" to="/category">
            <i class="fas fa-fw fa-signal"></i>
            <span>Categorias</span></router-link>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" v-if="rols_permissions[3]">
            <router-link class="nav-link" to="/content">
            <i class="fas fa-fw fa-paint-brush"></i>
            <span>Contenido</span></router-link>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" v-if="rols_permissions[4]">
            <router-link class="nav-link" to="/poll">
            <i class="fas fa-fw fa-poll"></i>
            <span>Encuestas</span></router-link>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" v-if="rols_permissions[5]">
            <router-link class="nav-link" to="/metric">
            <i class="fas fa-fw fa-database"></i>
            <span>Metricas</span></router-link>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" v-if="rols_permissions[6]">
            <router-link class="nav-link" to="/audit">
            <i class="fas fa-fw fa-thumbs-up"></i>
            <span>Auditoría</span></router-link>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" v-if="rols_permissions[7]">
            <router-link class="nav-link" to="/rol">
            <i class="fas fa-fw fa-lock"></i>
            <span>Roles</span></router-link>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" v-if="rols_permissions[8]">
            <router-link class="nav-link" to="/user">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuarios</span></router-link>
        </li>
        
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <button class="nav-link" @click="closeSession">
            <i class="fas fa-fw fa-times"></i>
            <span>Salir</span></button>
        </li>
    </div>
</template>

<script>
export default {
  created() {
    this.getRols();
  },
  methods: {
    closeSession() {
      alert(window.location.host);
      window.location = 'https://' + window.location.host + '/login/logout';
    },
    getRols() {
      axios.get('/api/user/rol?api_token=' + App.apiToken)
        .then(response => {
            this.rols_permissions = {}; // Initialize as an object

            response.data.data.forEach(item => {
                this.rols_permissions[item.rol_permission_id] = true; // Set as true
            });

        });
    }
  },
  data: function() {
    return {
      rols_permissions: {}
    };
  }
};
</script>