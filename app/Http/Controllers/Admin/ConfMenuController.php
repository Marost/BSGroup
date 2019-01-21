<?php namespace App\Http\Controllers\Admin;

use App\Entities\Admin\Menu;
use App\Repositories\Admin\BlogCategoriaRepo;
use App\Repositories\Admin\BlogNoticiaRepo;
use App\Repositories\Admin\BlogTagRepo;
use App\Repositories\Admin\MenuRepo;
use App\Repositories\Admin\PaginaRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

class ConfMenuController extends Controller
{
    protected $menuRepo;
    protected $noticiaRepo;
    protected $categoriaRepo;
    protected $tagRepo;
    protected $paginaRepo;

    /**
     * ConfMenuController constructor.
     * @param MenuRepo $menuRepo
     * @param BlogNoticiaRepo $noticiaRepo
     * @param BlogCategoriaRepo $categoriaRepo
     * @param BlogTagRepo $tagRepo
     * @param PaginaRepo $paginaRepo
     */
    public function __construct(MenuRepo $menuRepo,
                                BlogNoticiaRepo $noticiaRepo,
                                BlogCategoriaRepo $categoriaRepo,
                                BlogTagRepo $tagRepo,
                                PaginaRepo $paginaRepo)
    {
        $this->menuRepo = $menuRepo;
        $this->noticiaRepo = $noticiaRepo;
        $this->categoriaRepo = $categoriaRepo;
        $this->tagRepo = $tagRepo;
        $this->paginaRepo = $paginaRepo;
    }

    public function index()
    {
        $proser = $this->menuRepo->listaOrden();
        $entradas = $this->noticiaRepo->listaRegistrosMenu();
        $categorias = $this->categoriaRepo->listaRegistrosMenu();
        $tags = $this->tagRepo->listaRegistrosMenu();
        $paginas = $this->paginaRepo->listaRegistrosOrdenTitulo();

        return view('admin.configuracion.menu.list', compact('proser','entradas','categorias','tags','paginas'));
    }

    public function store(Request $request)
    {
        $tipo = $request->input('tipo');
        $menu = '';

        switch ($tipo)
        {
            case 'enlace':
                $data = new Menu($request->all());
                $data->slug_url = SlugUrl($request->input('titulo'));
                $data->titulo = $request->input('titulo');
                $data->url = $request->input('url');
                $data->tipo = $request->input('tipo');
                $this->menuRepo->create($data, $request->all());

                $menu = '<li class="dd-item dd3-item" data-id="'.$data->id.'" >
                    <div class="dd3-content">
                        <div class="dd-handle dd3-handle">Drag</div>
                        <span id="label_show'.$data->id.'">'.$request->input('titulo').'</span>
                    </div>';
                break;

            default:

                foreach ($request->input('item') as $key => $value){
                    switch ($request->input('tipo'))
                    {
                        case 'blog_noticia':
                            $item = $this->noticiaRepo->findOrFail($value);
                            break;

                        case 'blog_categoria':
                            $item = $this->categoriaRepo->findOrFail($value);
                            break;

                        case 'blog_tag':
                            $item = $this->tagRepo->findOrFail($value);
                            break;

                        case 'pagina':
                            $item = $this->paginaRepo->findOrFail($value);
                            break;
                    }

                    $data = new Menu($request->all());
                    $data->slug_url = SlugUrl($item->titulo);
                    $data->titulo = $item->titulo;
                    $data->url = $item->id;
                    $data->tipo = $request->input('tipo');
                    $this->menuRepo->create($data, $request->all());

                    $menu.= '<li class="dd-item dd3-item" data-id="'.$data->id.'" >
                        <div class="dd3-content">
                            <div class="dd-handle dd3-handle">Drag</div>
                            <span id="label_show'.$data->id.'">'.$item->titulo.'</span>
                        </div></li>';
                }
                break;
        }

        return json_encode(["menu" => $menu]);
    }

    public function edit($id)
    {
        $post = $this->menuRepo->findOrFail($id);

        return view('admin.configuracion.menu.edit', compact('post'));
    }

    public function update($id, Request $request)
    {
        //BUSCAR ID
        $post = $this->menuRepo->findOrFail($id);
        $this->menuRepo->update($post, $request->all());

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('admin.configuracion.menu.index')->with('estado','edit');
    }

    public function change(Request $request)
    {
        $data = json_decode($request->input('data'));

        function parseJsonArray($jsonArray, $parentID = 0) {

            $return = array();
            foreach ($jsonArray as $subArray) {
                $returnSubSubArray = array();
                if (isset($subArray->children)) {
                    $returnSubSubArray = parseJsonArray($subArray->children, $subArray->id);
                }
                $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
                $return = array_merge($return, $returnSubSubArray);
            }
            return $return;
        }

        $readbleArray = parseJsonArray($data);

        $i=0;
        foreach($readbleArray as $row){
            $i++;

            $data = $this->menuRepo->findOrFail($row['id']);
            $data->parent = $row['parentID'];
            $data->orden = $i;
            $this->menuRepo->update($data, $request->all());
        }
    }

    public function delete(Request $request)
    {
        function recursiveDelete($id) {
            $query = Menu::where('parent', $id)->get();
            if ($query->count() > 0) {
                foreach($query as $current) {
                    recursiveDelete($current['id']);
                }
            }
            $data = Menu::findOrFail($id);
            $data->delete();
        }

        recursiveDelete($request->input('id'));
    }

}