<template>

    <div class="alert alert-success spacing" role="alert" v-show="show">
        {{ body }}
    </div>
</template>
<script>
    export default {
        props: ['message'],
        data() {
            return {
                show : false,
                body : ''

            }

        },

        created() {

            if(this.message) {

                this.flash(this.message)

            }
            window.events.$on('flash',(message) => this.flash(message))
        },

        methods: {

            flash(message) {

                this.show = true

                this.body = message

  

                setTimeout(() => {

                    this.hide()

                },3000)

            },

            hide() {

                this.show = false

            }

        }

    }

</script>

   

<style>

    .spacing {

        position:fixed;
        font-size: 26px;
        left: 42%;
        top: 42%;
        z-index: 99;
        background-color:#e0e0e0; 
        border: 2px ridge;
        box-shadow: 2px 2px 2px 0px #662210;
    }

</style>