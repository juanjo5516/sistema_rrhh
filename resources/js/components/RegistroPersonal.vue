<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Registro</div>
          <div class="card-body">
            <form>
              <form-wizard title="" subtitle="">
                <tab-content title="Detalles personales" icon="ti-user">
                        <!-- Input para colocar Primer nombre -->
                  <div class="form-row">
                    <div class="col-md-6">
                      <span>Primer Nombre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="primer_nombre"
                        placeholder="Primer Nombre"
                      />
                      <p>Message is: {{ primer_nombre }}</p>
                    </div>

                    <div class="col-md-6">
                      <!-- Input para colocar Segundo nombre -->
                      <span>Segundo Nombre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="segundo_nombre"
                        placeholder="Segundo Nombre"
                      />
                      <p>Message is: {{ segundo_nombre }}</p>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                      <span>Tercer Nombre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="tercer_nombre"
                        placeholder="Tercer Nombre"
                      />
                      <p>Message is: {{ tercer_nombre }}</p>
                    </div>
                    <!-- Input para colocar Segundo nombre -->
                  </div>
                  <div class="form-row">
                    <div class="col-md-6">
                        <!-- Input para colocar Primer apellido -->
                        <span>Primer Apellido:</span>
                        <br />
                        <input
                          class="form-control"
                          v-model="primer_apellido"
                          placeholder="Primer Apellido"
                        />
                        <p>Message is: {{ primer_apellido }}</p>
                      </div>
                      <div class="col-md-6">
                        <!-- Input para colocar Segundo apellido -->
                        <span>Segundo Apellido:</span>
                        <br />
                        <input
                          class="form-control"
                          v-model="segundo_apellido"
                          placeholder="Segundo Apellido"
                        />
                        <p>Message is: {{ segundo_apellido }}</p>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-6">
                        <!-- Input para colocar Segundo apellido -->
                        <span>Apellido de casada:</span>
                        <br />
                        <input
                          class="form-control"
                          v-model="apellido_casada"
                          placeholder="Apellido de casada"
                        />
                        <p>Message is: {{ apellido_casada }}</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="radio" id="one" value="Mujer" v-model="picked" />
                      <label for="one">Mujer</label>
                      <br />
                      <input type="radio" id="two" value="Hombre" v-model="picked" />
                      <label for="two">Hombre</label>
                      <br />
                      <span>Género: {{ picked }}</span>
                    </div>
                    <!-- Input para colocar nit -->
                    <div class="form-group">
                        <span>Nit:</span>
                        <input
                          class="form-control"
                          v-model="nit"
                          placeholder="Nit"
                        />
                        <p>Message is: {{ nit }}</p>
                    </div>
                </tab-content>
                <tab-content title="Información adicional">
                    Segundo paso
                </tab-content>
                <tab-content title="Verificación">
                    Tercer paso
                </tab-content>
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
  },
  data() {
    return {
      primer_nombre: "",
      segundo_nombre: "",
      tercer_nombre: "",
      primer_apellido: "",
      segundo_apellido: "",
      apellido_casada: "",
      picked: "",
      nit: "",
    };
  },
  components: {
    FormWizard,
    TabContent,
  },
};
</script>
