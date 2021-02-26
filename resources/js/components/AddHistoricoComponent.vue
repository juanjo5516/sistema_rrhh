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

        <div class="form-row" v-if="renglon_select == '011' || renglon_select == '022'">
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

        <div class="form-row" v-if="renglon_select == '018' || renglon_select == '029'">
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Tipo de Servicio</label
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

        <div class="form-row" v-if="renglon_select == '018' || renglon_select == '029' || renglon_select == '011' || renglon_select == '022'">
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Fecha Inicio</label
                >
                <input
                    v-model="this.ingreso"
                    type="date"
                    class="form-control"
                />
            </div>
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Fecha Fin</label
                >
                <input
                    v-model="this.ingreso"
                    type="date"
                    class="form-control"
                />
            </div>
        </div>

        <div class="mb-3 form-row" v-if="renglon_select == '018' || renglon_select == '029' || renglon_select == '011' || renglon_select == '022'">
            <div class="mb-3 col-6">
                <label for="exampleInputPassword1" class="form-label"
                    >Ubicación Administrativa</label
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

        <div class="mb-3 form-row" v-if="renglon_select == '018' || renglon_select == '029' || renglon_select == '011' || renglon_select == '022'">
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
            ]
        };
    },
    watch: {},
    components: {},
    methods: {
        saveData() {}
    }
};
</script>
