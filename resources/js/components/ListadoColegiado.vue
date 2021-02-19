<template>
  <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Nombre Completo</th>
      <th scope="col">dpi</th>
      <th scope="col">No. Colegiado</th>
      <th scope="col">Fecha Fin de Vigencia de Colegiado</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="persona in personas" v-bind:key="persona.id">
      <th scope="row">{{persona.id}}</th>
      <td>{{nombres(persona.nombre1,persona.nombre2,persona.nombre3)}}</td>
      <td>{{apellidos(persona.apellido1,persona.apellido2,persona.apellido_casada)}}</td>
      <td>{{nombreCompleto(persona.nombre1,persona.nombre2,persona.nombre3,persona.apellido1,persona.apellido2,persona.apellido_casada)}}</td>
      <td>{{persona.dpi}}</td>
      <td>{{persona.no_colegiado}}</td>
      <td>{{persona.fecha_fin_vigencia}}</td>

    </tr>
  </tbody>
</table>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
    this.obtenerDatos();
  },
  data() {
    return {
      personas: []
    }
  },
  components: {
  },
  methods: {
      obtenerDatos () {
      axios.get('/colegiados')
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

    },
    nombres (n1,n2,n3){
        if (n1 == null){
            n1=''
        }
        if (n2 == null){
            n2=''
        }
        if (n3 == null){
            n3=''
        }
        return n1+" "+n2+" "+n3
    },
    apellidos (a1,a2,ac){
        if (a1 == null){
            a1=''
        }
        if (a2 == null){
            a2=''
        }
        if (ac == null){
            ac=''
        }
        return a1+" "+a2+" "+ac
    }
  },
};
</script>