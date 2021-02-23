<template>
  <div class="col-8">
    
    <form v-on:submit.prevent="saveData">

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Egresos</label>
        <input
          v-model="form.egreso"
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
          <th scope="col">Egreso</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="egreso in egresos" :key="egreso.id" class="w-100">
          <td>{{egreso.id}}</td>
          <td>{{egreso.egreso}}</td>
          <td><a href="" type="button" class="btn btn-outline-danger"  data-toggle="modal" data-target="#modal_eliminar" v-on:click="setUrl('/api/egreso/'+ egreso.id)">Eliminar</a></td>
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
      egresos:'',
      form: new Form({
        egreso:'',
        id_eliminar:''
      }),
      url: '',
      nombre_form:''
    }
  },
  components: {
    ModalComponent
  },
  methods:{
    setUrl(url) {
      this.url = url
    },
    getEgreso(){
      axios.get('/api/egreso').then((res) =>{
        this.egresos = res.data
      }).catch((error)=>{
        console.log(error)
      })
    },
    eliminarData(){
        
    },
    saveData(){
      console.log("Listo.");
      let data = new FormData();
      data.append('egreso',this.form.egreso)
      console.log(data);
      axios.post('/api/egreso',data).then((res)=>{
        this.form.reset()
        this.getEgreso()
      }).catch((error) => {
        this.form.errors.record(error.response.data.errors)
      })
    }
  },
  mounted() {
    this.getEgreso();
    this.nombre_form='fuente';
    console.log("Component mounted.");
  },
};
</script>