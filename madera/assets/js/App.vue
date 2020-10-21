<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="success">
      <img :src="'img/logo_madera.png'" alt="#" style="width: 20%">
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item href='/modules'>Modules</b-nav-item>
          <b-nav-item href="/gammes" replace >Gammes</b-nav-item>
          <b-nav-item href="/huisserie" >Huisseries</b-nav-item>
          <b-nav-item href="/montants" >Montants</b-nav-item>
          <b-nav-item href="/sections" >Sections</b-nav-item>
          <b-nav-item href="/composants" >Composants</b-nav-item>
          <b-nav-item href="/fournisseurs" >Fournisseurs</b-nav-item>
        </b-navbar-nav>

      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>

</script>

<style>

</style>