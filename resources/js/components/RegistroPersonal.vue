<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Registro</div>
          <div class="card-body">
            <form method="POST" v-on:submit.prevent="crearPersona">
              <form-wizard
                @on-complete="crearPersona"
                title=""
                subtitle=""
                next-button-text="Siguiente"
                back-button-text="Atrás"
                finish-button-text="Finalizar"
                color="#20A7E1"
                shape="circle"
              >
                <tab-content title="Detalles personales" icon="ti-user">
                  <!-- Input para colocar Primer nombre -->
                  <div class="form-row">
                    <div class="col-md-6 py-3">
                      <span>DPI:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="dpi"
                        placeholder="Dpi"
                      />

                      <!-- <p>Message is: {{ primer_nombre }}</p> -->
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 py-3">
                      <span>Primer Nombre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="primer_nombre"
                        placeholder="Primer Nombre"
                      />

                      <!-- <p>Message is: {{ primer_nombre }}</p> -->
                    </div>

                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Segundo nombre -->
                      <span>Segundo Nombre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="segundo_nombre"
                        placeholder="Segundo Nombre"
                      />
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 py-3">
                      <span>Tercer Nombre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="tercer_nombre"
                        placeholder="Tercer Nombre"
                      />
                    </div>
                    <!-- Input para colocar Segundo nombre -->
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Primer apellido -->
                      <span>Primer Apellido:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="primer_apellido"
                        placeholder="Primer Apellido"
                      />
                    </div>
                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Segundo apellido -->
                      <span>Segundo Apellido:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="segundo_apellido"
                        placeholder="Segundo Apellido"
                      />
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Segundo apellido -->
                      <span>Apellido de casada:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="apellido_casada"
                        placeholder="Apellido de casada"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <span>Género: </span> <br />
                    <input
                      type="radio"
                      id="one"
                      value="Mujer"
                      v-model="picked"
                    />
                    <label for="one">Mujer</label>
                    <br />
                    <input
                      type="radio"
                      id="two"
                      value="Hombre"
                      v-model="picked"
                    />
                    <label for="two">Hombre</label>
                    <br />
                    
                  </div>
                  <!-- Input para colocar nit -->
                  <div class="form-group">
                    <span>Nit:</span>
                    <input
                      class="form-control"
                      v-model="nit"
                      placeholder="Nit"
                    />
                  </div>
                </tab-content>
                <tab-content title="Información adicional">
                  <div class="form-row">
                    <div class="col-md-6 py-3">
                      <span>Seleccione Etnia:  </span> <br>
                        <select v-model="Seleccione">

                          <option 
                            v-for="etnia in etnias"
                            v-bind:value="etnia.id"
                          >
                            {{ etnia.etnia }}
                          </option>
                        </select>
                    </div>
                    <div class="col-md-6 py-3">
                      <span>Seleccione Comunidad Linguistica:  </span> <br>
                        <select v-model="selected">
                          <option 
                            v-for="comunidad in comunidades"
                            v-bind:value="comunidad.id"
                          >
                            {{ comunidad.comunidad_linguistica }}
                          </option>
                        </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 py-3">
                      <span>Seleccione profesión Universitaria:  </span> <br>
                        <select v-model="selected">
                          <option 
                            v-for="profesion in profesiones"
                            v-bind:value="profesion.id"
                          >
                            {{ profesion.profesion_universitaria }}
                          </option>
                        </select>
                    </div>
                    <div class="col-md-6 py-3">
                      <span>Seleccione Renglon:  </span> <br>
                        <select v-model="selected">
                          <option 
                            v-for="renglon in renglones"
                            v-bind:value="renglon.numero"
                          >
                            {{ renglon.numero }}
                          </option>
                        </select>
                    </div>
                  </div>


                </tab-content>
                <tab-content title="Verificación"> Tercer paso </tab-content>
              </form-wizard>
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
    this.obtenerCatalogo('etnias','etnia');
    this.obtenerCatalogo('comunidads','comunidad_linguistica');
    this.obtenerCatalogo('profesions','profesion_universitaria');
  },
  data() {
    return {
      primer_nombre: "",
      dpi:"",
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
        {id:1,numero: '011'},
        {id:2,numero: '022'},
        {id:3,numero: '029'},
        {id:3,numero: '018'}
      ]

    };
  },
  components: {
    FormWizard,
    TabContent,
  },
  methods: {
    crearPersona: function () {
      alert("¡Nítido!");
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
          apellido_casada: this.apellido_casada
        })
        .then((response) => {
          console.log(result);
        });
      location.href = "/home";
    },
    obtenerCatalogo: function(table, column){
      axios.get(`/obtener-catalogo?table=${table}&column=${column}`)
      .then(response=>{
        if (table=='etnias'){
          this.etnias = response.data
        }
        else if (table=='comunidads'){
          this.comunidades = response.data
        }
        else if (table=='profesions'){
          this.profesiones = response.data
        }
      })
    }
  },
};
</script>
