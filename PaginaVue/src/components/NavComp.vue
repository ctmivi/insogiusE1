<template>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container justify-content-start">
        <img class="navbar-brand" src="../assets/fotos/logo.png" width="70px" might="70px">
        </div>
        <div class="container justify-content-end">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <router-link to="/" class="nav-link" aria-current="page">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/tienda" class="nav-link">Tienda</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/login" class="nav-link">Iniciar Sesión</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/register" class="nav-link">Registrar</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/perfil" class="nav-link">Mi Perfil</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<style scoped>

.navbar{
    background-color: #000000;  
}

.nav-item a, router-link :hover{
color: #ffffff;

}

</style>