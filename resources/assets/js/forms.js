import Vue from 'vue';
import axios from 'axios';
import SeccionServicios from './Secciones/Servicios';
import SeccionMapa from './Secciones/Mapa';
import SeccionContacto from './Secciones/Contacto';
import SeccionBlog from './Secciones/Blog';

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

if($("#app").length)
{
    let app = new Vue({
        el: "#app",
        components: {
            'seccion-servicios': SeccionServicios,
            'seccion-mapa': SeccionMapa,
            'seccion-contacto': SeccionContacto,
            'seccion-blog': SeccionBlog
        }
    });
}