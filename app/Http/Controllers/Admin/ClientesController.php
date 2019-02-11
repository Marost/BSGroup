<?php namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Configuracion;
use App\Repositories\Admin\ConfiguracionRepo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;


class ClientesController extends Controller
{
    protected $configuracionRepo;

    /**
     * ClientesController constructor.
     * @param ConfiguracionRepo $configuracionRepo
     */
    public function __construct(ConfiguracionRepo $configuracionRepo)
    {
        $this->configuracionRepo = $configuracionRepo;
    }

    /**
     * Fotos de Post
     *
     * @param $noticia
     * @return Response
     * @internal param $post
     * @internal param int $id
     */
    public function fotosList()
    {
        $rows = $this->configuracionRepo->listaItems('clientes');

        return view('admin.clientes.list', compact('rows'));
    }

    public function fotosOrder(Request $request)
    {
        if($request->ajax())
        {
            $sortedval = $request->input('listFoto');
            try{
                foreach ($sortedval as $key => $sort){
                    $sortPhoto = $this->configuracionRepo->findOrFail($sort);
                    $sortPhoto->orden = $key;
                    $sortPhoto->save();
                }
            }
            catch (Exception $e)
            {
                return 'false';
            }
        }
    }

    public function fotosCreate()
    {
        return view('admin.clientes.upload');
    }

    public function fotosStore(Request $request)
    {
        $archivo = UploadFile('upload', $request->file('file'));

        //BUSCAR ID DE POST
        $post = new Configuracion($request->all());
        $post->tipo = 'clientes';
        $post->nombre = 'titulo';
        $post->etiqueta = 'Titulo';
        $post->valor = '';
        $post->contenido = json_encode([
            'imagen' => $archivo['archivo'],
            'imagen_carpeta' => $archivo['carpeta']
        ]);
        $post->orden = 0;
        $this->configuracionRepo->create($post, $request->all());
    }

    public function fotosDelete($id, Request $request)
    {
        $photo = $this->configuracionRepo->findOrFail($id);
        $photo->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }
}