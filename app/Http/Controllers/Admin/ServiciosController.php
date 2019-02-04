<?php namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Servicio;
use App\Repositories\Admin\ImagenRepo;
use App\Repositories\Admin\ServicioRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

class ServiciosController extends Controller
{

    protected $servicioRepo;
    protected $imagenRepo;

    /**
     * NoticiasController constructor.
     * @param ServicioRepo $servicioRepo
     * @param ImagenRepo $imagenRepo
     */
    public function __construct(ServicioRepo $servicioRepo,
                                ImagenRepo $imagenRepo)
    {
        $this->servicioRepo = $servicioRepo;
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
        $rows = $this->servicioRepo->listaRegistrosAdmin($request);

        return view('admin.servicios.list', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $tipo = $request->input('tipo');

        return view('admin.servicios.create', compact('tipo'));
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
            'titulo' => 'required|unique:servicios,titulo',
            'descripcion' => 'max:300'
        ];

        $this->validate($request, $rules);

        $titulo = $request->input('titulo');
        $slug_url = SlugUrl($titulo);

        //GUARDAR DATOS
        $post = new Servicio($request->all());
        $post->slug_url = $slug_url;
        $this->servicioRepo->create($post, $request->all());

        return redirect()->route('admin.servicios.index')->with('estado','create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->servicioRepo->findOrFail($id);

        return view('admin.servicios.edit', compact('post'));
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
            'titulo' => 'required|unique:servicios,titulo,'.$id,
            'descripcion' => 'max:300'
        ];

        $this->validate($request, $rules);

        $titulo = $request->input('titulo');
        $slug_url = SlugUrl($titulo);

        $post = $this->servicioRepo->findOrFail($id);
        $post->slug_url = $slug_url;
        $this->servicioRepo->update($post, $request->all());

        return redirect()->route('admin.servicios.index')->with('estado','edit');
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
        $post = $this->servicioRepo->findOrFail($id);
        $post->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        return [
            'success' => true,
            'message' => $message
        ];
    }

    /*
     * EDITAR
     */
    public function editar($id)
    {
        $imagenes = $this->imagenRepo->listaImagenes();

        return view('admin.servicios.editor', compact('id', 'imagenes'));
    }

    public function show($id)
    {
        $row = $this->servicioRepo->findOrFail($id);

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

        $row = $this->servicioRepo->findOrFail($id);
        $row->contenido = $contenido;
        $row->fill($request->all());
        $row->save();

        return $contenido;
    }
}