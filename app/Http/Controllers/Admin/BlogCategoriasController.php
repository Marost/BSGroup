<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entities\Admin\BlogCategoria;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\BlogCategoriaRepo;

class BlogCategoriasController extends Controller
{
    protected $categoriaRepo;

    /**
     * CategoriaRepo constructor.
     * @param BlogCategoriaRepo $categoriaRepo
     */
    public function __construct(BlogCategoriaRepo $categoriaRepo)
    {
        $this->categoriaRepo = $categoriaRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rows = $this->categoriaRepo->findAndPaginate($request);

        return view('admin.blog.categorias.list', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $rules = [
		    'titulo' => 'required|unique:blog_categorias,titulo'
	    ];

        $this->validate($request, $rules);

        $url = SlugUrl($request->input('titulo'));

        $row = new BlogCategoria($request->all());
        $row->slug_url = $url;
        $this->categoriaRepo->create($row, $request->all());

        return redirect()->route('admin.blog.categorias.create')->with('estado','create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->categoriaRepo->findOrFail($id);

        return view('admin.blog.categorias.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    $rules = [
		    'titulo' => 'required|unique:blog_categorias,titulo,'.$id
	    ];

        $this->validate($request, $rules);

        $url = SlugUrl($request->input('titulo'));

        $row = $this->categoriaRepo->findOrFail($id);
        $row->slug_url = $url;
        $this->categoriaRepo->update($row, $request->all());

        return redirect()->route('admin.blog.categorias.edit', $id)->with('estado','edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        $post = $this->categoriaRepo->findOrFail($id);

        if($post->noticias->count() > 0){
            $success = false;
            $message = 'La Categoría que desea eliminar, tiene noticias relacionadas. Recomendamos cambiar el nombre.';
        }else{
            $post->delete();
            $success = true;
            $message = 'El registro se eliminó satisfactoriamente.';
        }

        return [
            'success' => $success,
            'message' => $message
        ];
    }
}
