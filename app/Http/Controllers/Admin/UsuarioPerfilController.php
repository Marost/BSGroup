<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\UserRepo;
use Illuminate\Http\Request;

class UsuarioPerfilController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function perfil()
    {
        $row = auth()->user();

        return view('admin.perfil.perfil', compact('row'));
    }

    public function datos(Request $request)
    {
        $rules = [
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id
        ];

        switch ($request->method())
        {
            case 'GET':
                $row = auth()->user();

                $datos = [
                    'nombres' => $row->profile->nombres,
                    'apellidos' => $row->profile->apellidos,
                    'email' => $row->email
                ];
                break;

            case 'PUT':
                $this->validate($request, $rules);

                $user = auth()->user();
                $user->fill($request->all());
                $user->save();

                $profile = auth()->user()->profile;
                $profile->fill($request->all());
                $profile->save();

                $datos = 'El registro se actualizó con éxito';
                break;
        }

        return $datos;
    }

    public function foto(Request $request)
    {
        $rules = [
            'imagen' => 'required'
        ];

        $this->validate($request, $rules);

        $imagen = auth()->user()->profile;
        $imagen->fill($request->all());
        $imagen->save();

        return 'El registro se actualizó con éxito';
    }

    public function password(Request $request)
    {
        $rules = [
            'password' => 'required|confirmed'
        ];

        $this->validate($request, $rules);

        $user = auth()->user();
        $user->fill($request->all());
        $user->save();

        return 'El registro se actualizó con éxito';
    }
}