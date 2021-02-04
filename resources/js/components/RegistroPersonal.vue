<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Registro</div>
          <div class="card-body">
            <form method="POST" v-on:submit.prevent="">
              <form-wizard>
                <!--@on-complete="crearPersona"
                title=""
                subtitle=""
                next-button-text="Siguiente"
                back-button-text="Atrás"
                finish-button-text="Finalizar"
                color="#20A7E1"
                shape="circle"
              >-->
                <tab-content title="Detalles personales" icon="ti-user">
                  <div class="row justify-content-md-center">
                    <h4>Selecciona Renglon Presupuestario</h4> <br>
                  </div>
                  <div class="row justify-content-md-center">     
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="011" v-model="formData.renglon">
                      <label class="form-check-label" for="inlineRadio1">011</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="022" v-model="renglon">
                      <label class="form-check-label" for="inlineRadio2">022</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="029" v-model="renglon">
                      <label class="form-check-label" for="inlineRadio3">029</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="018" v-model="renglon">
                      <label class="form-check-label" for="inlineRadio4">Sub-grupo 18</label>
                    </div>
                  </div>

                  <!-- Input para colocar Primer nombre -->
                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6 py-3">
                      <span>Primer Nombre:</span>
                      <br />
                      <input
                        type="text"
                        class="form-control"
                        v-model="formData.primer_nombre"
                        placeholder="Primer Nombre"
                        :class="hasError('primer_nombre') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('primer_nombre')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.primer_nombre.required">Campo requerido.</div>
                        <div class="error" v-if="!$v.formData.primer_nombre.minLength">El campo debe tener más de 2 caracteres.</div>
                      </div>

                      <!-- <p>Message is: {{ primer_nombre }}</p> -->
                    </div>

                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Segundo nombre -->
                      <span>Segundo Nombre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.segundo_nombre"
                        placeholder="Segundo Nombre"
                        :class="hasError('segundo_nombre') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('segundo_nombre')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.segundo_nombre.required">Campo requerido.</div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011'">
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
                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Primer apellido -->
                      <span>Primer Apellido:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.primer_apellido"
                        placeholder="Primer Apellido"
                        :class="hasError('primer_apellido') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('primer_apellido')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.primer_apellido.required">Campo requerido.</div>
                      </div>
                    </div>
                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Segundo apellido -->
                      <span>Segundo Apellido:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.segundo_apellido"
                        placeholder="Segundo Apellido"
                        :class="hasError('segundo_apellido') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('segundo_apellido')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.segundo_apellido.required">Campo requerido.</div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011'">
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
                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6">                   
                      <span>Género: </span> <br />
                      <input
                        type="radio"
                        id="one"
                        value="F"
                        v-model="formData.picked"
                        :class="hasError('picked') ? 'is-invalid' : ''"
                      />
                      <label for="one">Femenino</label>
                      <br />
                      <input
                        type="radio"
                        id="two"
                        value="M"
                        v-model="formData.picked"
                        :class="hasError('picked') ? 'is-invalid' : ''"
                      />
                      <label for="two">Masculino</label>
                      <br />
                      <div v-if="hasError('picked')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.picked.required">Campo requerido.</div>
                      </div>    
                    </div>
                    <div class="col-md-6">
                        <span>Fecha de Nacimiento:</span>
                        <br />
                        <input
                          class="form-control"
                          type="date"
                          v-model="formData.fecha_nac"
                          :class="hasError('fecha_nac') ? 'is-invalid' : ''"
                        />
                        <div v-if="hasError('fecha_nac')" class="invalid-feedback">
                          <div class="error" v-if="!$v.formData.fecha_nac.required">Campo requerido.</div>
                        </div>
                    </div>               
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6">                   
                      <span>Estado Civil: </span> <br />
                      <input
                        type="radio"
                        id="one_estado"
                        value="S"
                        v-model="formData.estado_civl"
                        :class="hasError('estado_civl') ? 'is-invalid' : ''"
                      />
                      <label for="one_estado">Soltero(a)</label>
                      <br />
                      <input
                        type="radio"
                        id="two_estado"
                        value="C"
                        v-model="formData.estado_civl"
                        :class="hasError('estado_civl') ? 'is-invalid' : ''"
                      />
                      <label for="two_estado">Casado(a)</label>
                      <br />   
                      <div v-if="hasError('estado_civl')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.estado_civl.required">Campo requerido.</div>
                      </div> 
                    </div>
                    <div class="col-md-6">
                        <span>Lugar de Nacimiento:</span>
                        <br />
                        <input
                          class="form-control"
                          type="text"
                          v-model="formData.lugar_nac"
                          placeholder="Lugar de Nacimiento"
                          :class="hasError('lugar_nac') ? 'is-invalid' : ''"
                        />
                    </div>    
                    <div v-if="hasError('lugar_nac')" class="invalid-feedback">
                      <div class="error" v-if="!$v.formData.lugar_nac.required">Campo requerido.</div>
                    </div>           
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6 py-3">
                      <span>DPI:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.dpi"
                        placeholder="Dpi"
                        :class="hasError('dpi') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('dpi')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.dpi.required">Campo requerido.</div>
                      </div>

                      <!-- <p>Message is: {{ primer_nombre }}</p> -->
                    </div>
                    
                  </div>

                  <!-- Input para colocar nit -->
                  <div class="form-group" v-if="formData.renglon==='011'">
                    <span>Nit:</span>
                    <input
                      class="form-control"
                      v-model="formData.nit"
                      placeholder="Nit"
                      :class="hasError('nit') ? 'is-invalid' : ''"
                    />
                    <div v-if="hasError('nit')" class="invalid-feedback">
                      <div class="error" v-if="!$v.formData.nit.required">Campo requerido.</div>
                    </div>
                  </div>
                </tab-content>
                <tab-content title="Información adicional">
                  <div class="form-row" v-if="formData.renglon==='011'">
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

                </tab-content>
                

