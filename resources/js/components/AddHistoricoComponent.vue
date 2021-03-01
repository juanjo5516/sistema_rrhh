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
                    v-model="this.ingreso"
                    type="text"
                    class="form-control"
                />
            </div>
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Puesto Nominal</label
                >
                <input
                    v-model="this.ingreso"
                    type="text"
                    class="form-control"
                />
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
                        v-bind:value="servicio.servicio"
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
                    v-model="this.fecha_inicio"
                    type="date"
                    class="form-control"
                />
            </div>
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Fecha Fin</label
                >
                <input
                    v-model="this.fecha_fin"
                    type="date"
                    class="form-control"
                />
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
                        v-bind:value="ub_admin.ubicacion_administrativa"
                        v-bind:key="ub_admin.id"
                        :class="{'text-primary font-weight-bold' : ub_admin.nivel==2,'text-success': ub_admin.nivel==3,
                        'text-info':ub_admin.nivel==4, }"
                    >
                        <span v-if="ub_admin.nivel=='1'"> * {{ ub_admin.ubicacion_administrativa }}</span>
                        <span v-if="ub_admin.nivel=='2'"> <span>**</span>{{ ub_admin.ubicacion_administrativa }}</span>
                        <span v-if="ub_admin.nivel=='3'"> <span>***</span>{{ ub_admin.ubicacion_administrativa }}</span>
                        <span v-if="ub_admin.nivel=='4'"> <span>****</span> {{ ub_admin.ubicacion_administrativa }}</span>
                        <span v-if="ub_admin.nivel=='5'"> <span>*****</span> {{ ub_admin.ubicacion_administrativa }}</span>
                        
                    </option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Ubicación Física</label
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
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
        this.getUbicacionAdministrativa();
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
            ub_admin_select:''
        };
    },
    watch: {},
    components: {},
    methods: {
        getUbicacionAdministrativa() {
            axios
                .get("/api/ubicacion_administrativa")
                .then(res => {
                    this.ubicacion_administrativa = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>
