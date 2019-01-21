<?php namespace App\ViewComposers;

use App\Entities\Admin\BlogNoticia;
use App\Repositories\Admin\ConfiguracionRepo;
use Illuminate\Contracts\View\View;

class WidgetsComposer
{
    protected $configuracionRepo;

    public function __construct(ConfiguracionRepo $configuracionRepo)
    {
        $this->configuracionRepo = $configuracionRepo;
    }

    public function compose(View $view)
    {
        $view->w_home = $this->configuracionRepo->listaHome();
        $view->w_empresas = $this->configuracionRepo->listaItems('empresas');
        $view->w_noticias = BlogNoticia::where('published_at','<=',fechaActual())->where('publicar','1')->orderBy('published_at','desc')->paginate(2);
    }
    
}