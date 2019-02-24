<template>
    <section id="contacto" class="map-section map-two">
        <div class="home-google-map">
            <div class="google-map" id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d975.272494908404!2d-76.97153337079949!3d-12.105992399464235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c767bc469a67%3A0xac42a3278d713fd0!2sBS+Group+-+Business+Solutions+Group!5e0!3m2!1ses!2spe!4v1549823001698" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        
        <div class="container">
            <div class="consultation" v-if="!enviado">
                <div class="sec-title light">
                    <h1>Contáctanos</h1>
                </div>
                <div class="default-form-area">
                    <form id="contact-form" class="contact-form">
                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-6 column">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nombre" :class="{'input-error': errors.nombres}" v-model="datos.nombres">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 column">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Celular" :class="{'input-error': errors.celular}" v-model="datos.celular">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 column">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" :class="{'input-error': errors.email}" v-model="datos.email">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 column">
                                <div class="form-group">
                                    <textarea class="form-control textarea required" placeholder="Mensaje" :class="{'input-error': errors.mensaje}" v-model="datos.mensaje"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="contact-section-btn">
                            <div v-show="loading" class="loader"></div>
                            <div class="form-group">
                                <a href="#" class="theme-btn btn-style-one" @click.prevent="guardar">Enviar mensaje</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="consultation" v-else>
                <h3>Tu mensaje ha sido enviado con éxito.</h3>
            </div>
        </div>
    </section>
</template>

<style scoped>
    .consultation h3{
        color: #ffffff;
        font-weight: bold;
    }
    
    .btn-style-one{
        color: #0C3C60;
        background-color: #ffffff;
    }
    
    .loader {
        height: 4px;
        width: 100% !important;
        position: relative;
        overflow: hidden;
        background-color: #0C3C60;
        margin-bottom: 10px;
        margin-top: 30px;
    }
    
    .loader:before{
        display: block;
        position: absolute;
        content: "";
        left: -200px;
        width: 200px;
        height: 4px;
        background-color: #ffffff;
        animation: loading 2s linear infinite;
    }
    
    @keyframes loading {
        from {left: -200px; width: 30%;}
        50% {width: 30%;}
        70% {width: 70%;}
        80% { left: 50%;}
        95% {left: 120%;}
        to {left: 100%;}
    }
    
    .input-error{
        border: 2px solid #c3000f !important;
    }
</style>

<script>
    import axios from '../axios'

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
                    mensaje: ''
                }
            }
        },
        methods: {
            guardar: function() {
                this.errors = [];
                this.loading = true;
                this.enviado = false;
                axios.post('/contacto', this.datos).then(response => {
                    this.enviado = true;
                    this.loading = false;
                    this.datos = {
                        nombres: '',
                        email: '',
                        celular: '',
                        mensaje: ''
                    };
                }).catch(error => {
                    this.enviado = false;
                    this.errors = error.response.data.errors;
                    this.loading = false;
                });
            },
        }
    }
</script>