<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Crear Rol</div>
          <div class="card-body">
            <form method="POST" v-on:submit.prevent="crearRol">
                <div class="form-row">
                    <div class="col-12 py-3">
                        <div class="form-row">
                            <div class="col-md-10 py-3">
                            <span>Nombre del Rol:</span>
                            <br />
                            <input
                                class="form-control"
                                v-model="rol"
                                placeholder="Rol"
                            />

                            <!-- <p>Message is: {{ primer_nombre }}</p> -->
                            </div>

                            <div class="col-md-2 py-3">
                                <br>
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
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
  mounted() {
    console.log("Component mounted.");
    this.obtenerCatalogo("etnias", "etnia");
    this.obtenerCatalogo("comunidads", "comunidad_linguistica");
    this.obtenerCatalogo("profesions", "profesion_universitaria");
    this.obtenerCatalogo("roles", "name");
  },
  data() {
    return {
      rol:""
    };
  },
  components: {
    FormWizard,
    TabContent,
  },
  methods: {
    crearRol: function () {
      alert("¡Registro Creado satisfactoriamente!");
      console.log("Funcionando botón");
      var url = "/rol";
      axios
        .post(url, {
          rol: this.rol
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
