<template>
  <div>
    <h2>Welcome Home</h2>
    <button @click="counter++">Click me {{counter}}</button>
    <div class="progress">
      <div class="progress-bar" role="progressbar" :style="'width:'+counter+'%'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
</template>

<script>
  export default{
    data: () => ({
      counter:0
    })
  }
</script>

<style>

</style>