<!-- PASO 3 STEP -->
                <tab-content title="Información Académica">
                  <div class="form-row" v-if="formData.renglon==='011'">
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
                      <span>No. Colegiado Activo:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="colegiado"
                        placeholder="No. Colegiado Activo"
                      />
                    </div>

                  </div>

                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6 py-3">
                      <span>Seleccione el estudio a Nivel Primario:  </span> <br>
                        <select v-model="nivel_primario_s">
                          <option v-for="nivel in nivel_primario" v-bind:key="nivel">{{nivel}}</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6 py-3">
                      <span>Seleccione el estudio a Nivel Básico:  </span> <br>
                        <select v-model="nivel_basico_s">
                          <option v-for="nivel in nivel_basico" v-bind:key="nivel">{{nivel}}</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6 py-3">
                      <span>Seleccione profesión a Nive Diversificado:  </span> <br>
                        <select v-model="profesion_diversificado">
                          <option 
                            v-for="profesion in profesiones_diversificado"
                            v-bind:value="profesion.id"
                            v-bind:key="profesion.id"
                          >
                            {{ profesion.profesion_diversificado }}
                          </option>
                        </select>
                    </div>
                  </div>
                </tab-content>
<!-- FINALIZA PASO 3 STEP -->

<!-- PASO 4 STEP -->
                <tab-content title="Discapacidad">
                  <div class="form-group" v-if="formData.renglon==='011'">

                    <h2>Sensorial y de la Comunicación</h2>
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
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                      <label class="form-check-label" for="inlineCheckbox3">Múltiple</label>
                    </div>
                  </div>

                  <div class="form-group" v-if="formData.renglon==='011'">
                    <h2>Motriz</h2>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                      <label class="form-check-label" for="inlineCheckbox1">Extremidades inferiores</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                      <label class="form-check-label" for="inlineCheckbox2">Extremidades superiores</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                      <label class="form-check-label" for="inlineCheckbox2">Cabeza</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                      <label class="form-check-label" for="inlineCheckbox2">Cuello</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                      <label class="form-check-label" for="inlineCheckbox3">Tronco</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                      <label class="form-check-label" for="inlineCheckbox3">Múltiple</label>
                    </div>
                  </div>

                  <div class="form-group" v-if="formData.renglon==='011'">
                    <h2>Mental</h2>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                      <label class="form-check-label" for="inlineCheckbox1">Intelectual</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                      <label class="form-check-label" for="inlineCheckbox2">Conductual</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                      <label class="form-check-label" for="inlineCheckbox2">Otra</label>
                    </div>
                  </div>
                </tab-content>
<!-- FINALIZA PASO 4 STEP -->

