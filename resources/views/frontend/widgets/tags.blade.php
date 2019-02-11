<div class="sidebar-widget tag-widget">
    <div class="sidebar-title">
        <h4>Etiquetas</h4>
    </div>
    @foreach($w_tags as $tag)
    <a href="{{ $tag->url }}">{{ $tag->titulo }}</a>
    @endforeach
</div>