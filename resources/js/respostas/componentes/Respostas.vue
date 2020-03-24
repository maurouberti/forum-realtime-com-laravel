<template>
    <div>
        <div class="card horizontal" v-for="data in respostas" :class="{ 'lime lighten-4': data.destaque }">
            <div class="card-images">
                <img :src="data.user.photo_url" alt="">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <span class="card-title">{{ data.user.name }} {{ lang2 }}</span>
                    <blockquote>
                        {{ data.mensagem }}
                    </blockquote>
                </div>
                <div class="card-action" v-if="logado.role === 'admin'">
                    <a :href="'/resposta/destaque/' + data.id">{{ lang34 }}</a>
                </div>
            </div>
        </div>

        <div class="card grey lighten-4" v-if="isClosed == 0">
            <div class="card-content">
                <span class="card-title">{{ lang3 }}</span>
                <form @submit.prevent="save()">
                    <div class="input-field">
                        <textarea rows="10" class="materialize-textarea" v-model="resposta_to_save.mensagem"></textarea>
                    </div>
                    <button type="submit" class="btn red accent-2">{{ lang4 }}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
         props: [
            'lang2',
            'lang3',
            'lang4',
            'lang34',
            'topicoId',
            'isClosed'
        ],
        data() {
            return {
                logado: window.user || {},
                respostas: [],
                resposta_to_save: {
                    mensagem: '',
                    topico_id: this.topicoId,
                }
            }
        },
        methods: {
            save() {
                window.axios.post('/respostas', this.resposta_to_save).then(() => {
                    this.getRespostas()
                })
            },
            getRespostas() {
                window.axios.get('/respostas/' + this.topicoId).then((response) => {
                    this.respostas = response.data;
                });
            }
        },
        mounted() {
            this.getRespostas();

            Echo.channel('nova.resposta.' + this.topicoId)
                .listen('NovaRespostaEvent', (e) => {
                    if (e.resposta) {
                        this.getRespostas()
                    }
                });
        }
    }
</script>