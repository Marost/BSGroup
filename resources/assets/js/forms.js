import Vue from 'vue';
import axios from 'axios';
import FormularioContacto from './Contacto.vue';

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

if($("#contacto").length)
{
    let contacto = new Vue({
        el: "#contacto",
        components: {
            'formulario-contacto': FormularioContacto
        }
    });
}

//NOTICIAS
if($(".seccion-8").length)
{
    let noticias = new Vue({
        el: ".seccion-8",
        data: {
            rows: []
        },
        mounted () {
            this.cargar();
        },
        methods: {
            cargar: function () {
                axios.get('/widget/noticias')
                    .then(response => {
                        this.rows = response.data.data;

                        $.each(this.rows, function (index, value) {
                            $(".seccion-8 .contenedor-sector").append('<div class="sector sector-derecha">' +
                                    '<div class="sector-izquierda__img">' +
                                        '<img src="'+value.imagen_home+'" alt="'+value.titulo+'">' +
                                    '</div>' +
                                    '<div class="sector-izquierda__informacion">' +
                                        '<h3 class="sector-titulo">' +
                                            '<a href="'+value.url+'">'+value.titulo+'</a>' +
                                        '</h3>' +
                                        '<div class="sector-fecha">' +
                                            '<span>'+value.fecha+'</span>' +
                                        '</div>' +
                                        '<p class="sector-texto">'+value.descripcion+'</p>' +
                                    '</div>' +
                                '</div>');
                        });
                    })
            }
        }
    });
}

//CLIENTES
if($(".seccion_7").length)
{
    let clientes = new Vue({
        el: '.seccion_7',
        data: {
            rows: []
        },
        mounted () {
            this.cargar();
        },
        methods: {
            cargar: function () {
                axios.get('/widget/clientes')
                    .then(response => {
                        this.rows = response.data;

                        $.each(this.rows, function (index, value) {
                            var contenido = JSON.parse(value.contenido);
                            var imagen = '/upload/'+contenido.imagen_carpeta+contenido.imagen;
                            $(".seccion_7 .seccion_7__empresas").append('<div class="empresas_img">' +
                                '<img src="'+imagen+'" alt="'+value.valor+'">' +
                                '</div>');
                        });
                    })
            }
        }
    });
}

//TESTIMONIOS
if($(".testimonios").length)
{
    let testimonios = new Vue({
        el: '.testimonios',
        data: {
            rows: []
        },
        mounted () {
            this.cargar();
        },
        methods: {
            cargar: function () {
                axios.get('/widget/testimonios')
                    .then(response => {
                        this.rows = response.data;

                        $.each(this.rows, function (index, value) {
                            var contenido = JSON.parse(value.contenido);
                            var imagen = '/upload/'+contenido.imagen_carpeta+contenido.imagen;
                            $(".testimonios .slider-testimonial").append('<div class="testimonial-item swiper-slide">' +
                                    '<div class="testimonial-client">' +
                                        '<div class="testimonial-client__img" style="background-image: url('+imagen+')"></div>' +
                                        '<p class="client-name">'+value.valor+'</p>' +
                                    '</div>' +
                                    '<div class="testimonial-text"><p>'+contenido.descripcion+'</p></div>' +
                                '</div>');
                        });

                        var swiper = new Swiper('.swiper-container', {
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                            loop: true,
                            autoplay: {
                                delay: 5000,
                                disableOnInteraction: false,
                            },
                        });
                    })
            }
        }
    });
}