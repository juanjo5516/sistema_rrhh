<template>
    <form v-on:submit.prevent="saveData" class="mb-4">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
                >Seleccione Renglon</label
            >

            <select class="form-control" v-model="renglon_select">
                <option
                    v-for="renglon in renglones"
                    v-bind:value="renglon.renglon"
                    v-bind:key="renglon.renglon"
                >
                    {{ renglon.renglon }}
                </option>
            </select>
        </div>

        <div
            class="form-row"
            v-if="renglon_select == '011' || renglon_select == '022'"
        >
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Puesto Funcional</label
                >
                <input
                    v-model="puesto_funcional"
                    type="text"
                    class="form-control"
                />
            </div>
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Puesto Nominal</label
                >
                <select class="form-control" v-model="position_nominal_select">
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

        <div
            class="form-row"
            v-if="renglon_select == '018' || renglon_select == '029'"
        >
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Tipo de Servicio</label
                >

                <select class="form-control" v-model="t_servicio_select">
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

        <div
            class="form-row"
            v-if="
                renglon_select == '018' ||
                    renglon_select == '029' ||
                    renglon_select == '011' ||
                    renglon_select == '022'
            "
        >
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Fecha Inicio</label
                >
                <input
                    v-model="fecha_inicio"
                    type="date"
                    class="form-control"
                />
            </div>
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Fecha Fin</label
                >
                <input v-model="fecha_fin" type="date" class="form-control" />
            </div>
        </div>

        <div
            class="mb-3 form-row"
            v-if="
                renglon_select == '018' ||
                    renglon_select == '029' ||
                    renglon_select == '011' ||
                    renglon_select == '022'
            "
        >
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Ubicación Administrativa</label
                >

                <select class="form-control" v-model="ub_admin_select">
                    <option
                        v-for="ub_admin in ubicacion_administrativa"
                        v-bind:value="ub_admin.id"
                        v-bind:key="ub_admin.id"
                        :class="{
                            'text-primary font-weight-bold':
                                ub_admin.nivel == 2,
                            'text-success': ub_admin.nivel == 3,
                            'text-info': ub_admin.nivel == 4
                        }"
                    >
                        <span v-if="ub_admin.nivel == '1'">
                            * {{ ub_admin.ubicacion_administrativa }}</span
                        >
                        <span v-if="ub_admin.nivel == '2'">
                            <span>**</span
                            >{{ ub_admin.ubicacion_administrativa }}</span
                        >
                        <span v-if="ub_admin.nivel == '3'">
                            <span>***</span
                            >{{ ub_admin.ubicacion_administrativa }}</span
                        >
                        <span v-if="ub_admin.nivel == '4'">
                            <span>****</span>
                            {{ ub_admin.ubicacion_administrativa }}</span
                        >
                        <span v-if="ub_admin.nivel == '5'">
                            <span>*****</span>
                            {{ ub_admin.ubicacion_administrativa }}</span
                        >
                    </option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Ubicación Física</label
                >

                <select class="form-control" v-model="ub_fis_select">
                    <option
                        v-for="ub in ubicacion_fisica"
                        v-bind:value="ub.id"
                        v-bind:key="ub.id"
                        :class="{
                            'text-primary font-weight-bold': ub.nivel == 2,
                            'text-success': ub.nivel == 3,
                            'text-info': ub.nivel == 4
                        }"
                    >
                        <span v-if="ub.nivel == '1'">
                            * {{ ub.ubicacion_fisica }}
                        </span>
                        <span v-if="ub.nivel == '2'">
                            <span>**</span>{{ ub.ubicacion_fisica }}</span
                        >
                        <span v-if="ub.nivel == '3'">
                            <span>***</span>{{ ub.ubicacion_fisica }}</span
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

        <div
            class="mb-3 form-row"
            v-if="
                renglon_select == '018' ||
                    renglon_select == '029' ||
                    renglon_select == '011' ||
                    renglon_select == '022'
            "
        >
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Unidad Ejecutora</label
                >

                <select class="form-control" v-model="unidad_ejecutora_select">
                    <option
                        v-for="unidad in unidades_ejecutoras"
                        v-bind:value="unidad.id"
                        v-bind:key="unidad.id"
                    >
                        {{ unidad.numero }} - {{ unidad.unidad_ejecutora }}
                    </option>
                </select>
            </div>
        </div>

        <button @click="addHistorial" class="btn btn-primary">Guardar</button>
    </form>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
        this.getUbicacionAdministrativa();
        this.getUbicacionFisica();
        this.getUnidadEjecutora();
        this.obtenerCatalogo('nominal_positions','puesto');
    },
    props: {
        id: {
            type: Number,
            default: 0
        }
    },
    data() {
        return {
            ingreso: "",
            renglon_select: "",
            renglones: [
                { renglon: "011" },
                { renglon: "029" },
                { renglon: "018" },
                { renglon: "022" }
            ],
            tipo_servicios: [
                { id: 1, servicio: "Técnico" },
                { id: 2, servicio: "Profesional" }
            ],
            fecha_inicio: "",
            fecha_fin: "",
            ubicacion_administrativa: [],
            ub_admin_select: "",
            ubicacion_fisica: [],
            ub_fis_select: "",
            unidades_ejecutoras: [],
            unidad_ejecutora_select: "",
            puesto_nominal: "",
            puesto_funcional: "",
            t_servicio_select: "",
            puestos_nominales: [],
            position_nominal_select:''
        };
    },
    watch: {},
    components: {},
    methods: {
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
        addHistorial() {
            axios
                .post("/historico", {
                    renglon: this.renglon_select,
                    persona_id: this.id,
                    periodo_inicio: this.fecha_inicio,
                    periodo_fin: this.fecha_fin,
                    puesto_nominal: this.position_nominal_select,
                    puesto_funcional: this.puesto_funcional,
                    tipo_servicio: this.t_servicio_select,
                    ub_admin: this.ub_admin_select,
                    ub_fisica: this.ub_fis_select,
                    unidad_ejecutora: this.unidad_ejecutora_select
                })
                .then(res => {
                    console.log("Listo");
                    location.href = "";
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>
