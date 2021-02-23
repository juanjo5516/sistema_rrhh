/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');
import Vuelidate from 'vuelidate'
import Form from './Form'
window.Form = Form;

Vue.use(Vuelidate);



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('personal', require('./components/personal.vue').default);
Vue.component('registro-personal', require('./components/RegistroPersonal.vue').default);
Vue.component('registro-rol', require('./components/RegistroRol.vue').default);
Vue.component('crear-rol', require('./components/CrearRol.vue').default);
Vue.component('listado-personal', require('./components/ListadoPersonal.vue').default);
Vue.component('listado-colegiado', require('./components/ListadoColegiado.vue').default);
Vue.component('ingreso-component', require('./components/IngresoComponent.vue').default);
Vue.component('egreso-component', require('./components/EgresoComponent.vue').default);
Vue.component('asignacion-component', require('./components/AsignacionComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        message:"",
        primer_nombre: ''
    }

});