<!-- PASO 5 STEP -->
                <tab-content title="Datos Familiares">
                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6 py-3">
                      <span>Nombre del padre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="nombre_padre"
                        placeholder="Nombre del Padre"
                      />
                      <!-- <p>Message is: {{ primer_nombre }}</p> -->
                    </div>
                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Segundo nombre -->
                      <span>Dirección Domiciliar:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="direccion_padre"
                        placeholder="Dirección Domiciliar del Padre"
                      />
                    </div>
                    <div class="col-md-6 py-3">
                      <span>Teléfono:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="telefono_padre"
                        placeholder="Teléfono del padre"
                      />
                    </div>
                  </div>


                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6 py-3">
                      <span>Nombre de la Madre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="nombre_madre"
                        placeholder="Nombre de la Madre"
                      />
                    </div>
                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Segundo nombre -->
                      <span>Dirección Domiciliar:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="direccion_madre"
                        placeholder="Dirección Domiciliar de la Madre"
                      />
                    </div>
                    <div class="col-md-6 py-3">
                      <span>Teléfono:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="telefono_madre"
                        placeholder="Teléfono del Madre"
                      />
                    </div>
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011'">
                    <div class="col-md-6 py-3">
                      <span>Nombre del cónyuge:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="nombre_conyuge"
                        placeholder="Nombre del Cónyuge"
                      />
                    </div>

                    <div class="col-md-6 py-3">
                      <span>Dirección Domiciliar:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="direccion_conyuge"
                        placeholder="Dirección Domiciliar del Cónyuge"
                      />
                    </div>

                    <div class="col-md-6 py-3">
                      <span>Teléfono:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="telefono_conyugue"
                        placeholder="Teléfono del Cónyuge"
                      />
                    </div>
                  </div>

                  <div class="form-group" v-if="formData.renglon==='011'">

                    <div class="col-md-4 py-3">
                      <span>Cantidad de hijos:</span>
                      <br />
                      <input
                        class="form-control"
                        type="number"
                        v-model="cantidad_hijos"
                        placeholder="¿Cuantos Hijos tienes?"
                      />
                    </div>
                    <div v-for="i in cantidad_hijos" v-bind:key="i">
                      {{i}}Hijos
                    </div>

                  </div>
                </tab-content>
<!-- FINALIZA PASO 5 STEP -->



              </form-wizard>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//import { FormWizard, TabContent } from "vue-form-wizard";
//import "vue-form-wizard/dist/vue-form-wizard.min.css";
import {FormWizard, TabContent,ValidationHelper} from 'vue-step-wizard'
import 'vue-step-wizard/dist/vue-step-wizard.css'

import { required } from 'vuelidate/lib/validators';
import { minLength } from 'vuelidate/lib/validators';

export default {
  mixins:[ValidationHelper],
  mounted() {
    console.log("Component mounted.");
    this.obtenerCatalogo('etnias','etnia');
    this.obtenerCatalogo('comunidads','comunidad_linguistica');
    this.obtenerCatalogo('profesions','profesion_universitaria');
    this.obtenerCatalogo('profesion_diversificados','profesion_diversificado');
  },
  data() {
    return {
      formData:{
        primer_nombre:'',
        dpi:"",
        segundo_nombre: "",
        tercer_nombre: "",
        primer_apellido: "",
        segundo_apellido: "",
        apellido_casada: "",
        picked: "",
        estado_civl:"",
        nit: "",
        cantidad_hijos:0,
        etnias: [],
        comunidades: [],
        profesiones: [],
        profesiones_diversificado:[],
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
        profesion_diversificado:"",
        fecha_nac:"",
        nivel_primario:['Primero','Segundo','Tercero','Cuarto','Quinto','Sexto','Sin estudio de nivel Primario'],
        nivel_basico:['Primero Básico','Segundo Básico','Tercero Básico','Sin estudio de nivel Básico'],
        nivel_primario_s:[],
        nivel_basico_s:[]
      },
      validationRules:[
        {primer_nombre: {required,minLength: minLength(3)},
        segundo_nombre: {required},
        primer_apellido: {required},
        segundo_apellido: {required},
        picked: {required},
        fecha_nac: {required},
        estado_civl: {required},
        lugar_nac: {required},
        dpi: {required},
        nit: {required} },  //Validation Rules for step 1

    ]
    };
  },
  watch:{
    cantidad_hijos: function(){
      this.i=0
    }
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
        else if (table=='profesion_diversificados'){
          this.profesiones_diversificado = response.data
        }
      })
    }
  },
};
</script>
