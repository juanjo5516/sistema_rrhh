<template>
<div v-if="id > 0">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Documento</th>
                <th scope="col">Carga</th>

            </tr>
        </thead>
        <tbody>
            <tr v-for="historial in historiales" v-bind:key="historial.id">
                <th scope="row">
                    <!-- {{ historial.idHistorial }} -->
                    <span
                        v-if="historial.renglon == '011'"
                        class="font-weight-bolder text-primary"
                        >{{ historial.renglon }}</span
                    >
                    <span
                        v-if="historial.renglon == '029'"
                        class="font-weight-bolder text-secondary"
                        >{{ historial.renglon }}</span
                    >
                </th>
                <td>
                    {{ historial.periodo_inicio }}
                </td>
                <td>
                    {{ historial.periodo_fin }}
                </td>
                <td>
                    <button class="btn btn-outline-success">Ver</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted - DetalleDocumentos.vue." + this.editar);
        this.obtenerDatos();
    },
    props: {
        id: {
            type: Number,
            default: 0
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
    components: {},
    methods: {
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
        }
    }
};
</script>
