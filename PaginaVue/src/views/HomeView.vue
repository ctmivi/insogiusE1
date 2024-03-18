<template>
  <div class="home">
    <center>
      <img alt="Insognnius" src="@/assets/fotos/logo.png" >
    </center>
  </div>
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto text-center">
          <h2 class="display-4">Insognius</h2>
          <br><p class="lead">Información</p>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquet velit sed magna fringilla, sit amet viverra arcu consequat. Nullam eget libero id lorem tempus condimentum.</p>
          <p class="text-muted">Morbi vel ligula pretium, tristique quam id, tincidunt elit. Ut nec elit nec sapien pharetra ultrices. Vivamus nec sapien dictum, blandit nisi nec, luctus enim.</p>
          <a href="#" class="btn btn-light btn-lg">Conocer más</a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>

</script>

<style scoped>
.section {
  padding: 80px 0;
  width: 700px;
  height: 800px;
  box-shadow: #000000d8;
  background-image: url('@/assets/fotos/noche.png');
  background-position: cover;
}

/* Estilo para el título */
.display-4 {
  color: #333;
}

/* Estilo para el botón */
.btn.btn-warning {
  background-color: #f0ad4e;
  border-color: #f0ad4e;
}

.btn.btn-warning:hover,
.btn.btn-warning:focus {
  background-color: #ec971f;
  border-color: #ec971f;
}

/* Estilo para el texto */
.text-muted {
  color: #6c757d;
  font-size: 18px;
  line-height: 1.6;
}
</style>
