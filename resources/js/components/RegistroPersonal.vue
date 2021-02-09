<template>
              <form-wizard @onComplete="onComplete" style="width: 70%;"> 
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
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="022" v-model="formData.renglon">
                      <label class="form-check-label" for="inlineRadio2">022</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="029" v-model="formData.renglon">
                      <label class="form-check-label" for="inlineRadio3">029</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="018" v-model="formData.renglon">
                      <label class="form-check-label" for="inlineRadio4">Sub-grupo 18</label>
                    </div>
                  </div>

                  <!-- Input para colocar Primer nombre -->
                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
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

                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <div class="col-md-6 py-3">
                      <span>Tercer Nombre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.tercer_nombre"
                        placeholder="Tercer Nombre"
                      />
                    </div>
                    <!-- Input para colocar Segundo nombre -->
                  </div>
                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
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

                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
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
                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
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

                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
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

                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
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
                        <div class="error" v-if="!$v.formData.dpi.minLength || !$v.formData.dpi.minLength">Ingrese dpi válido.</div>
                        <div class="error" v-if="!$v.formData.dpi.numeric">Este campo solo debe tener números.</div>
                      </div>

                      <!-- <p>Message is: {{ primer_nombre }}</p> -->
                    </div>
                    
                  </div>

                  <!-- Input para colocar nit -->
                  <div class="form-group" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <span>Nit:</span>
                    <input
                      class="form-control"
                      v-model="formData.nit"
                      placeholder="Nit"
                      :class="hasError('nit') ? 'is-invalid' : ''"
                    />
                    <div v-if="hasError('nit')" class="invalid-feedback">
                      <div class="error" v-if="!$v.formData.nit.required">Campo requerido.</div>
                      <div class="error" v-if="!$v.formData.nit.minLength || !$v.formData.dpi.minLength">Ingrese nit válido.</div>
                      <div class="error" v-if="!$v.formData.nit.numeric">Este campo solo debe tener números.</div>
                    </div>
                  </div>


<!-- PASO 2 STEP -->                  
                </tab-content>
                <tab-content title="Información adicional">
                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <div class="col-md-6 py-3">
                      <span>Seleccione Etnia:  </span> <br>
                        <select v-model="formData.etnia" class="form-control" :class="hasError('etnia') ? 'is-invalid' : ''">

                          <option 
                            v-for="etniaitem in formData.etnias"
                            v-bind:value="etniaitem.id"
                            v-bind:key="etniaitem.id"
                          >
                            {{ etniaitem.etnia }}
                          </option>
                        </select>
                        <div v-if="hasError('etnia')" class="invalid-feedback">
                          <div class="error" v-if="!$v.formData.etnia.required">Campo requerido.</div>
                        </div>
                    </div>
                    <div class="col-md-6 py-3">
                      <span>Seleccione Comunidad Linguistica:  </span> <br>
                        <select v-model="formData.comunidad" class="form-control" :class="hasError('comunidad') ? 'is-invalid' : ''">
                          <option 
                            v-for="comunidaditem in formData.comunidades"
                            v-bind:value="comunidaditem.id"
                            v-bind:key="comunidaditem.id"
                          >
                            {{ comunidaditem.comunidad_linguistica }}
                          </option>
                        </select>
                        <div v-if="hasError('comunidad')" class="invalid-feedback">
                          <div class="error" v-if="!$v.formData.comunidad.required">Campo requerido.</div>
                        </div>
                    </div>

                  </div>

                </tab-content>
<!-- FINALIZA PASO 2 STEP -->
                

<!-- PASO 3 STEP -->

