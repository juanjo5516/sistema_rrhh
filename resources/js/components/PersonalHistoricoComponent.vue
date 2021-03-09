<template>
    <div v-if="id>0">

        <edit-history-component :objeto="editar"></edit-history-component>
        
        <div>
            <h1>Historial de Empleado</h1>
            <button class="btn btn-primary mb-3" @click="addForm">Añadir nuevo</button>
        </div>

        <add-historico :id="this.id" v-if="this.agregar"> </add-historico>
        
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th scope="col">Renglón</th>
                    <th scope="col">Inicio de Periodo</th>
                    <th scope="col">Fin de Periodo</th>
                    <th scope="col">Puesto Nominal</th>
                    <th scope="col">Puesto Funcional</th>
                    <th scope="col">Tipo de Servicio</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="historial in historiales" v-bind:key="historial.id">
                    <th scope="row"><!-- {{ historial.idHistorial }} --> <span class="badge badge-success">{{ historial.renglon }}</span></th>
                    <td>
                        {{ historial.periodo_inicio}}
                    </td>
                    <td>
                        {{ historial.periodo_fin}}
                    </td>
                    <td>
                        {{ historial.puesto }}
                    </td>
                    <td>{{ historial.puesto_funcional }}</td>

                    <td v-if="historial.tipo_servicio == '1'">Técnico</td>
                    <td v-if="historial.tipo_servicio == '2'">Profesional</td>
                    <td v-if="historial.tipo_servicio == null"></td>

                    <td>
                        <button class="btn btn-primary" @click="mostrarEdit(historial.idHistorial)">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>


                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditHistoryComponent from './EditHistoryComponent';

export default {
    mounted() {
        console.log("Component mounted - PersonalHistorico."+ this.editar);

    },
    props: {
        id: {
            type: Number,
            default:0
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
    watch:{
        id(){
            this.obtenerDatos();
        }
    },
    components: {
        EditHistoryComponent
        
    },
    methods: {
        mostrarEdit(id_historial){
            axios.get(`/api/historial/${id_historial}/edit`)
            .then(response => {
                this.editar = response.data;
                $('#modal_editar').modal('show');
                console.log(this.editar);
            });
        },
        addForm(){
            this.agregar = !this.agregar;
        },
        mostrarHistorial() {
            this.historial = !this.historial;
        },

        obtenerDatos() {
            axios.get("/api/historial",{
                params: {
                    'id': this.id
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
