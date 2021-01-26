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
                  <div class="form-row">
                    <div class="col-md-6">                   
                      <span>Género: </span> <br />
                      <input
                        type="radio"
                        id="one"
                        value="F"
                        v-model="picked"
                      />
                      <label for="one">Femenino</label>
                      <br />
                      <input
                        type="radio"
                        id="two"
                        value="M"
                        v-model="picked"
                      />
                      <label for="two">Masculino</label>
                      <br />    
                    </div>
                      <div class="col-md-6">
                        <span>Fecha de Nacimiento:</span>
                        <br />
                        <input
                          class="form-control"
                          type="date"
                          v-model="fecha_nac"
                          placeholder="Primer Nombre"
                        />
                      </div>               
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
                        <select v-model="etnia">

                          <option 
                            v-for="etnia in etnias"
                            v-bind:value="etnia.id"
                            v-bind:key="etnia.id"
                          >
                            {{ etnia.etnia }}
                          </option>
                        </select>
                    </div>
                    <div class="col-md-6 py-3">
                      <span>Seleccione Comunidad Linguistica:  </span> <br>
                        <select v-model="comunidad">
                          <option 
                            v-for="comunidad in comunidades"
                            v-bind:value="comunidad.id"
                            v-bind:key="comunidad.id"
                          >
                            {{ comunidad.comunidad_linguistica }}
                          </option>
                        </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 py-3">
                      <span>Seleccione profesión Universitaria:  </span> <br>
                        <select v-model="profesion">
                          <option 
                            v-for="profesion in profesiones"
                            v-bind:value="profesion.id"
                            v-bind:key="profesion.id"
                          >
                            {{ profesion.profesion_universitaria }}
                          </option>
                        </select>
                    </div>
                    <div class="col-md-6 py-3">
                      <span>Seleccione Renglon:  </span> <br>
                        <select v-model="renglon">
                          <option 
                            v-for="renglon in renglones"
                            v-bind:value="renglon.numero"
                            v-bind:key="renglon.numero"
                          >
                            {{ renglon.numero }}
                          </option>
                        </select>
                    </div>
                  </div>

<!-- PASO 3 STEP -->
                </tab-content>
                <tab-content title="Discapacidad">
                  <div class="form-group">
                    <span>Sensorial y de la Comunicación</span>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                      <label class="form-check-label" for="inlineCheckbox1">Visual</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                      <label class="form-check-label" for="inlineCheckbox2">Auditiva</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                      <label class="form-check-label" for="inlineCheckbox2">Verbal</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                      <label class="form-check-label" for="inlineCheckbox2">Comprensión</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
                      <label class="form-check-label" for="inlineCheckbox3">Múltiple</label>
                    </div>
                  </div>
                  
                </tab-content>
<!-- FINALIZA PASO 3 STEP -->

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
      ],
      renglon:"",
      etnia:"",
      comunidad:"",
      profesion:"",
      fecha_nac:""

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
          fecha_nac: this.fecha_nac
        })
        .then((response) => {
          location.href = "/home";
          console.log(result);
          

        });

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
