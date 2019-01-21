<?php

namespace App\Http\Controllers;

use App\Repositories\Admin\BlogCategoriaRepo;
use App\Repositories\Admin\BlogNoticiaRepo;
use App\Repositories\Admin\BlogTagRepo;
use App\Repositories\Admin\ConfiguracionRepo;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    protected $noticiaRepo;
    protected $categoriaRepo;
    protected $tagRepo;
    private $configuracionRepo;

    /**
     * FrontendController constructor.
     * @param BlogNoticiaRepo $noticiaRepo
     * @param BlogCategoriaRepo $categoriaRepo
     * @param BlogTagRepo $tagRepo
     * @param ConfiguracionRepo $configuracionRepo
     */
    public function __construct(BlogNoticiaRepo $noticiaRepo,
                                BlogCategoriaRepo $categoriaRepo,
                                BlogTagRepo $tagRepo,
                                ConfiguracionRepo $configuracionRepo)
    {
        $this->noticiaRepo = $noticiaRepo;
        $this->categoriaRepo = $categoriaRepo;
        $this->tagRepo = $tagRepo;
        $this->configuracionRepo = $configuracionRepo;
    }

    public function widgets($widget)
    {
        switch ($widget)
        {
            case 'clientes':
                $rows = $this->configuracionRepo->listaItems('clientes');
                break;

            case 'noticias':
                $rows = $this->noticiaRepo->listaNoticiasHome();
                break;

            case 'testimonios':
                $rows = $this->configuracionRepo->listaItems('testimonios');
                break;
        }

        return $rows;
    }

}
