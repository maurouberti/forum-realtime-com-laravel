<template>
    <div class="card">
        <div class="card-content">
            <span class="card-title">{{ lang6 }}</span>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ lang7 }}</th>
                        <th>{{ lang8 }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="topico in topicos_response.data" :class="{ 'lime lighten-4': topico.fixado }">
                        <td>{{ topico.id }}</td>
                        <td>{{ topico.titulo }}</td>
                        <td>{{ topico.respostas_total || 0 }}</td>
                        <td>
                            <a :href="'/topicos/' + topico.id" class="btn">{{ lang9 }}</a>
                            <a :href="'/topico/fixar/' + topico.id" class="btn" v-if="logado.role === 'admin'">{{ topico.fixado ? lang36 : lang35 }}</a>
                            <a :href="'/topico/fechar/' + topico.id" class="btn" v-if="logado.role === 'admin'">{{ topico.fechado ? lang38 : lang37 }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-content">
            <span class="card-title">{{ lang10 }}</span>

            <form @submit.prevent="save()">
                <div class="input-field">
                    <input type="text" :placeholder="lang6" v-model="topicos_to_save.titulo">
                </div>
                <div class="input-field">
                    <textarea  rows="10" class="materialize-textarea" :placeholder="lang11" v-model="topicos_to_save.mensagem"></textarea>
                </div>
                <button type="submit" class="btn red accent-2">{{ lang4 }}</button>
            </form>
        </div>

    </div>
</template>

<script>
    export default {
        props: [
            'lang4',
            'lang6',
            'lang7',
            'lang8',
            'lang9',
            'lang10',
            'lang11',
            'lang35',
            'lang36',
            'lang37',
            'lang38',
        ],
        data() {
            return {
                logado: window.user || {},
                topicos_response: [],
                topicos_to_save: {
                    titulo: '',
                    mensagem: ''
                },
            }
        },
        methods: {
            save() {
                window.axios.post('/topicos', this.topicos_to_save).then(() => {
                    this.getTopicos()
                })
            },
            getTopicos() {
                window.axios.get('/topicos').then((response) => {
                    this.topicos_response = response.data
                })
            }
        },
        mounted() {
            this.getTopicos();
            Echo.channel('novo.topico')
                .listen('NovoTopicoEvent', (e) => {
                    console.log(e)
                    if (e.topico) {
                        this.topicos_response.data.splice(0, 0, e.topico)
                    }
                });
        }

    }
</script>