<tab-content title="Discapacidad">
                  <div class="form-group" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">

                    <h2>Sensorial y de la Comunicación</h2>
                    <div class="form-check form-check-inline" :class="hasError('sensorial') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="inlineCheckbox1" name="syc" value="1" v-model="formData.sensorial">
                      <label class="form-check-label" for="inlineCheckbox1">Visual</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('sensorial') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="inlineCheckbox2" name="syc" value="2" v-model="formData.sensorial">
                      <label class="form-check-label" for="inlineCheckbox2">Auditiva</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('sensorial') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="inlineCheckbox3" name="syc" value="3" v-model="formData.sensorial">
                      <label class="form-check-label" for="inlineCheckbox3">Verbal</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('sensorial') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="inlineCheckbox4" name="syc" value="4" v-model="formData.sensorial">
                      <label class="form-check-label" for="inlineCheckbox4">Comprensión</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('sensorial') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="inlineCheckbox5" name="syc" value="5" v-model="formData.sensorial">
                      <label class="form-check-label" for="inlineCheckbox5">Múltiple</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('sensorial') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="inlineCheckbox6" name="syc" value="6" v-model="formData.sensorial">
                      <label class="form-check-label" for="inlineCheckbox6">Ninguna</label>
                    </div>
                    <div v-if="hasError('sensorial')" class="invalid-feedback">
                      <div class="error" v-if="!$v.formData.sensorial.required">Campo requerido.</div>
                    </div>
                  </div>

                  <div class="form-group" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <h2>Motriz</h2>
                    <div class="form-check form-check-inline" :class="hasError('motriz') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" name="motriz" id="inlineCheck1" value="1" v-model="formData.motriz">
                      <label class="form-check-label" for="inlineCheck1">Extremidades inferiores</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('motriz') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" name="motriz" id="inlineCheck2" value="2" v-model="formData.motriz">
                      <label class="form-check-label" for="inlineCheck2">Extremidades superiores</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('motriz') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" name="motriz" id="inlineCheck3" value="3" v-model="formData.motriz">
                      <label class="form-check-label" for="inlineCheck3">Cabeza</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('motriz') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" name="motriz" id="inlineCheck4" value="4" v-model="formData.motriz">
                      <label class="form-check-label" for="inlineCheck4">Cuello</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('motriz') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" name="motriz" id="inlineCheck5" value="5" v-model="formData.motriz">
                      <label class="form-check-label" for="inlineCheck5">Tronco</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('motriz') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" name="motriz" id="inlineCheck6" value="6" v-model="formData.motriz">
                      <label class="form-check-label" for="inlineCheck6">Múltiple</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('motriz') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="inlineCheck7" name="motriz" value="7" v-model="formData.motriz">
                      <label class="form-check-label" for="inlineCheck7">Ninguna</label>
                    </div>
                    <div v-if="hasError('motriz')" class="invalid-feedback">
                      <div class="error" v-if="!$v.formData.motriz.required">Campo requerido.</div>
                    </div>
                  </div>

                  <div class="form-group" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <h2>Mental</h2>
                    <div class="form-check form-check-inline" :class="hasError('mental') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="mental1" name="mental" value="1" v-model="formData.mental">
                      <label class="form-check-label" for="mental1">Intelectual</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('mental') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="mental2" name="mental" value="2" v-model="formData.mental">
                      <label class="form-check-label" for="mental2">Conductual</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('mental') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="mental3" name="mental" value="3" v-model="formData.mental">
                      <label class="form-check-label" for="mental3">Otra</label>
                    </div>
                    <div class="form-check form-check-inline" :class="hasError('mental') ? 'is-invalid' : ''">
                      <input class="form-check-input" type="radio" id="mental4" name="mental" value="4" v-model="formData.mental">
                      <label class="form-check-label" for="mental4">Ninguna</label>
                    </div>
                    <div v-if="hasError('mental')" class="invalid-feedback">
                      <div class="error" v-if="!$v.formData.mental.required">Campo requerido.</div>
                    </div>
                  </div>
                </tab-content>

<!-- FINALIZA PASO 3 STEP -->

