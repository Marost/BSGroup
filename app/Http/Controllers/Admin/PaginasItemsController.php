<?php namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Configuracion;
use App\Entities\Admin\Iconos;
use App\Entities\Admin\Pagina;
use App\Repositories\Admin\ConfiguracionRepo;
use App\Repositories\Admin\ImagenRepo;
use App\Repositories\Admin\PaginaRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

class PaginasItemsController extends Controller {
    /**
     * @var PaginaRepo
     */
    private $paginaRepo;
    /**
     * @var ConfiguracionRepo
     */
    private $configuracionRepo;

    /**
     * PaginasItemsController constructor.
     * @param PaginaRepo $paginaRepo
     * @param ConfiguracionRepo $configuracionRepo
     */
    public function __construct(PaginaRepo $paginaRepo,
                                ConfiguracionRepo $configuracionRepo)
    {
        $this->paginaRepo = $paginaRepo;
        $this->configuracionRepo = $configuracionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index($pagina)
    {
        $post = $this->paginaRepo->findOrFail($pagina);
        $rows = $this->configuracionRepo->listaItems('slider-pagina-'.$pagina);

        return view('admin.paginas.items.list', compact('pagina','post','rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($pagina)
    {
        $post = $this->paginaRepo->findOrFail($pagina);

        return view('admin.paginas.items.create', compact('pagina','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store($pagina, Request $request)
    {
        $post = new Configuracion($request->all());
        $post->tipo = 'slider-pagina-'.$pagina;
        $post->nombre = 'titulo';
        $post->etiqueta = 'Titulo';
        $post->valor = $request->input('titulo');
        $post->contenido = json_encode([
            'imagen' => $request->input('imagen'),
            'imagen_carpeta' => $request->input('imagen_carpeta')
        ]);
        $post->orden = 0;
        $post->save();

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('admin.paginas.items.index', $pagina)->with('estado','create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($pagina, $id)
    {
        $row = $this->paginaRepo->findOrFail($pagina);
        $post = $this->configuracionRepo->findOrFail($id);

        return view('admin.paginas.items.edit', compact('pagina','row','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update($pagina, $id, Request $request)
    {
        $post = $this->configuracionRepo->findOrFail($id);
        $post->valor = $request->input('titulo');
        $post->contenido = json_encode([
            'imagen' => $request->input('imagen'),
            'imagen_carpeta' => $request->input('imagen_carpeta')
        ]);
        $post->fill($request->all());
        $post->save();

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('admin.paginas.items.index', $pagina)->with('estado','edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return array
     */
    public function destroy($pagina, $id)
    {
        //BUSCAR ID PARA ELIMINAR
        $post = $this->configuracionRepo->findOrFail($id);
        $post->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        return [
            'success' => true,
            'message' => $message
        ];
    }

    /*
	 * Ordenar
	 */
    public function order($pagina)
    {
        $rows = $this->configuracionRepo->listaItems('slider-pagina-'.$pagina);

        return view('admin.paginas.items.order', compact('pagina','rows'));
    }

    public function orderUpdate($pagina, Request $request)
    {
        $sortedval = $request->input('ordenar');
        try{
            foreach ($sortedval as $key => $sort){
                $row = Configuracion::find($sort);
                $row->orden = $key + 1;
                $row->save();
            }
        }
        catch (Exception $e)
        {
            return 'false';
        }
    }

}