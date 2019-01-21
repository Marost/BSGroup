<?php namespace App\Repositories\Admin;

use Illuminate\Http\Request;

abstract class BaseRepo {

    abstract public function getModel();

    //BUSCAR POR ID Y URL
    public function findIdUrl($id, $url)
    {
        return $this->getModel()->where('id', $id)->where('slug_url', $url)->first();
    }

    //BUSCAR POR URL
    public function findUrl($url)
    {
        return $this->getModel()->where('slug_url', $url)->first();
    }

    //BUSCAR Y MOSTRAR ERROR
    public function findOrFail($id)
    {
        return $this->getModel()->findOrFail($id);
    }

    //ORDENAR
    public function orderBy($field, $order)
    {
        return $this->getModel()->orderBy($field, $order)->get();
    }

    //PAGINACION
    public function paginate($value)
    {
        return $this->getModel()->paginate($value);
    }

    //LISTAR
    public function lists($field, $id)
    {
        return $this->getModel()->lists($field, $id);
    }

    //MOSTRAR
    public function all(){
        return $this->getModel()->all();
    }

    //ORDERNAR Y PAGINAR
    public function orderByPagination($field, $order, $value)
    {
        return $this->getModel()->orderBy($field, $order)->paginate($value);
    }

    //SELECT
    public function where($field, $value)
    {
        return $this->getModel()->where($field, $value);
    }

    public function create($entity, array $data)
    {
        $entity->save();
        return $entity;
    }

    public function update($entity, array $data)
    {
        $entity->fill($data);
        $entity->save();
        return $entity;
    }

    public function delete($entity)
    {
        if (is_numeric($entity))
        {
            $entity = $this->findOrFail($entity);
        }
        $entity->delete();
        return $entity;
    }

    public function findTrash($id)
    {
        return $this->getModel()->onlyTrashed()->findOrFail($id);
    }

    public function listTituloArray()
    {
        return $this->getModel()->lists('titulo', 'id')->toArray();
    }

    //BUSQUEDAS DE REGISTROS ELIMINADOS
    public function findAndPaginateDeletes(Request $request)
    {
        return $this->getModel()
                    ->onlyTrashed()
                    ->titulo($request->get('titulo'))
                    ->orderBy('deleted_at', 'desc')
                    ->paginate();
    }

    //LISTA MENU
    public function listaRegistrosMenu()
    {
        return $this->getModel()->where('publicar',1)->orderBy('titulo','asc')->get();
    }

    public function listaRegistrosOrdenTitulo()
    {
        return $this->getModel()->orderBy('titulo','asc')->get();
    }
}