<!-- PASO 4 STEP -->

                <tab-content title="Información Académica">
                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <div class="col-md-6 py-3">
                      <span>Seleccione el estudio a Nivel Primario:  </span> <br>
                        <select v-model="formData.nivel_primario_s" class="form-control" :class="hasError('nivel_primario_s') ? 'is-invalid' : ''">
                          <option v-for="nivel in formData.nivel_primario" v-bind:key="nivel">{{nivel}}</option>
                        </select>
                        <div v-if="hasError('nivel_primario_s')" class="invalid-feedback">
                          <div class="error" v-if="!$v.formData.nivel_primario_s.required">Campo requerido.</div>
                        </div>
                    </div>
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <div class="col-md-6 py-3">
                      <span>Seleccione el estudio a Nivel Básico:  </span> <br>
                        <select v-model="formData.nivel_basico_s" class="form-control" :class="hasError('nivel_basico_s') ? 'is-invalid' : ''">
                          <option v-for="nivel in formData.nivel_basico" v-bind:key="nivel">{{nivel}}</option>
                        </select>
                        <div v-if="hasError('nivel_basico_s')" class="invalid-feedback">
                          <div class="error" v-if="!$v.formData.nivel_basico_s.required">Campo requerido.</div>
                        </div>
                    </div>
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <div class="col-md-6 py-3">
                      <span>Seleccione profesión a Nivel Diversificado:  </span> <br>
                        <select v-model="formData.profesion_diversificado" class="form-control" :class="hasError('profesion_diversificado') ? 'is-invalid' : ''">
                          <option 
                            v-for="profesion in formData.profesiones_diversificado"
                            v-bind:value="profesion.id"
                            v-bind:key="profesion.id"
                          >
                            {{ profesion.profesion_diversificado }}
                          </option>
                        </select>
                        <div v-if="hasError('profesion_diversificado')" class="invalid-feedback">
                          <div class="error" v-if="!$v.formData.profesion_diversificado.required">Campo requerido.</div>
                        </div>
                    </div>
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <div class="col-md-6 py-3">
                      <span>Seleccione profesión Universitaria:  </span> <br>
                        <select v-model="formData.profesion" class="form-control" :class="hasError('profesion') ? 'is-invalid' : ''">
                          <option 
                            v-for="profesion in formData.profesiones"
                            v-bind:value="profesion.id"
                            v-bind:key="profesion.id"
                          >
                            {{ profesion.profesion_universitaria }}
                          </option>
                        </select>
                        <div v-if="hasError('profesion')" class="invalid-feedback">
                          <div class="error" v-if="!$v.formData.profesion.required">Campo requerido.</div>
                        </div>
                    </div>
                    <div class="col-md-6 py-3" v-show="formData.profesion!=59">
                      <span>No. Colegiado Activo:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.colegiado"
                        placeholder="No. Colegiado Activo"
                      />
                    </div>
                  </div>


                </tab-content>
                
<!-- FINALIZA PASO 4 STEP -->

