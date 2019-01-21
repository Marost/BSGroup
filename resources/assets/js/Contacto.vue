<template>
    <div style="width: 100%" v-if="!enviado">
        <form>
            <img src="/img/sis1.svg" alt="SIS365">
            <div class="form_input">
                <input type="text" placeholder="Nombre y Apellido" :class="{'input-error': errors.nombres}" v-model="datos.nombres">
                <input type="text" placeholder="Email" :class="{'input-error': errors.email}" v-model="datos.email">
                <input type="text" placeholder="Celular" :class="{'input-error': errors.celular}" v-model="datos.celular">
                <input type="text" placeholder="Necesito el Software para..." :class="{'input-error': errors.asunto}" v-model="datos.asunto">
                <input type="text" placeholder="Mensaje" :class="{'input-error': errors.mensaje}" v-model="datos.mensaje">
                <div v-show="loading" class="loader"></div>
                <div class="form_input__boton">
                    <a href="#" @click.prevent="guardar">ENVIAR</a>
                </div>
            </div>
        </form>
    </div>
    <div style="width: 100%" v-else>
        <h3 style="width: 100%;text-align: center;">Tu mensaje ha sido enviado con éxito.</h3>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data: function () {
            return {
                enviado: false,
                errors: [],
                loading: false,
                datos: {
                    nombres: '',
                    email: '',
                    celular: '',
                    asunto: '',
                    mensaje: ''
                }
            }
        },
        methods: {
            guardar: function() {
                this.errors = [];
                this.loading = true;
                this.enviado = false;
                axios.post('/contacto', this.datos)
                    .then(response => {
                        this.enviado = true;
                        this.loading = false;
                        this.datos = {
                            nombres: '',
                            email: '',
                            celular: '',
                            asunto: '',
                            mensaje: ''
                        };
                    }).catch(error => {
                    this.enviado = false;
                    this.errors = error.response.data;
                    this.loading = false;
                });
            },
        }
    }
</script>