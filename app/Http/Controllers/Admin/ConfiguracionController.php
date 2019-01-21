<?php namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Configuracion;
use App\Entities\Admin\Iconos;
use App\Repositories\Admin\ConfiguracionRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

class ConfiguracionController extends Controller
{
    protected $configuracionRepo;

    /**
     * ConfiguracionController constructor.
     * @param ConfiguracionRepo $configuracionRepo
     */
    public function __construct(ConfiguracionRepo $configuracionRepo)
    {
        $this->configuracionRepo = $configuracionRepo;
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

        return view('admin.configuracion.opcion.edit', compact('url','post'));
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
        return redirect()->route('admin.configuracion.opcion.edit', $url)->with('estado','edit');
    }

}