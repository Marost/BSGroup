<?php

namespace App\Http\Controllers;

use App\Entities\Admin\Contacto;
use App\Mail\ContactoAdmin;
use App\Repositories\Admin\BlogCategoriaRepo;
use App\Repositories\Admin\BlogNoticiaRepo;
use App\Repositories\Admin\BlogTagRepo;
use App\Repositories\Admin\ConfiguracionRepo;
use App\Repositories\Admin\PaginaRepo;
use App\Repositories\Admin\ServicioRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    protected $noticiaRepo;
    protected $categoriaRepo;
    protected $tagRepo;
    protected $paginaRepo;
    protected $configuracionRepo;
    protected $servicioRepo;

    /**
     * FrontendController constructor.
     * @param BlogNoticiaRepo $noticiaRepo
     * @param BlogCategoriaRepo $categoriaRepo
     * @param BlogTagRepo $tagRepo
     * @param PaginaRepo $paginaRepo
     * @param ServicioRepo $servicioRepo
     * @param ConfiguracionRepo $configuracionRepo
     */
    public function __construct(BlogNoticiaRepo $noticiaRepo,
                                BlogCategoriaRepo $categoriaRepo,
                                BlogTagRepo $tagRepo,
                                PaginaRepo $paginaRepo,
                                ServicioRepo $servicioRepo,
                                ConfiguracionRepo $configuracionRepo)
    {
        $this->noticiaRepo = $noticiaRepo;
        $this->categoriaRepo = $categoriaRepo;
        $this->tagRepo = $tagRepo;
        $this->paginaRepo = $paginaRepo;
        $this->configuracionRepo = $configuracionRepo;
        $this->servicioRepo = $servicioRepo;
    }

    public function servicio($servicio)
    {
        $row = $this->servicioRepo->findUrl($servicio);

        return view('frontend.pagina-servicio', compact('row'));
    }

    public function clientes()
    {
        $rows = $this->configuracionRepo->listaItems('clientes');

        return view('frontend.clientes', compact('rows'));
    }

    public function pagina($pagina = '/')
    {
        $pagina === '/' ? $valor = 'home' : $valor = $pagina;

        $row = $this->paginaRepo->findPagina($valor);

        if($row){
            $sliders = $this->configuracionRepo->listaItems('slider-pagina-'.$row->id);
            return view('frontend.pagina', compact('row','sliders'));
        }else{
            abort(404);
        }
    }

    /*
     * CONTACTO
     */
    public function contactoPost(Request $request)
    {
        $rules = [
            'nombres' => 'required',
            'celular' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required'
        ];

        $this->validate($request, $rules);

        $row = new Contacto($request->all());
        $row->save();

        Mail::send(new ContactoAdmin($request));

        return "Mensaje enviado";
    }

    /*
     * BLOG
     */
    public function blog()
    {
        $rows = $this->noticiaRepo->listaNoticias();

        return view('frontend.blog', compact('rows'));
    }

    public function blogNota($id, $url)
    {
        $row = $this->noticiaRepo->findNoticia($id, $url);

        return view('frontend.blog-nota', compact('row'));
    }

    public function blogCategoria($url)
    {
        $row = $this->categoriaRepo->findCategoria($url);
        $rows = $row->NoticiasCategoria();

        return view('frontend.blog-categoria', compact('row','rows'));
    }

    public function blogTag($url)
    {
        $row = $this->tagRepo->findTag($url);
        $rows = $row->NoticiasTags();

        return view('frontend.blog-tag', compact('row','rows'));
    }
}
