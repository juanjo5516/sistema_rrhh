<template>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre 1</th>
      <th scope="col">Nombre 2</th>
      <th scope="col">Apellido 1</th>
      <th scope="col">Apellido 2</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="persona in personas" v-bind:key="persona.id">
      <th scope="row">{{persona.id}}</th>
      <td>{{persona.nombre1}}</td>
      <td>{{persona.nombre2}}</td>
      <td>{{persona.apellido1}}</td>
      <td>{{persona.apellido2}}</td>
    </tr>
  </tbody>
</table>
</template>

<script>


export default {

  mounted() {
    console.log("Component mounted.");
    this.obtenerCatalogo('etnias','etnia');
  },
  data() {
    return {
      personas: []
    }
  },
  components: {

  },
  methods: {
      obtenerCatalogo: function(table, column){
      axios.get('/persona')
      .then(response=>{
        this.personas = response.data
      })
    }

      

  },
};
</script>