<!-- PASO 5 STEP -->
                <tab-content title="Datos Familiares">
                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <div class="col-md-6 py-3">
                      <span>Nombre del padre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.nombre_padre"
                        placeholder="Nombre del Padre"
                        :class="hasError('nombre_padre') ? 'is-invalid' : ''"
                      />
                      <!-- <p>Message is: {{ primer_nombre }}</p> -->
                      <div v-if="hasError('nombre_padre')" class="invalid-feedback">
                        <div class="error" v-if="!$v.formData.nombre_padre.required">Campo requerido.</div>
                      </div>
                    </div>
                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Segundo nombre -->
                      <span>Dirección Domiciliar:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.direccion_padre"
                        placeholder="Dirección Domiciliar del Padre"
                        :class="hasError('direccion_padre') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('direccion_padre')" class="invalid-feedback">
	                      <div class="error" v-if="!$v.formData.direccion_padre.required">Campo requerido.</div>
                      </div>
                    </div>
                    <div class="col-md-6 py-3">
                      <span>Teléfono:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.telefono_padre"
                        placeholder="Teléfono del padre"
                        :class="hasError('telefono_padre') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('telefono_padre')" class="invalid-feedback">
	                      <div class="error" v-if="!$v.formData.telefono_padre.required">Campo requerido.</div>
                      </div>
                    </div>
                  </div>


                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <div class="col-md-6 py-3">
                      <span>Nombre de la Madre:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.nombre_madre"
                        placeholder="Nombre de la Madre"
                        :class="hasError('nombre_madre') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('nombre_madre')" class="invalid-feedback">
	                      <div class="error" v-if="!$v.formData.nombre_madre.required">Campo requerido.</div>
                      </div>
                    </div>
                    <div class="col-md-6 py-3">
                      <!-- Input para colocar Segundo nombre -->
                      <span>Dirección Domiciliar:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.direccion_madre"
                        placeholder="Dirección Domiciliar de la Madre"
                        :class="hasError('nombre_madre') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('direccion_madre')" class="invalid-feedback">
	                      <div class="error" v-if="!$v.formData.direccion_madre.required">Campo requerido.</div>
                      </div>
                    </div>
                    <div class="col-md-6 py-3">
                      <span>Teléfono:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.telefono_madre"
                        placeholder="Teléfono del Madre"
                        :class="hasError('nombre_madre') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('telefono_madre')" class="invalid-feedback">
	                      <div class="error" v-if="!$v.formData.telefono_madre.required">Campo requerido.</div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row" v-if="formData.renglon==='011' || formData.renglon==='022' || formData.renglon==='029' || formData.renglon==='018'">
                    <div class="col-md-6 py-3">
                      <span>Nombre del cónyuge:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.nombre_conyuge"
                        placeholder="Nombre del Cónyuge"
                        :class="hasError('nombre_conyuge') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('nombre_conyuge')" class="invalid-feedback">
	                      <div class="error" v-if="!$v.formData.nombre_conyuge.required">Campo requerido.</div>
                      </div>
                    </div>

                    <div class="col-md-6 py-3">
                      <span>Dirección Domiciliar:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.direccion_conyuge"
                        placeholder="Dirección Domiciliar del Cónyuge"
                        :class="hasError('direccion_conyuge') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('direccion_conyuge')" class="invalid-feedback">
	                      <div class="error" v-if="!$v.formData.direccion_conyuge.required">Campo requerido.</div>
                      </div>
                    </div>

                    <div class="col-md-6 py-3">
                      <span>Teléfono:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.telefono_conyugue"
                        placeholder="Teléfono del Cónyuge"
                        :class="hasError('telefono_conyugue') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('telefono_conyugue')" class="invalid-feedback">
	                      <div class="error" v-if="!$v.formData.telefono_conyugue.required">Campo requerido.</div>
                      </div>
                    </div>
                  </div>

                  
                    <div class="col-md-4 py-3">
                      <span>Cantidad de hijos:</span>
                      <br />
                      <input
                        class="form-control"
                        type="number"
                        v-model="formData.cantidad_hijos"
                        placeholder="¿Cuantos Hijos tienes?"
                        :class="hasError('cantidad_hijos') ? 'is-invalid' : ''"
                      />
                      <div v-if="hasError('cantidad_hijos')" class="invalid-feedback">
	                      <div class="error" v-if="!$v.formData.cantidad_hijos.required">Campo requerido.</div>
                      </div>
                    </div>



                </tab-content>
<!-- FINALIZA PASO 5 STEP -->

<!-- PASO 6 STEP -->
                <tab-content title="Información Laboral">


                  <div class="form-row" v-if="formData.renglon==='011'">
                    <span>El renglón seleccionado es: </span> <h3>{{formData.renglon}}</h3> <br>

                    <div class="col-md-6 py-3">
                      <span>Puesto Funcional:</span>
                      <br />
                      <input
                        class="form-control"
                        v-model="formData.puesto_funcional"
                        placeholder="Puesto Funcional Actual"
                      />
                    </div>

                    <div class="col-md-6 py-3">
                      <span>Puesto Nominal:</span>
                      <select v-model="formData.puesto_nominal" class="form-control">
                        <option v-for="puesto in formData.puestos_nominales" v-bind:value="puesto.id" v-bind:key="puesto.id">
                          {{puesto.puesto}}
                        </option>

                      </select>
                    </div>
                  </div>

                  <div class="form-row" v-if="formData.renglon==='029'">
                    <span>El renglón seleccionado es: </span> <h3>{{formData.renglon}}</h3> <br>



                    <div class="col-md-6 py-3">
                      <span>Tipo de Servicio:</span>
                      <select v-model="formData.puesto_nominal" class="form-control">
                        <option>
                          Tecnico
                        </option>
                        <option value="">Profesional</option>

                      </select>
                    </div>
                  </div>



                </tab-content>
<!-- FINALIZA PASO 6 STEP -->



              </form-wizard>
</template>

<script>
//import { FormWizard, TabContent } from "vue-form-wizard";
//import "vue-form-wizard/dist/vue-form-wizard.min.css";
import {FormWizard, TabContent,ValidationHelper} from 'vue-step-wizard'
import 'vue-step-wizard/dist/vue-step-wizard.css'

