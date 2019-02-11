<?php namespace App\ViewComposers;

use App\Entities\Admin\BlogNoticia;
use App\Repositories\Admin\BlogCategoriaRepo;
use App\Repositories\Admin\BlogNoticiaRepo;
use App\Repositories\Admin\BlogTagRepo;
use App\Repositories\Admin\ConfiguracionRepo;
use Illuminate\Contracts\View\View;

class WidgetsComposer
{
    protected $configuracionRepo;
    protected $tagRepo;
    protected $categoriaRepo;
    protected $noticiaRepo;

    /**
     * WidgetsComposer constructor.
     * @param ConfiguracionRepo $configuracionRepo
     * @param BlogNoticiaRepo $noticiaRepo
     * @param BlogCategoriaRepo $categoriaRepo
     * @param BlogTagRepo $tagRepo
     */
    public function __construct(ConfiguracionRepo $configuracionRepo,
                                BlogNoticiaRepo $noticiaRepo,
                                BlogCategoriaRepo $categoriaRepo,
                                BlogTagRepo $tagRepo)
    {
        $this->configuracionRepo = $configuracionRepo;
        $this->noticiaRepo = $noticiaRepo;
        $this->categoriaRepo = $categoriaRepo;
        $this->tagRepo = $tagRepo;
    }

    public function compose(View $view)
    {
        $view->w_tags = $this->tagRepo->paginate(10);
        $view->w_categorias = $this->categoriaRepo->all();
        $view->w_noticias_recientes = $this->noticiaRepo->listaNoticiasRecientes();
    }
    
}