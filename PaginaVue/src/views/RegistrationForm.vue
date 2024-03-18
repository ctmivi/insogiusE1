<template>
  <form class="registration-form">
    <div class="register">
      <div class="columns is-centered">
        <div class="column is-half" id="left">
          <div class="field">
            <label for="name" class="label">Name:</label>
            <div class="control">
              <input type="text" id="name" v-model="name" class="input" placeholder="Your Name">
            </div>
          </div>

          <div class="field">
            <label for="nickname" class="label">Nickname:</label>
            <div class="control">
              <input type="text" id="nickname" v-model="nickname" class="input" placeholder="Your Nickname">
            </div>
          </div>

          <div class="field">
            <label for="email" class="label">Email:</label>
            <div class="control">
              <input type="email" id="email" v-model="email" class="input" placeholder="Your Email">
            </div>
          </div>
        </div>

        <div class="column is-half" id="right">
          <div class="field">
            <label for="password" class="label">Password:</label>
            <div class="control">
              <input type="password" id="password" v-model="password" class="input" placeholder="Your Password">
            </div>
          </div>

          <div class="field">
            <label for="birthday" class="label">Birthday:</label>
            <div class="control">
              <input type="date" id="birthday" v-model="birthday" class="input">
            </div>
          </div>

          <div class="field">
            <label for="gender" class="label">Gender:</label>
            <div class="control">
              <div class="select">
                <select id="gender" v-model="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
              </div>
            </div>
          </div>
        </div>

          <div class="field is-grouped">
            <div class="control">
              <button type="submit" class="button is-primary">Registrarse</button>
            </div>
          </div>
      </div>
    </div>
    
  </form>
</template>

  
<script>
import axios from 'axios';
export default {
  data() {
    return {
      name: '',
      alias: '',
      email: '',
      password: '',
      birthdate: '',
      gender: '',
    };
  },
  methods: {
    register() {
      let json = {
        name: this.name,
        alias: this.nickname,
        email: this.email,
        password: this.password,
        birthdate: this.birthday,
        gender: this.gender,
      };

        // Configuración de la solicitud, incluyendo el encabezado de autorización y CORS
        const axiosConfig = {
          headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*' // Esto puede ser ajustado según tus necesidades de CORS
          },
        };

        axios.post('http://127.0.0.1:8000/api/register', json,axiosConfig)
        .then(data=>{
          console.log(data);
        })

      }
    }
  };
</script>

  
<style scoped>
.register{
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 10px;
  background-color: #fff;
  padding: 30px;
  border-radius: 30px;
  box-shadow: 0 0 40px rgba(255, 0, 0, 0.1);
  max-width: 800px;
  width: 100%;
  text-align: center;
}

#left{
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-right: 20px;
}

#right{
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-left: 20px;
}

.registration-form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form-group {
  margin-bottom: 10px;
}

button {
  margin-top: 10px;
}
</style>