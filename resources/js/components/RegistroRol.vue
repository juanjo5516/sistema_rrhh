<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <span>Registro</span>
            <a class="btn btn-primary float-right" v-bind:href="route">Crear Rol</a>
          </div>
          <div class="card-body">

                <div class="form-row">
                    <div class="col-12 py-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Rol
                                    </th>
                                    <th>
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="rol in roles" v-bind:key="rol.id">
                                    <td>
                                    {{rol.name}}
                                    </td>
                                    <td>
                                      <form v-bind:action="`rol/${rol.id}`" method="POST">
                                        <input type="hidden" name="_token" v-bind:value="token">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger text-white" >Eliminar</button>
                                      </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { FormWizard, TabContent } from "vue-form-wizard";
import "vue-form-wizard/dist/vue-form-wizard.min.css";

export default {
  created() {
    console.log("Component mounted.");
    this.obtenerCatalogo("roles", "name");
  },
  props:[
    "route",
    "token"
  ],
  data() {
    return {
      primer_nombre: "",
      dpi: "",
      segundo_nombre: "",
      tercer_nombre: "",
      primer_apellido: "",
      segundo_apellido: "",
      apellido_casada: "",
      picked: "",
      nit: "",
      etnias: [],
      comunidades: [],
      profesiones: [],
      renglones: [
        { id: 1, numero: "011" },
        { id: 2, numero: "022" },
        { id: 3, numero: "029" },
        { id: 3, numero: "018" },
      ],
      renglon: "",
      etnia: "",
      comunidad: "",
      profesion: "",
      roles:[]
    };
  },
  components: {
    FormWizard,
    TabContent,
  },
  methods: {
    crearPersona: function () {
      alert("¡Registro Creado satisfactoriamente!");
      console.log("Funcionando botón");
      var url = "/persona";
      axios
        .post(url, {
          dpi: this.dpi,
          nombre1: this.primer_nombre,
          nombre2: this.segundo_nombre,
          nombre3: this.tercer_nombre,
          apellido1: this.primer_apellido,
          apellido2: this.segundo_apellido,
          apellido_casada: this.apellido_casada,
          renglon: this.renglon,
          genero: this.picked,
          etnia: this.etnia,
          comunidad: this.comunidad,
          profesion: this.profesion,
        })
        .then((response) => {
          location.href = "/home";
          console.log(result);
        });
    },
    obtenerCatalogo: function (table, column) {
      axios
        .get(`/obtener-catalogo?table=${table}&column=${column}`)
        .then((response) => {
          if (table == "etnias") {
            this.etnias = response.data;
          } else if (table == "comunidads") {
            this.comunidades = response.data;
          } else if (table == "profesions") {
            this.profesiones = response.data;
          } else if (table == "roles") {
            this.roles = response.data;
          }
        });
    },
  },
};
</script>
