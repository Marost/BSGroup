<div class="sidebar-widget news-widget">
    <div class="sidebar-title">
        <h4>Noticias recientes</h4>
    </div>

    @foreach($w_noticias_recientes as $noticia)
    <div class="post">
        <div class="text">
            <a href="{{ $noticia->url }}">{{ $noticia->titulo }}</a>
        </div>
    </div>
    @endforeach
</div>