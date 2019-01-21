<?php

use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Jenssegers\Date\Date;
Date::setLocale('es');
Carbon::setLocale('es');

/* FECHA ACTUAL */
function fechaActual()
{
    $fechaActual = date('Y-m-d H:i:s');
    return $fechaActual;
}

function fechaTexto($datetime)
{
    $fecha = Date::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $fecha->format('d \\d\\e F \\d\\e\\l Y');
    return $fecha;
}

function fechaDia($datetime)
{
    $fecha = Date::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $fecha->format('d');
    return $fecha;
}

function fechaMes($datetime)
{
    $fecha = Date::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $fecha->format('M');
    return ucfirst($fecha);
}

function fechaAnio($datetime)
{
    $fecha = Date::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $fecha->format('Y');
    return $fecha;
}

function fechaBlogLista($datetime)
{
    $fecha = Date::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $fecha->format('M d, Y');
    return ucfirst($fecha);
}

function fechaPubAdmin($datetime)
{
    $fecha = Date::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $fecha->format('d/m/Y H:i');
    return ucfirst($fecha);
}

function fechaHumano($datetime)
{
    $dt = Carbon::create($datetime->year, $datetime->month, $datetime->day, $datetime->hour, $datetime->minute, $datetime->second);
    $fecha = $dt->diffForHumans();
    return $fecha;
}

function fechaPublicacionBD($datetime)
{
    $fecha = Date::createFromFormat('d/m/Y H:i:s', $datetime);
    $fecha = $fecha->format('Y-m-d H:i:s');
    return ucfirst($fecha);
}

function fechaPublicacionBuscar($datetime)
{
    $fecha = Date::createFromFormat('d/m/Y', $datetime);
    $fecha = $fecha->format('Y-m-d 23:59:59');
    return $fecha;
}

function getSubString($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 50;
    //Primero eliminamos las etiquetas html y luego cortamos el string
    $stringDisplay = substr(strip_tags($string), 0, $length);
    //Si el texto es mayor que la longitud se agrega puntos suspensivos
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= ' ...';
    return $stringDisplay;
}

/*
 * ANCHO DE IMAGEN
 */
function imagenAncho($folder, $image)
{
    $file = public_path().'/upload/' . $folder . '/' .$image;
    $image = Image::make($file)->width();
    return $image;
}

//UPLOAD DE ARCHIVO
/**
 * @param $type = Tipo de archivo: Documentos o Upload (imagen)
 * @param $file = Archivo
 * @return mixed
 */
function UploadFile($type, $file)
{
    CrearCarpeta($type);
    $path = $type."/".FechaCarpeta();
    $upload = FileMove($file, $path);
    $carpeta = FechaCarpeta();

    $archivo['nombre'] = $upload['original'];
    $archivo['extension'] = $upload['extension'];
    $archivo['archivo'] = $upload['archivo'];
    $archivo['carpeta'] = $carpeta;
    $archivo['size'] = $upload['size'];

    return $archivo;
}

/*
 * Upload de Logo
 */
function UploadLogo($type, $file)
{
    CrearCarpeta($type);
    $path = $type."/";
    $upload = FileMove($file, $path);

    $archivo['nombre'] = $upload['original'];
    $archivo['extension'] = $upload['extension'];
    $archivo['archivo'] = $upload['archivo'];
    $archivo['size'] = $upload['size'];

    return $archivo;
}

//MOVER ARCHIVO
function FileMove($file, $path)
{
    $name = $file->getClientOriginalName();                 //NOMBRE Y EXTENSION DE ARCHIVO
    $extension = $file->getClientOriginalExtension();       //EXTENSION DE ARCHIVO
    $size = $file->getSize();
    $archive = basename($name, ".".$extension);             //NOMBRE DE ARCHIVO
    $pathName = SlugUrl($archive)."-".date('YmdHi'); //CONVERTIR NOMBRE SIN ESPACIOS
    $filename = $pathName.".".$extension;                   //NOMBRE Y EXTENSION SIN ESPACIOS
    $file->move($path, $filename);                          //MOVER ARCHIVO A NUEVA CARPETA

    $archivo['original'] = $archive;                        //DEVOLVER SOLO NOMBRE ORIGINAL
    $archivo['extension'] = $extension;                     //DEVOLVER SOLO EXTENSION
    $archivo['archivo'] = $filename;                        //DEVOLVER NOMBRE CON EXTENSION
    $archivo['size'] = $size;                               //DEVOLVER EL TAMAÑO DEL ARCHIVO

    return $archivo;
}

//CARPETA CON NOMBRE DEL MES ACTUAL
function FechaCarpeta()
{
    $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    $mes = date('n')-1; // devuelve el número del mes
    $ano = date('Y'); // devuelve el año
    $fechaCarpeta = $meses[$mes]."".$ano."/";
    return $fechaCarpeta;
}

/* CREACION DE CARPETA */
function CrearCarpeta($type){
    $nombre_carpeta = FechaCarpeta();
    $ruta = public_path($type."/".$nombre_carpeta);
    if(!is_dir($ruta)){
        @mkdir($ruta, 0755);
        $carpeta=$ruta;
    }else{
        $carpeta=$ruta;
    }
    return $carpeta;
}

/* URL AMIGABLE */
function SlugUrl($texto){
    return getUrlAmigable(eliminarTextoURL($texto));
}

function eliminarTextoURL($str) {
    $search = array('&lt;', '&gt;', '&quot;', '&amp;');
    $str = str_replace($search, '', $str);
    $search = array('&aacute;','&Aacute;','&eacute;','&Eacute;','&iacute;','&Iacute;','&oacute;','&Oacute;','&uacute;','&Uacute;','&ntilde;','&Ntilde;');
    $replace = array('a','a','e','e','i','i','o','o','u','u','n','n');
    $search = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú', 'Ü', 'ü', 'Ñ', 'ñ', '_', '-');
    $replace = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u', 'u', 'u', 'n', 'n', ' ', ' ');
    $str = str_replace($search, $replace, $str);
    $str = preg_replace('/&(?!#[0-9]+;)/s', '', $str);
    $search = array(' a ', ' de ', ' con ', ' por ', ' en ', ' y ', ' e ', ' o ', ' u ', ' la ', ' el ', ' lo ', ' las ', ' los ', ' fue ', ' del ', ' se ', ' su ', ' una ');
    $str = str_replace($search, ' ', strtolower($str));
    $str = str_replace($search, $replace, strtolower(trim($str)));
    $str = preg_replace("/[^a-zA-Z0-9\s]/", '', $str);
    $str = preg_replace('/\s\s+/', ' ', $str);
    $str = str_replace(' ', '-', $str);
    return  $str;
}

function getUrlAmigable($s){
    $s = strtolower($s);
    $s = preg_replace("[áàâãäª@]","a",$s);
    $s = preg_replace("[éèêë]","e",$s);
    $s = preg_replace("[íìîï]","i",$s);
    $s = preg_replace("[óòôõºö]","o",$s);
    $s = preg_replace("[úùûü]","u",$s);
    $s = preg_replace("[ç]","c",$s);
    $s = preg_replace("[ñ]","n",$s);
    $s = preg_replace( "/[^a-zA-Z0-9\-]/", "-", $s );
    $s = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $s);

    return trim($s, '-');
}

//GENERAR CODIGO ALEATORIO
function CodigoAleatorio($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE)
{
    $source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
    }
    return $rstr;
}

//GENERAR CODIGO ALEATORIO
function CodigoAleatorioUpp($length=10,$n=TRUE,$sc=FALSE)
{
    $source = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
    }
    return $rstr;
}