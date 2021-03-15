<template>
    <div>
        <div
            class="modal fade"
            id="modal_editar"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Editar Registro
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <!-- <pre>{{ objeto }}</pre> -->
                        <div class="mb-3">
                            <label
                                for="exampleInputPassword1"
                                class="form-label"
                                >Seleccione Renglon</label
                            >

                            <select
                                class="form-control"
                                v-model="objeto.renglon"
                            >
                                <option
                                    v-for="renglon in renglones"
                                    v-bind:value="renglon.renglon"
                                    v-bind:key="renglon.renglon"
                                >
                                    {{ renglon.renglon }}
                                </option>
                            </select>
                        </div>

                        <div class="form-row" v-if="objeto.renglon == '011' || objeto.renglon == '022'">
                            <div class="mb-3 col-6">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label"
                                    >Puesto Funcional</label
                                >
                                <input
                                    v-model="objeto.puesto_funcional"
                                    type="text"
                                    class="form-control"
                                />
                            </div>
                            <div class="mb-3 col-6">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label"
                                    >Puesto Nominal</label
                                >
                                <select
                                    class="form-control"
                                    v-model="objeto.nominal_position_id"
                                >
                                    <option
                                        v-for="puesto in puestos_nominales"
                                        v-bind:value="puesto.id"
                                        v-bind:key="puesto.id"
                                    >
                                        {{ puesto.puesto }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row" v-if="objeto.renglon == '029' || objeto.renglon == '018'">
                            <div class="mb-3 col-6">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label"
                                    >Tipo de Servicio</label
                                >

                                <select
                                    class="form-control"
                                    v-model="objeto.tipo_servicio"
                                >
                                    <option
                                        v-for="servicio in tipo_servicios"
                                        v-bind:value="servicio.id"
                                        v-bind:key="servicio.id"
                                    >
                                        {{ servicio.servicio }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="mb-3 col-6">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label"
                                    >Fecha Inicio</label
                                >
                                <input
                                    v-model="objeto.periodo_inicio"
                                    type="date"
                                    class="form-control"
                                />
                            </div>
                            <div class="mb-3 col-6">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label"
                                    >Fecha Fin</label
                                >
                                <input
                                    v-model="objeto.periodo_fin"
                                    type="date"
                                    class="form-control"
                                />
                            </div>
                        </div>

                        <div class="mb-3 form-row">
                            <div class="mb-3 col-6">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label"
                                    >Ubicación Administrativa</label
                                >

                                <select
                                    class="form-control"
                                    v-model="objeto.administrative_ubication_id"
                                >
                                    <option
                                        v-for="ub_admin in ubicacion_administrativa"
                                        v-bind:value="
                                            ub_admin.id
                                        "
                                        v-bind:key="ub_admin.id"
                                        :class="{
                                            'text-primary font-weight-bold':
                                                ub_admin.nivel == 2,
                                            'text-success': ub_admin.nivel == 3,
                                            'text-info': ub_admin.nivel == 4
                                        }"
                                    >
                                        <span v-if="ub_admin.nivel == '1'">
                                            *
                                            {{
                                                ub_admin.ubicacion_administrativa
                                            }}</span
                                        >
                                        <span v-if="ub_admin.nivel == '2'">
                                            <span>**</span
                                            >{{
                                                ub_admin.ubicacion_administrativa
                                            }}</span
                                        >
                                        <span v-if="ub_admin.nivel == '3'">
                                            <span>***</span
                                            >{{
                                                ub_admin.ubicacion_administrativa
                                            }}</span
                                        >
                                        <span v-if="ub_admin.nivel == '4'">
                                            <span>****</span>
                                            {{
                                                ub_admin.ubicacion_administrativa
                                            }}</span
                                        >
                                        <span v-if="ub_admin.nivel == '5'">
                                            <span>*****</span>
                                            {{
                                                ub_admin.ubicacion_administrativa
                                            }}</span
                                        >
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label"
                                    >Ubicación Física</label
                                >

                                <select
                                    class="form-control"
                                    v-model="objeto.physical_location_id"
                                >
                                    <option
                                        v-for="ub in ubicacion_fisica"
                                        v-bind:value="ub.id"
                                        v-bind:key="ub.id"
                                        :class="{
                                            'text-primary font-weight-bold':
                                                ub.nivel == 2,
                                            'text-success': ub.nivel == 3,
                                            'text-info': ub.nivel == 4
                                        }"
                                    >
                                        <span v-if="ub.nivel == '1'">
                                            * {{ ub.ubicacion_fisica }}
                                        </span>
                                        <span v-if="ub.nivel == '2'">
                                            <span>**</span
                                            >{{ ub.ubicacion_fisica }}</span
                                        >
                                        <span v-if="ub.nivel == '3'">
                                            <span>***</span
                                            >{{ ub.ubicacion_fisica }}</span
                                        >
                                        <span v-if="ub.nivel == '4'">
                                            <span>****</span>
                                            {{ ub.ubicacion_fisica }}</span
                                        >
                                        <span v-if="ub.nivel == '5'">
                                            <span>*****</span>
                                            {{ ub.ubicacion_fisica }}</span
                                        >
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 form-row">
                            <div class="mb-3 col-6">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label"
                                    >Unidad Ejecutora</label
                                >

                                <select
                                    class="form-control"
                                    v-model="objeto.unidad_ejecutora_id"
                                >
                                    <option
                                        v-for="unidad in unidades_ejecutoras"
                                        v-bind:value="unidad.id"
                                        v-bind:key="unidad.id"
                                    >
                                        {{ unidad.numero }} -
                                        {{ unidad.unidad_ejecutora }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                            @click="actualizarHistorial"
                        >
                            Actualizar
                        </button>
                        <button class="btn btn-primary" v-on:click="cerrarModal">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        objeto: {
            type: Object
        }
    },
    data () {
        return{
            puestos_nominales:'',
            ubicacion_administrativa:'',
            ubicacion_fisica:'',
            unidades_ejecutoras:'',
            tipo_servicios: [
                { id: 1, servicio: "Técnico" },
                { id: 2, servicio: "Profesional" }
            ],
            renglones: [
                { renglon: "011" },
                { renglon: "029" },
                { renglon: "018" },
                { renglon: "022" }
            ],
        }

    },
    mounted (){
        this.getUbicacionAdministrativa();
        this.getUbicacionFisica();
        this.getUnidadEjecutora();
        this.obtenerCatalogo('nominal_positions','puesto');
    },
    methods: {
        actualizarHistorial(){
            console.log("Método actualizar historial");
            console.log(this.objeto);
            axios.put(`/api/historial/${this.objeto.idHistorial}`,
                this.objeto

            )
            .then(response => {
                this.cerrarModal();
                this.$emit('refrescar-tabla-historico');
                Swal.fire({
                    title: 'Actualización',
                    text: 'Registro Actualizado Correctamente'
                });
            }).catch(error => {

            });
        },
        cerrarModal(){
            $('#modal_editar').modal('hide');
        },
        borrar() {
            axios
                .delete(this.url)
                .then(response => {
                    location.href = "";
                })
                .cath(error => {
                    console.log(error);
                    alert("ocurrió un error.");
                });
        },
        obtenerCatalogo: function(table, column) {
            axios
                .get(`/obtener-catalogo?table=${table}&column=${column}`)
                .then(response => {
                    if (table == "nominal_positions") {
                        this.puestos_nominales = response.data;
                    }
                });
        },
        getUbicacionAdministrativa() {
            axios
                .get("/api/ubicacion_administrativa")
                .then(res => {
                    this.ubicacion_administrativa = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getUbicacionFisica() {
            axios
                .get("/api/ubicacion_fisica")
                .then(res => {
                    this.ubicacion_fisica = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getUnidadEjecutora() {
            axios
                .get("/api/unidades_ejecutoras")
                .then(res => {
                    this.unidades_ejecutoras = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
    }
};
</script>
