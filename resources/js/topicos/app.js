window.Vue = require('vue');

Vue.component('topicos', require('./componentes/Topicos.vue').default);

const app = new Vue({
    el: '#app'
});
