<template>
  <div class="col-8">
    
    <form v-on:submit.prevent="saveData">

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Ingresos</label>
        <input
          v-model="form.ingreso"
          type="text"
          class="form-control"
        />
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
      

    </form>
     <modal-component v-bind:url="url" v-bind:nombre_form="nombre_form"></modal-component>

    <table class="table mt-5">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Ingreso</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="ingreso in ingresos" :key="ingreso.id" class="w-100">
          <td>{{ingreso.id}}</td>
          <td>{{ingreso.ingreso}}</td>
          <td><a href="" type="button" class="btn btn-outline-danger"  data-toggle="modal" data-target="#modal_eliminar" v-on:click="setUrl('/api/ingreso/'+ ingreso.id)">Eliminar</a></td>
        </tr>
      </tbody>
    </table>
    
  </div>
</template>

<script>
import ModalComponent from './ModalComponent.vue';

export default {
  data() {
    return {
      ingresos:'',
      form: new Form({
        ingreso:'',
        id_eliminar:''
      }),
      url: ''
    }
  },
  components: {
    ModalComponent
  },
  methods:{
    setUrl(url) {
      this.url = url
    },
    getIngreso(){
      axios.get('/api/ingreso').then((res) =>{
        this.ingresos = res.data
      }).catch((error)=>{
        console.log(error)
      })
    },
    eliminarData(){
        
    },
    saveData(){
      console.log("Listo.");
      let data = new FormData();
      data.append('ingreso',this.form.ingreso)
      console.log(data);
      axios.post('/api/ingreso',data).then((res)=>{
        this.form.reset()
        this.getIngreso()
      }).catch((error) => {
        this.form.errors.record(error.response.data.errors)
      })
    }
  },
  mounted() {
    this.getIngreso();
    this.nombre_form='fuente';
    console.log("Component mounted.");
  },
};
</script>