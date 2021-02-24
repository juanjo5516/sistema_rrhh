<template>
    <div class="col-8">
        <form v-on:submit.prevent="saveData">
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
            <div class="col-md-6">
                <span>Seleccione desglose: </span> <br />
                <input
                    type="radio"
                    id="one_estado"
                    value="I"
                    v-model="tipo_gasto"
                    
                />
                <label for="one_estado">Ingreso</label>
                <br />
                <input
                    type="radio"
                    id="two_estado"
                    value="E"
                    v-model="tipo_gasto"
                    
                />
                <label for="two_estado">Egreso</label>
                <br />

            </div>

            <div class="mb-3" v-if="tipo_gasto == 'I'">
                <label for="exampleInputPassword1" class="form-label"
                    >Seleccione Ingreso</label
                >
                <select class="form-control" v-model="datos_select">
                    <option
                        v-for="dato in datos"
                        v-bind:value="dato.ingreso"
                        v-bind:key="dato.id"
                    >
                        {{ dato.ingreso }}
                    </option>
                </select>
            </div>

            <div class="mb-3" v-if="tipo_gasto == 'E'">
                <label for="exampleInputPassword1" class="form-label"
                    >Seleccione Egreso</label
                >
                <select class="form-control" v-model="datos_select">
                    <option
                        v-for="dato in datos"
                        v-bind:value="dato.egreso"
                        v-bind:key="dato.id"
                    >
                        {{ dato.egreso }}
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <modal-component
            v-bind:url="url"
            v-bind:nombre_form="nombre_form"
        ></modal-component>

        <table class="table mt-5" >
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Renglon</th>
                    <th scope="col">Tipo Desglose</th>
                    <th scope="col">Desglose</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="asignacion in asignaciones" :key="asignacion.id" class="w-100">
                    <td>{{ asignacion.id }}</td>
                    <td>{{ asignacion.renglon }}</td>
                    <td>{{ asignacion.tipo_desglose }}</td>
                    <td>{{ asignacion.desglose }}</td>
<!--                     <td>
                        <a
                            href=""
                            type="button"
                            class="btn btn-outline-danger"
                            data-toggle="modal"
                            data-target="#modal_eliminar"
                            v-on:click="setUrl('/api/ingreso/' + asignacion.id)"
                            >Eliminar</a
                        >
                    </td> -->
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
import ModalComponent from "./ModalComponent.vue";

export default {
    data() {
        return {
            renglon_select:'',
            renglones: [
                { renglon: "011" },
                { renglon: "029" },
                { renglon: "018" },
                { renglon: "022" }
            ],
            form: new Form({
                ingreso: "",
                id_eliminar: "",
            }),
            url: "",
            datos:'',
            datos_select:'',
            tipo_gasto:'',
            asignaciones:''
        };
    },
    components: {
        ModalComponent
    },
    watch: {
        tipo_gasto () {
            if (this.tipo_gasto == 'I'){
                this.getIngreso();
   
            }
            else {
                this.getEgreso();
              
            }
        },
        renglon_select (){
            this.getAsignacion();
        }
    },
    methods: {
        setUrl(url) {
            this.url = url;
        },
        getIngreso() {
            axios
                .get("/api/ingreso")
                .then(res => {
                    this.datos = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getEgreso() {
            axios
                .get("/api/egreso")
                .then(res => {
                    this.datos = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getAsignacion() {
            axios
                .get("/api/c-asignacion",{
                    params: {
                        'renglon' : this.renglon_select
                    }
                })
                .then(res => {
                    this.asignaciones = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        eliminarData() {},
        saveData() {
            console.log("Empieza método para guardar en BD.");
            let data = new FormData();
            data.append("renglon", this.renglon_select);
            data.append("tipo_desglose", this.tipo_gasto);
            data.append("desglose", this.datos_select);
            console.log(data);
            axios
                .post("/api/c-asignacion", data)
                .then(res => {
                    Swal.fire({
                        title: 'Asignación',
                        text: 'Asignación Registrada Satisfactoriamente'
                    });
                    this.form.reset();
                    this.getIngreso();
                    this.getEgreso();
                    this.getAsignacion();

                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error',
                        text: error.response.data
                    });
                })
        }
    },
    mounted() {
        this.nombre_form = "fuente";
        console.log("Component mounted.");
    }
};
</script>
