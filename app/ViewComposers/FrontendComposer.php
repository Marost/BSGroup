<?php namespace App\ViewComposers;

use App\Entities\Admin\Configuracion;
use App\Entities\Admin\Menu;
use App\Repositories\Admin\ServicioRepo;
use Illuminate\Contracts\View\View;

class FrontendComposer
{
    /**
     * @var ServicioRepo
     */
    protected $servicioRepo;

    /**
     * FrontendComposer constructor.
     * @param ServicioRepo $servicioRepo
     */
    public function __construct(ServicioRepo $servicioRepo)
    {
        $this->servicioRepo = $servicioRepo;
    }

    public function compose(View $view)
    {
        $view->conf_menus = Menu::menus();

        $view->conf_redes = Configuracion::where('tipo','redes-sociales')->orderBy('orden','asc')->get();

        $view->conf_web_titulo = Configuracion::where('tipo','web')->where('nombre','titulo')->first()->valor;
        $view->conf_web_descripcion = Configuracion::where('tipo','web')->where('nombre','descripcion')->first()->valor;
        $view->conf_web_keywords = Configuracion::where('tipo','web')->where('nombre','keywords')->first()->valor;
        $view->conf_web_dominio = Configuracion::where('tipo','web')->where('nombre','dominio')->first()->valor;
        $view->conf_web_logo = Configuracion::where('tipo','web')->where('nombre','logo')->first()->imagen_contenido;

        $view->conf_footer = Configuracion::where('tipo','footer')->where('nombre','texto')->first()->valor;

        $view->conf_web_direccion = Configuracion::where('tipo','web')->where('nombre','direccion')->first()->valor;
        $view->conf_web_telefono = Configuracion::where('tipo','web')->where('nombre','telefono')->first()->valor;
        $view->conf_web_email = Configuracion::where('tipo','web')->where('nombre','email')->first()->valor;

        $view->conf_script = Configuracion::where('tipo','script')->first()->valor;

        $view->conf_servicios = $this->servicioRepo->listaRegistros();
    }

}