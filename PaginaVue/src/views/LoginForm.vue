<template>
  <div class="container">
      <div class="login-form">
        <h2>Login</h2>
            <form @submit.prevent="login">
                <div>
                  <label for="username">Username:</label>
                  <input type="text" id="username" v-model="username" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" v-model="password" required>
                </div>
                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
      </div>
      <div v-if="error" class="error-message">{{ error_msg }}</div>
  </div>
</template>
  
  <script>
  import axios from 'axios';
  export default {
    data() {
      return {
        username: '',
        password: '',
        error: false,
        error_msg: ''
      };
    },
    methods: {
      login() {
        // Aquí puedes agregar la lógica para enviar los datos del formulario al servidor
        let json = {
          "email":this.username,
          "password":this.password
        };

        // Configuración de la solicitud, incluyendo el encabezado de autorización y CORS
        const axiosConfig = {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
          },
        };

        axios.post('http://127.0.0.1:8000/api/login', json, axiosConfig)
        .then(response => {
          // Obtener los datos de la respuesta JSON
          const { permiso } = response.data;

          // Redirigir según el permiso
          if (permiso === 1) {
            window.location.href = '/perfil';
          } else if (permiso === 2) {
            window.location.href = '/dashboard-admin';
          } else {
            // Manejar otros casos o mostrar un mensaje de error
            console.error("Permiso no válido");
          }
        })
        .catch(error => {
          // Manejar errores de la solicitud de inicio de sesión
          console.error("Error en la solicitud de inicio de sesión", error);
        });
      }
    }
  };
  </script>
  
  <style scoped>
.container {
    text-align: center;
}

.login-form {
    border: 1px solid #ccc;
    padding: 20px;
    max-width: 300px;
    margin: 0 auto;
}

.logged-in-message {
    font-size: 18px;
    color: green;
}  </style>

  
  