<template>
    <div v-if="id > 0">
        <edit-history-component
            v-on:refrescar-tabla-historico="refrescarTablaHistorico"
            :objeto="editar"
        ></edit-history-component>

        <div>
            <h1>
                Historial de Empleado
                <span class="badge badge-success">{{ this.nombre }}</span>
            </h1>
            <button class="btn btn-primary mb-3" @click="addForm">
                Añadir nuevo
            </button>
        </div>

        <add-historico
            v-on:refrescar="refrescar"
            :id="this.id"
            v-if="this.agregar"
        >
        </add-historico>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Renglón</th>
                    <th scope="col">Inicio de Periodo</th>
                    <th scope="col">Fin de Periodo</th>
                    <th scope="col">Puesto Nominal</th>
                    <th scope="col">Puesto Funcional</th>
                    <th scope="col">Tipo de Servicio</th>
                    <!-- <th scope="col">Ubicación Administrativa</th> -->
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="historial in historiales" v-bind:key="historial.id">
                    <th scope="row">
                        <!-- {{ historial.idHistorial }} -->
                        <span v-if="historial.renglon == '011'" class="font-weight-bolder text-primary">{{
                            historial.renglon
                        }}</span>
                        <span v-if="historial.renglon == '029'" class="font-weight-bolder text-secondary">{{
                            historial.renglon
                        }}</span>
                    </th>
                    <td>
                        {{ historial.periodo_inicio }}
                    </td>
                    <td>
                        {{ historial.periodo_fin }}
                    </td>
                    <td>
                        {{ historial.puesto }}
                    </td>
                    <td>{{ historial.puesto_funcional }}</td>

                    <td v-if="historial.tipo_servicio == '1'">Técnico</td>
                    <td v-if="historial.tipo_servicio == '2'">Profesional</td>
                    <td v-if="historial.tipo_servicio == null"></td>

                    <!-- <td>{{ historial.ubicacion_administrativa }}</td> -->

                    <td>
                        <button
                            class="btn btn-primary"
                            @click="mostrarEdit(historial.idHistorial)"
                        >
                            Editar
                        </button>
                        <button
                            class="btn btn-danger"
                            @click="eliminarRegistro(historial.idHistorial)"
                        >
                            Eliminar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditHistoryComponent from "./EditHistoryComponent";

export default {
    mounted() {
        console.log("Component mounted - PersonalHistorico." + this.editar);
    },
    props: {
        id: {
            type: Number,
            default: 0
        },
        nombre: {
            type: String,
            default: ""
        }
    },
    data() {
        return {
            historiales: [],
            editar: {},
            historial: true,
            agregar: false
        };
    },
    watch: {
        id() {
            this.obtenerDatos();
        }
    },
    components: {
        EditHistoryComponent
    },
    methods: {
        eliminarRegistro(id_historial) {
            /*  */
            Swal.fire({
                title: "¿Estas seguro(a) de eliminar este registro?",
                showCancelButton: true,
                confirmButtonText: `Si`,
                denyButtonText: `Don't save`
            }).then(result => {
                if (result.isConfirmed) {
                    axios
                        .delete(`/api/historial/${id_historial}`)
                        .then(response => {
                            
                        })
                        .catch(error => {
                            console.log(error);
                        });
                    this.obtenerDatos();
                    Swal.fire("Eliminado!", "", "success");
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        },
        refrescarTablaHistorico() {
            this.obtenerDatos();
        },
        refrescar() {
            this.agregar = !this.agregar;
            this.obtenerDatos();
        },
        mostrarEdit(id_historial) {
            axios.get(`/api/historial/${id_historial}/edit`).then(response => {
                this.editar = response.data;
                $("#modal_editar").modal("show");
                console.log(this.editar);
            });
        },
        addForm() {
            this.agregar = !this.agregar;
        },
        mostrarHistorial() {
            this.historial = !this.historial;
        },

        obtenerDatos() {
            console.log("Obteniendo datos");
            axios
                .get("/api/historial", {
                    params: {
                        id: this.id
                    }
                })
                .then(response => {
                    this.historiales = response.data;
                });
        },
        nombreCompleto(n1, n2, n3, a1, a2, ac) {
            if (n1 == null) {
                n1 = "";
            }
            if (n2 == null) {
                n2 = "";
            }
            if (n3 == null) {
                n3 = "";
            }
            if (a1 == null) {
                a1 = "";
            }
            if (a2 == null) {
                a2 = "";
            }
            if (ac == null) {
                ac = "";
            }
            return n1 + " " + n2 + " " + n3 + " " + a1 + " " + a2 + " " + ac;
        },
        nombres(n1, n2, n3) {
            if (n1 == null) {
                n1 = "";
            }
            if (n2 == null) {
                n2 = "";
            }
            if (n3 == null) {
                n3 = "";
            }
            return n1 + " " + n2 + " " + n3;
        },
        apellidos(a1, a2, ac) {
            if (a1 == null) {
                a1 = "";
            }
            if (a2 == null) {
                a2 = "";
            }
            if (ac == null) {
                ac = "";
            }
            return a1 + " " + a2 + " " + ac;
        }
    }
};
</script>
