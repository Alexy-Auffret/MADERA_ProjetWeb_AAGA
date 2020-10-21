<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="success">
      <img :src="'img/logo_madera.png'" alt="#" style="width: 20%">
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item :href="'login'">Modules</b-nav-item>
          <b-nav-item :href="'Gammes'" >Gammes</b-nav-item>
          <b-nav-item :href="'Huisseries'" >Huisseries</b-nav-item>
          <b-nav-item :href="'Montants'" >Montants</b-nav-item>
          <b-nav-item :href="'Sections'" >Sections</b-nav-item>
          <b-nav-item :href="'Composants'" >Composants</b-nav-item>
          <b-nav-item :href="'Fournisseurs'" >Fournisseurs</b-nav-item>
        </b-navbar-nav>

      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>

</script>

<style>

</style>