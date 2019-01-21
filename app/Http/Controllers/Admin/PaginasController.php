<?php namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Pagina;
use App\Repositories\Admin\ImagenRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

use App\Repositories\Admin\PaginaRepo;

class PaginasController extends Controller {

    protected $paginaRepo;
    /**
     * @var ImagenRepo
     */
    private $imagenRepo;

    /**
     * NoticiasController constructor.
     * @param PaginaRepo $paginaRepo
     * @param ImagenRepo $imagenRepo
     */
    public function __construct(PaginaRepo $paginaRepo,
                                ImagenRepo $imagenRepo)
    {
        $this->paginaRepo = $paginaRepo;
        $this->imagenRepo = $imagenRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $rows = $this->paginaRepo->findAndPaginate();

        return view('admin.paginas.list', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $tipo = $request->input('tipo');

        return view('admin.paginas.create', compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $rules = [
            'titulo' => 'required|unique:paginas,titulo',
            'slug_url' => 'required|unique:paginas,slug_url',
            'descripcion' => 'max:300'
        ];

        $this->validate($request, $rules);

        //GUARDAR DATOS
        $post = new Pagina($request->all());
        $this->paginaRepo->create($post, $request->all());

        return redirect()->route('admin.paginas.index')->with('estado','create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->paginaRepo->findOrFail($id);

        return view('admin.paginas.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        $rules = [
            'titulo' => 'required|unique:paginas,titulo,'.$id,
            'slug_url' => 'required|unique:paginas,slug_url,'.$id,
            'descripcion' => 'max:300'
        ];

        $this->validate($request, $rules);

        $post = $this->paginaRepo->findOrFail($id);
        $this->paginaRepo->update($post, $request->all());

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('admin.paginas.index')->with('estado','edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return array
     */
    public function destroy($id, Request $request)
    {
        //BUSCAR ID PARA ELIMINAR
        $post = $this->paginaRepo->findOrFail($id);
        $post->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        return [
            'success' => true,
            'message' => $message
        ];
    }

    /*
     * DUPLICAR PAGINA
     */
    public function duplicar($id)
    {
        $row = $this->paginaRepo->findOrFail($id);
        $new = $row->replicate();
        $new->titulo = 'Copia de '.$row->titulo;
        $new->slug_url = 'copia-'.$row->slug_url;
        $new->publicar = 0;
        $new->save();

        return redirect()->route('admin.paginas.index')->with('estado','create');
    }

    /*
     * EDITAR PAGINA
     */
    public function editar($id)
    {
        $imagenes = $this->imagenRepo->listaImagenes();

        return view('admin.paginas.editor', compact('id', 'imagenes'));
    }

    public function show($id)
    {
        $row = $this->paginaRepo->findOrFail($id);

        return \response()->json(json_decode($row->contenido, true));
    }

    public function save($id, Request $request)
    {
        $contenido = json_encode([
            'gjs-assets' => "[]",
            'gjs-components' => $request->input('gjs-components'),
            'gjs-css' => $request->input('gjs-css'),
            'gjs-html' => $request->input('gjs-html'),
            'gjs-styles' => $request->input('gjs-styles')
        ]);

        $row = $this->paginaRepo->findOrFail($id);
        $row->contenido = $contenido;
        $row->fill($request->all());
        $row->save();

        return $contenido;
    }
}