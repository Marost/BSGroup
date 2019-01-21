<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Admin\BlogTag;
use App\Repositories\Admin\BlogTagRepo;

class BlogTagsController extends Controller
{
    protected $tagRepo;

    /**
     * TagsController constructor.
     * @param BlogTagRepo $tagRepo
     */
    public function __construct(BlogTagRepo $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rows = $this->tagRepo->findAndPaginate($request);

        return view('admin.blog.tags.list', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.tags.create');
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
            'titulo' => 'required|unique:blog_tags,titulo'
        ];

        $this->validate($request, $rules);

        $url = SlugUrl($request->input('titulo'));

        $row = new BlogTag($request->all());
        $row->slug_url = $url;
        $this->tagRepo->create($row, $request->all());

        return redirect()->route('admin.blog.tags.create')->with('estado','create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->tagRepo->findOrFail($id);

        return view('admin.blog.tags.edit', compact('post'));
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
            'titulo' => 'required|unique:blog_tags,titulo,'.$id
        ];

        $this->validate($request, $rules);

        $url = SlugUrl($request->input('titulo'));

        $row = $this->tagRepo->findOrFail($id);
        $row->slug_url = $url;
        $this->tagRepo->update($row, $request->all());

        return redirect()->route('admin.blog.tags.edit', $id)->with('estado','edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        $post = $this->tagRepo->findOrFail($id);

        if($post->noticias->count() > 0){
            $success = false;
            $message = 'La Etiqueta que desea eliminar, tiene noticias relacionadas. Recomendamos cambiar el nombre.';
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
