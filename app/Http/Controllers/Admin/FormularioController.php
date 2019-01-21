<?php namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\ConfiguracionRepo;
use App\Repositories\Admin\ContactoRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

class FormularioController extends Controller {

    protected $contactoRepo;
    protected $configuracionRepo;

    /**
     * FormularioController constructor.
     * @param ContactoRepo $contactoRepo
     * @param ConfiguracionRepo $configuracionRepo
     */
    public function __construct(ContactoRepo $contactoRepo,
                                ConfiguracionRepo $configuracionRepo)
    {
        $this->contactoRepo = $contactoRepo;
        $this->configuracionRepo = $configuracionRepo;
    }

    public function index($url, Request $request)
    {
        switch ($url)
        {
            default:
                $rows = $this->contactoRepo->findMessageAndPaginate($request);
                break;
        }

        return view('admin.formularios.mensajes.list', compact('url','rows'));
    }

    public function show($url, $id)
    {
        switch ($url)
        {
            default:
                $row = $this->contactoRepo->findOrFail($id);
                break;
        }

        return view('admin.formularios.mensajes.show', compact('url','row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($url)
    {
        $post = $this->configuracionRepo->listaTipo($url);

        return view('admin.formularios.opcion.edit', compact('url','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update($url, Request $request)
    {
        $tipo = $request->input('tipo');
        foreach ($request->input('valor') as $key => $value){
            $data = $this->configuracionRepo->buscarTipoNombre($tipo, $key);

            switch ($data->input)
            {
                default:
                    $data->valor = $value;
                    break;

                case 'imagen':
                    $data->valor = $value;
                    $data->contenido = json_encode([
                        'input' => 'imagen',
                        'imagen' => $request->input('imagen'),
                        'imagen_carpeta' => $request->input('imagen_carpeta')
                    ]);
                    break;
            }

            $this->configuracionRepo->update($data, $request->input('valor'));
        }

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('admin.formularios.opcion.edit', $url)->with('estado','edit');
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
        $post = $this->contactoRepo->findOrFail($id);
        $post->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        return [
            'success' => true,
            'message' => $message
        ];
    }

}