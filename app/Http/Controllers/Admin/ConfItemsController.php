<?php namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Configuracion;
use App\Repositories\Admin\ConfiguracionRepo;
use App\Repositories\Admin\IconoRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

class ConfItemsController extends Controller
{
    protected $configuracionRepo;
    protected $iconoRepo;

    /**
     * ConfItemsController constructor.
     * @param ConfiguracionRepo $configuracionRepo
     * @param IconoRepo $iconoRepo
     */
    public function __construct(ConfiguracionRepo $configuracionRepo,
                                IconoRepo $iconoRepo)
    {
        $this->configuracionRepo = $configuracionRepo;
        $this->iconoRepo = $iconoRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index($url, Request $request)
    {
        $rows = $this->configuracionRepo->listaItems($url);

        return view('admin.configuracion.items.list', compact('url','rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($url)
    {
        $iconsRedes = $this->iconoRepo->listaIconos();

        return view('admin.configuracion.items.create', compact('url','iconsRedes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store($url, Request $request)
    {
        $post = new Configuracion($request->all());
        $post->tipo = $url;
        $post->nombre = 'titulo';
        $post->etiqueta = 'Titulo';

        switch ($url)
        {
            case 'redes-sociales':
                $red = $this->iconoRepo->findOrFail($request->input('red'));
                $post->valor = $red->titulo;
                $post->contenido = json_encode([
                    'enlace' => $request->input('enlace'),
                    'iconoId' => $red->id,
                    'icono' => $red->icono,
                    'color' => $red->color
                ]);
                break;

            case 'testimonios':
                $post->valor = $request->input('titulo');
                $post->contenido = json_encode([
                    'descripcion' => $request->input('descripcion'),
                    'imagen' => $request->input('imagen'),
                    'imagen_carpeta' => $request->input('imagen_carpeta')
                ]);
                break;

            default:
                $post->valor = $request->input('titulo');
                $post->contenido = json_encode([
                    'imagen' => $request->input('imagen'),
                    'imagen_carpeta' => $request->input('imagen_carpeta')
                ]);
                break;
        }

        $post->orden = 0;
        $this->configuracionRepo->create($post, $request->all());

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('admin.configuracion.url.items.create', $url)->with('estado','create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($url, $id)
    {
        $post = $this->configuracionRepo->findOrFail($id);
        $iconsRedes = $this->iconoRepo->listaIconos();

        return view('admin.configuracion.items.edit', compact('url','post','iconsRedes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update($url, $id, Request $request)
    {
        $post = $this->configuracionRepo->findOrFail($id);

        switch ($url)
        {
            case 'redes-sociales':
                $red = $this->iconoRepo->findOrFail($request->input('red'));
                $post->valor = $red->titulo;
                $post->contenido = json_encode([
                    'enlace' => $request->input('enlace'),
                    'iconoId' => $red->id,
                    'icono' => $red->icono,
                    'color' => $red->color
                ]);
                break;

            case 'testimonios':
                $post->valor = $request->input('titulo');
                $post->contenido = json_encode([
                    'descripcion' => $request->input('descripcion'),
                    'imagen' => $request->input('imagen'),
                    'imagen_carpeta' => $request->input('imagen_carpeta')
                ]);
                break;

            default:
                $post->valor = $request->input('titulo');
                $post->contenido = json_encode([
                    'imagen' => $request->input('imagen'),
                    'imagen_carpeta' => $request->input('imagen_carpeta')
                ]);
                break;
        }

        $this->configuracionRepo->update($post, $request->all());

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('admin.configuracion.url.items.edit', [$url, $id])->with('estado','edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return array
     */
    public function destroy($url, $id)
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
    public function order($url)
    {
        $rows = $this->configuracionRepo->listaItems($url);

        return view('admin.configuracion.items.order', compact('url','rows'));
    }

    public function orderUpdate($url, Request $request)
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