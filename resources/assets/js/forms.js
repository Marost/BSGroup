import Vue from 'vue';
import axios from 'axios';
import SeccionBlog from './Secciones/Blog';
import SeccionContacto from './Secciones/Contacto';

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

if($("#app").length)
{
    let app = new Vue({
        el: "#app",
        components: {
            'seccion-blog': SeccionBlog,
            'seccion-contacto': SeccionContacto
        }
    });
}