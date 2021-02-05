<template>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre 1</th>
      <th scope="col">Nombre 2</th>
      <th scope="col">Apellido 1</th>
      <th scope="col">Apellido 2</th>
      <th scope="col">Nombre Completo</th>
      <th scope="col">dpi</th>
      <th scope="col">Renglón</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="persona in personas" v-bind:key="persona.id">
      <th scope="row">{{persona.id}}</th>
      <td>{{persona.nombre1}}</td>
      <td>{{persona.nombre2}}</td>
      <td>{{persona.apellido1}}</td>
      <td>{{persona.apellido2}}</td>
      <td>{{nombreCompleto(persona.nombre1,persona.nombre2,persona.nombre3,persona.apellido1,persona.apellido2,persona.apellido_casada)}}</td>
      <td>{{persona.dpi}}</td>
      <td>{{persona.renglon}}</td>
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
    },
    nombreCompleto (n1,n2,n3,a1,a2,ac){
        if (n1 == null){
            n1=''
        }
        if (n2 == null){
            n2=''
        }
        if (n3 == null){
            n3=''
        }
        if (a1 == null){
            a1=''
        }
        if (a2 == null){
            a2=''
        }
        if (ac == null){
            ac=''
        }
        return n1+" "+n2+" "+n3+" "+a1+" "+a2+" "+ac

    }

      

  },
};
</script>
