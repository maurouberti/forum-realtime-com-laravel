<template>
    <div>
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                    <span class="card-title">{data.user.name} {{ lang2 }}</span>

                    <blockquote>
                        { data.body }
                    </blockquote>
                </div>
            </div>
        </div>

        <div class="card grey lighten-4">
            <div class="card-content">
                <span class="card-title">{{ lang3 }}</span>


                <form>
                    <div class="input-field">
                        <textarea rows="10" class="materialize-textarea"></textarea>
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
            'lang4'
        ],
    }
</script>