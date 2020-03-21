window.Vue = require('vue');

Vue.component('respostas', require('./componentes/Respostas.vue').default);

const app = new Vue({
    el: '#app'
});
