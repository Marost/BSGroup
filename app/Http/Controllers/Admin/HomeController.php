<?php namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Imagen;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\ContactoRepo;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    protected $contactoRepo;

    public function __construct(ContactoRepo $contactoRepo)
    {
        $this->contactoRepo = $contactoRepo;
    }

    public function index()
    {
        $mensajes = $this->contactoRepo->mensajesHome();

    	return view('admin.index', compact('mensajes'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function uploadImagen(Request $request)
    {
        $archivo = UploadFile('upload', $request->file('file'));

        return $archivo;
    }

    public function uploadImagenSingle(Request $request)
    {
        $archivo = UploadFile('upload', $request->file('file')[0]);

        $files['file'] = [
            'url' => '/upload/'.$archivo['carpeta'].$archivo['archivo'],
            'id' => $archivo['nombre']
        ];

        return stripslashes(json_encode($files));
    }

    public function uploadImagenGrapes(Request $request)
    {
        $archivo = UploadFile('upload', $request->file('file'));

        return '/upload/'.$archivo['carpeta'].$archivo['archivo'];
    }

    public function copiarArchivo(Request $request)
    {
        $origen = $request->input('url');
        $destino ='./upload/'.FechaCarpeta().$request->input('nombre');
        if (copy ($origen, $destino)){
            return '/upload/'.FechaCarpeta().$request->input('nombre');
        };
    }

} 