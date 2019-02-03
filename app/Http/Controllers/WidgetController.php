<?php

namespace App\Http\Controllers;

use App\Repositories\Admin\BlogCategoriaRepo;
use App\Repositories\Admin\BlogNoticiaRepo;
use App\Repositories\Admin\BlogTagRepo;
use App\Repositories\Admin\ConfiguracionRepo;
use App\Repositories\Admin\ServicioRepo;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    protected $noticiaRepo;
    protected $categoriaRepo;
    protected $tagRepo;
    protected $configuracionRepo;
    protected $servicioRepo;

    /**
     * FrontendController constructor.
     * @param BlogNoticiaRepo $noticiaRepo
     * @param BlogCategoriaRepo $categoriaRepo
     * @param BlogTagRepo $tagRepo
     * @param ConfiguracionRepo $configuracionRepo
     * @param ServicioRepo $servicioRepo
     */
    public function __construct(BlogNoticiaRepo $noticiaRepo,
                                BlogCategoriaRepo $categoriaRepo,
                                BlogTagRepo $tagRepo,
                                ConfiguracionRepo $configuracionRepo,
                                ServicioRepo $servicioRepo)
    {
        $this->noticiaRepo = $noticiaRepo;
        $this->categoriaRepo = $categoriaRepo;
        $this->tagRepo = $tagRepo;
        $this->configuracionRepo = $configuracionRepo;
        $this->servicioRepo = $servicioRepo;
    }

    public function widgets($widget)
    {
        switch ($widget)
        {
            case 'noticias':
                $rows = $this->noticiaRepo->listaNoticiasHome();
                break;

            case 'servicios':
                $rows = $this->servicioRepo->listaRegistros();
                break;
        }

        return $rows;
    }

}
