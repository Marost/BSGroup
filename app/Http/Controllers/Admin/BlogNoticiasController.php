<?php namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Imagen;
use App\Repositories\Admin\BlogTagRepo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

use App\Entities\Admin\BlogNoticia;
use App\Repositories\Admin\BlogNoticiaRepo;
use App\Repositories\Admin\BlogCategoriaRepo;

class BlogNoticiasController extends Controller {

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'max:300'
    ];

    protected $noticiaRepo;
    protected $categoriaRepo;
    protected $tagRepo;

    /**
     * NoticiasController constructor.
     * @param BlogCategoriaRepo $categoriaRepo
     * @param BlogNoticiaRepo $noticiaRepo
     */
    public function __construct(BlogCategoriaRepo $categoriaRepo,
                                BlogNoticiaRepo $noticiaRepo,
                                BlogTagRepo $tagRepo)
    {
        $this->noticiaRepo = $noticiaRepo;
        $this->categoriaRepo = $categoriaRepo;
        $this->tagRepo = $tagRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $rows = $this->noticiaRepo->findAndPaginate($request);

        return view('admin.blog.noticias.list', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = $this->categoriaRepo->listPub();
        $tags = $this->tagRepo->listPub();

        return view('admin.blog.noticias.create', compact('categorias','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        //VARIABLES
        $titulo = $request->input('titulo');
        $slug_url = SlugUrl($titulo);
        $categoria = $request->input('categoria');
        $tags = $request->input('tags');
        $fecha = $request->input('published_at') == '' ? date("d/m/Y H:i") : $request->input('published_at');
        $publicar = $request->input('publicar') =='' ? 0 : $request->input('publicar');

        //GUARDAR DATOS
        $post = new BlogNoticia($request->all());
        $post->slug_url = $slug_url;
        $post->user_id = auth()->user()->id;
        $post->blog_categoria_id = $categoria;
        $post->published_at = $fecha;
        $post->publicar = $publicar;
        $row = $this->noticiaRepo->create($post, $request->all());

        if($tags <> ''){
            $data = $this->tagRepo->guardarTagsNoticia($tags, $request);
            $row->tags()->sync($data);
        }

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        if($request->ajax())
        {
            return 'Se agregró el registro con éxito';
        }

        return redirect()->route('admin.blog.noticias.create')->with('estado','create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->noticiaRepo->findOrFail($id);
        $categorias = $this->categoriaRepo->listPub();
        $tags = $this->tagRepo->listPub();

        return view('admin.blog.noticias.edit', compact('post','categorias','tags'));
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
        //BUSCAR ID
        $post = $this->noticiaRepo->findOrFail($id);

        //VALIDACION DE DATOS
        $this->validate($request, $this->rules);

        //VARIABLES
        $titulo = $request->input('titulo');
        $slug_url = SlugUrl($titulo);
        $categoria = $request->input('categoria');
        $tags = $request->input('tags');

        //GUARDAR DATOS
        $post->slug_url = $slug_url;
        $post->blog_categoria_id = $categoria;
        $row = $this->noticiaRepo->update($post, $request->all());

        if($tags <> ''){
            $data = $this->tagRepo->guardarTagsNoticia($tags, $request);
            $row->tags()->sync($data);
        }else{
            $row->tags()->sync($tags);
        }

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('admin.blog.noticias.edit', $id)->with('estado','edit');
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
        $post = $this->noticiaRepo->findOrFail($id);
        $post->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        return [
            'success' => true,
            'message' => $message
        ];
    }

    /**
     * Fotos de Post
     *
     * @param $noticia
     * @return Response
     * @internal param $post
     * @internal param int $id
     */
    public function fotosList($noticia)
    {
        $post = $this->noticiaRepo->findOrFail($noticia);
        $rows = $post->imagenes_orden;

        return view('admin.blog.noticias.imagenes.list', compact('post', 'rows'));
    }

    public function fotosOrder($noticia, Request $request)
    {
        if($request->ajax())
        {
            $sortedval = $request->input('listFoto');
            try{
                foreach ($sortedval as $key => $sort){
                    $sortPhoto = Imagen::find($sort);
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

    public function fotosCreate($noticia)
    {
        $post = $this->noticiaRepo->findOrFail($noticia);

        return view('admin.blog.noticias.imagenes.upload', compact('post'));
    }

    public function fotosStore($noticia, Request $request)
    {
        $archivo = UploadFile('upload', $request->file('file'));

        //BUSCAR ID DE POST
        $row = $this->noticiaRepo->findOrFail($noticia);

        //GUARDAR IMAGEN
        $row->imagenes()->create([
            'imagen' => $archivo['archivo'],
            'imagen_carpeta' => $archivo['carpeta']
        ]);
    }

    public function fotosDelete($noticia, $id, Request $request)
    {
        $photo = Imagen::findOrFail($id);
        $photo->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        if($request->ajax())
        {
            return response()->json([
                'success' => true,
                'message' => $message
            ]);
        }

        return redirect()->route('admin.blog.noticias.img.list', $noticia);
    }
}