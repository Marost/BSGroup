<?php namespace App\Entities\Admin;

class Configuracion extends BaseEntity {


    protected $fillable = ['tipo','nombre','etiqueta','valor','contenido','orden'];
    protected $table = 'configuracion';

    /*
     * GETTERS
     */
    public function getInputAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['input'];
        return $valor;
    }

    public function getBotonAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['boton'];
        return $valor;
    }

    public function getBotonEnlaceAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['boton_enlace'];
        return $valor;
    }

	public function getImagenAttribute()
	{
		$decode = json_decode($this->contenido, true);
		$valor = $decode['imagen'];
		return $valor;
	}

    public function getCarpetaAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['imagen_carpeta'];
        return $valor;
    }

    public function getColorAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $carpeta = $decode['color'];
        return $carpeta;
    }

	public function getDescripcionAttribute()
	{
		$decode = json_decode($this->contenido, true);
		$carpeta = $decode['descripcion'];
		return $carpeta;
	}

	public function getEnlaceAttribute()
	{
		$decode = json_decode($this->contenido, true);
		$valor = $decode['enlace'];
		return $valor;
	}

    public function getIconoIdAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['iconoId'];
        return $valor;
    }

    public function getIconoAttribute()
    {
        $decode = json_decode($this->contenido, true);
	    $valor = $decode['icono'];
        return $valor;
    }

    public function getImagenAdminAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $imagen = $decode['imagen'];
        $carpeta = $decode['imagen_carpeta'];
        return "/upload/".$carpeta."250/".$imagen;
    }

    public function getImagenHomeAttribute()
    {
        $imagen = $this->valor;
        $decode = json_decode($this->contenido, true);
        $carpeta = $decode['imagen_carpeta'];
        return "/upload/".$carpeta.$imagen;
    }

	public function getImagenNosotrosAttribute()
	{
		$decode = json_decode($this->contenido, true);
		$imagen = $decode['imagen'];
		$carpeta = $decode['imagen_carpeta'];
		return "/upload/".$carpeta.'1200x300/'.$imagen;
	}

	public function getImagenContenidoAttribute()
	{
		$decode = json_decode($this->contenido, true);
		$imagen = $decode['imagen'];
		$carpeta = $decode['imagen_carpeta'];
		return "/upload/".$carpeta.$imagen;
	}

    public function getImagenContenidoJsonAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $imagen = $decode['imagen'];
        $carpeta = $decode['imagen_carpeta'];
        return "/upload/".$carpeta.$imagen;
    }

	public function ImagenContenido($ancho = null, $alto = null)
	{
	    if($ancho == null AND $alto == null){
            $decode = json_decode($this->contenido, true);
            $imagen = $decode['imagen'];
            $carpeta = $decode['imagen_carpeta'];
            return "/upload/".$carpeta.$imagen;
        }else{
            $decode = json_decode($this->contenido, true);
            $imagen = $decode['imagen'];
            $carpeta = $decode['imagen_carpeta'];
            return "/upload/".$carpeta.$ancho."x".$alto."/".$imagen;
        }
	}

    public function getNumeroAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['numero'];
        return $valor;
    }

    public function getVideoAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['youtube'];
        return $valor;
    }

    public function getSubtituloAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['subtitulo'];
        return $valor;
    }

    /*
     * SOLUCION
     */
    public function getMenuAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['menu'];
        return $valor;
    }

    public function getPaginaAttribute()
    {
        $decode = json_decode($this->contenido, true);
        $valor = $decode['pagina'];
        return $valor;
    }

    public function PaginaSeccionImagen($seccion, $ancho = null, $alto = null)
    {
        if($ancho == null AND $alto == null){
            $decode = json_decode($this->contenido, true);
            $imagen = $decode['pagina'][$seccion]['imagen'];
            $carpeta = $decode['pagina'][$seccion]['imagen_carpeta'];
            return "/upload/".$carpeta.$imagen;
        }else{
            $decode = json_decode($this->contenido, true);
            $imagen = $decode['pagina'][$seccion]['imagen'];
            $carpeta = $decode['pagina'][$seccion]['imagen_carpeta'];
            return "/upload/".$carpeta.$ancho."x".$alto."/".$imagen;
        }
    }
}