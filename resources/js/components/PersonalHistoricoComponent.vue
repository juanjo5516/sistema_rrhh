<template>
    <div v-if="id>0">
        <div>
            <h1>Historial de Empleado</h1>
            <button class="btn btn-primary mb-3" @click="addForm">Añadir nuevo</button>
        </div>

        <add-historico :id="this.id" v-if="this.agregar"> </add-historico>
        

        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th scope="col">#</th>
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
                    <th scope="row">{{ historial.id }}</th>
                    <td>
                        {{ historial.periodo_inicio}}
                    </td>
                    <td>
                        {{ historial.periodo_fin}}
                    </td>
                    <td>
                        {{ historial.puesto_nominal }}
                    </td>
                    <td>{{ historial.puesto_funcional }}</td>
                    <td>{{ historial.tipo_servicio }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
        
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
            historial: true,
            agregar: false
        };
    },
    watch:{
        id(){
            this.obtenerDatos();
        }
    },
    components: {},
    methods: {
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
