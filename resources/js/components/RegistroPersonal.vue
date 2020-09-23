<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Registro</div>

                    <div class="card-body">

                        <!-- Input para colocar Primer nombre -->
                        <span>Primer Nombre:</span><br>
                        <input v-model="primer_nombre" placeholder="Primer Nombre">
                        <p>Message is: {{ primer_nombre }}</p>

                        <!-- Input para colocar Segundo nombre -->
                        <span>Segundo Nombre:</span><br>
                        <input v-model="segundo_nombre" placeholder="Segundo Nombre">
                        <p>Message is: {{ segundo_nombre }}</p>

                        <!-- Input para colocar Primer apellido -->
                        <span>Primer Apellido:</span><br>
                        <input v-model="primer_apellido" placeholder="Primer Apellido">
                        <p>Message is: {{ primer_apellido }}</p>

                        <!-- Input para colocar Segundo apellido -->
                        <span>Segundo Apellido:</span><br>
                        <input v-model="segundo_apellido" placeholder="Segundo Apellido">
                        <p>Message is: {{ segundo_apellido }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                primer_nombre:"",
                segundo_nombre:"",
                primer_apellido:"",
                segundo_apellido:""
            }
        }
    }
</script>
