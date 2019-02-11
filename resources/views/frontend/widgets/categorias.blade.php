<div class="sidebar-widget category-widget">
    <div class="sidebar-title">
        <h4>Categorias</h4>
    </div>
    <ul>
        @foreach($w_categorias as $categoria)
        <li><a href="{{ $categoria->url }}">{{ $categoria->titulo }}</a></li>
        @endforeach
    </ul>
</div>