import { required } from 'vuelidate/lib/validators';
import { minLength } from 'vuelidate/lib/validators';
import { maxLength } from 'vuelidate/lib/validators';
import { numeric } from 'vuelidate/lib/validators';

export default {
  mixins:[ValidationHelper],
  mounted() {
    console.log("Component mounted.");
    this.obtenerCatalogo('etnias','etnia');
    this.obtenerCatalogo('comunidads','comunidad_linguistica');
    this.obtenerCatalogo('profesions','profesion_universitaria');
    this.obtenerCatalogo('profesion_diversificados','profesion_diversificado');
    this.obtenerCatalogo('nominal_positions','puesto');
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
        lugar_nac:"",
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
        nivel_basico_s:[],
        sensorial:'',
        motriz:'',
        mental:'',
        nombre_padre:'',
        direccion_padre:'',
        telefono_padre:'',
        nombre_madre:'',
        direccion_madre:'',
        telefono_madre:'',
        nombre_conyuge:'',
        direccion_conyuge:'',
        telefono_conyuge:'',
        colegiado:'',
        puestos_nominales:[],
        puesto_nominal:'',
        puesto_funcional:''
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
        dpi: {required,minLength: minLength(13),maxLength: maxLength(13),numeric},
        nit: {required,minLength: minLength(8),maxLength: maxLength(8),numeric} },  //Validation Rules for step 1
        {etnia: {required},
        comunidad: {required}},
        {sensorial: {required},
        motriz: {required},
        mental: {required}},
        {profesion:{required},
        nivel_primario_s: {required},
        nivel_basico_s: {required},
        profesion_diversificado: {required}},
        {nombre_padre: {required},
        direccion_padre: {required},
        telefono_padre: {required},
        nombre_madre: {required},
        direccion_madre: {required},
        telefono_madre: {required},
        nombre_conyuge: {required},
        direccion_conyuge: {required},
        telefono_conyugue: {required},
        cantidad_hijos: {required}}
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

    },
    obtenerCatalogo: function(table, column){
      axios.get(`/obtener-catalogo?table=${table}&column=${column}`)
      .then(response=>{
        if (table=='etnias'){
          this.formData.etnias = response.data
        }
        else if (table=='comunidads'){
          this.formData.comunidades = response.data
        }
        else if (table=='profesions'){
          this.formData.profesiones = response.data
        }
        else if (table=='profesion_diversificados'){
          this.formData.profesiones_diversificado = response.data
        }
        else if (table=='nominal_positions'){
          this.formData.puestos_nominales = response.data
        }
      })
    },
    onComplete() {
      alert("¡Registro Creado satisfactoriamente!");
      console.log("Funcionando botón");
      var url = "/persona";
      axios
        .post(url, {
          dpi: this.formData.dpi,
          nombre1: this.formData.primer_nombre,
          nombre2: this.formData.segundo_nombre,
          nombre3: this.formData.tercer_nombre,
          apellido1: this.formData.primer_apellido,
          apellido2: this.formData.segundo_apellido,
          apellido_casada: this.formData.apellido_casada,
          renglon: this.formData.renglon,
          genero: this.formData.picked,
          etnia: this.formData.etnia,
          comunidad: this.formData.comunidad,
          profesion: this.formData.profesion,
          fecha_nac: this.formData.fecha_nac,
          estado_civil: this.formData.estado_civl,
          lugar_nacimiento: this.formData.lugar_nac,
          nit: this.formData.nit,
          sensorial: this.formData.sensorial,
          motriz: this.formData.motriz,
          mental: this.formData.mental,
          nombre_padre: this.formData.nombre_padre,
          direccion_padre: this.formData.direccion_padre,
          telefono_padre: this.formData.telefono_padre,
          nombre_madre: this.formData.nombre_madre,
          direccion_madre: this.formData.direccion_madre,
          telefono_madre: this.formData.telefono_madre,
          nombre_conyuge: this.formData.nombre_conyuge,
          direccion_conyuge: this.formData.direccion_conyuge,
          telefono_conyuge: this.formData.telefono_conyuge,
          nominal_position: this.formData.puesto_nominal,
          puesto_funcional: this.formData.puesto_funcional
        })
        .then((response) => {
          location.href = "/home";
          console.log(result);
        });

    }
  },
};
</script>
