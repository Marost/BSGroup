<?php namespace App\Entities\Admin;

class Menu extends BaseEntity {

    protected $appends = ['url_enlace'];
    protected $fillable = ['titulo','descripcion','url','class','icono','parent','orden','estado'];
    protected $table = 'menus';

    public function getChildren($data, $line)
    {
        $children = [];
        foreach ($data as $line1) {
            if ($line['id'] == $line1['parent']) {
                $children = array_merge($children, [ array_merge($line1, ['submenu' => $this->getChildren($data, $line1) ]) ]);
            }
        }
        return $children;
    }

    public function optionsMenu()
    {
        return $this->where('estado', 1)
            ->orderby('parent')
            ->orderby('orden')
            ->orderby('titulo')
            ->get()
            ->toArray();
    }

    public static function menus()
    {
        $menus = new Menu();
        $data = $menus->optionsMenu();
        $menuAll = [];
        foreach ($data as $line) {
            $item = [ array_merge($line, ['submenu' => $menus->getChildren($data, $line) ]) ];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menus->menuAll = $menuAll;
    }

    //GETTERS
    public function getUrlEnlaceAttribute()
    {
        switch ($this->tipo)
        {
            default:
                $url = $this->url;
                break;

            case 'blog_noticia':
                $row = BlogNoticia::findOrFail($this->url);
                $url = route('blog.noticia', [$row->id, $row->slug_url]);
                break;

            case 'blog_categoria':
                $row = BlogCategoria::findOrFail($this->url);
                $url = route('blog.categoria', $row->slug_url);
                break;

            case 'blog_tag':
                $row = BlogTag::findOrFail($this->url);
                $url = route('blog.tag', $row->slug_url);
                break;

            case 'pagina':
                $row = Pagina::findOrFail($this->url);
                $url = route('pagina', $row->slug_url);
                break;
        }

        return $url;
    }
}