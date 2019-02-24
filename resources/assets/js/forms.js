import Vue from 'vue';
import SeccionServicios from './Secciones/Servicios';
import SeccionContacto from './Secciones/Contacto';
import SeccionBlog from './Secciones/Blog';

if($("#app").length)
{
    let app = new Vue({
        el: "#app",
        components: {
            'seccion-servicios': SeccionServicios,
            'seccion-contacto': SeccionContacto,
            'seccion-blog': SeccionBlog
        }
    });
}