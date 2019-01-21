<?php namespace App\Http\Controllers\Admin;

use App\Entities\Admin\User;
use App\Entities\Admin\UserProfile;
use App\Mail\UsuarioCambiarPassword;
use App\Mail\UsuarioNuevoPassword;
use App\Repositories\Admin\UserProfileRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

use App\Entities\Admin\BlogNoticia;
use App\Repositories\Admin\UserRepo;
use Illuminate\Support\Facades\Mail;

class UsuariosController extends Controller
{
    protected $userRepo;
    protected $userProfileRepo;

    /**
     * UsuariosController constructor.
     * @param UserRepo $userRepo
     * @param UserProfileRepo $userProfileRepo
     */
    public function __construct(UserRepo $userRepo,
                                UserProfileRepo $userProfileRepo)
    {
        $this->userRepo = $userRepo;
        $this->userProfileRepo = $userProfileRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        $rows = $this->userRepo->findUsersAndPaginate();

        return view('admin.usuarios.list', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];

        $this->validate($request, $rules);

        //GUARDAR DATOS
        $user = new User($request->all());
        $row = $this->userRepo->create($user, $request->all());

        $profile = new UserProfile($request->all());
        $profile->imagen = 'users.png';
        $profile->imagen_carpeta = 'carpeta/';
        $profile->user_id = $row->id;
        $this->userProfileRepo->create($profile, $request->all());

        if($request->input('enviar_correo') == 1)
        {
            Mail::to($request->input('email'))->send(new UsuarioNuevoPassword($request));
        }

        return redirect()->route('admin.usuarios.create')->with('estado','create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->userRepo->findOrFail($id);

        return view('admin.usuarios.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        $rules = [
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ];

        $this->validate($request, $rules);

        $user = $this->userRepo->findOrFail($id);
        $row = $this->userRepo->update($user, $request->all());

        $profile = $this->userProfileRepo->where('user_id',$row->id)->first();
        $this->userProfileRepo->update($profile, $request->all());

        return redirect()->route('admin.usuarios.edit', $id)->with('estado','edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return array
     */
//    public function destroy($id)
//    {
//        //BUSCAR ID PARA ELIMINAR
//        $post = $this->userRepo->findOrFail($id);
//        $post->delete();
//
//        $message = 'El registro se eliminó satisfactoriamente.';
//
//        return ['message' => $message];
//    }

    /*
     * Generar password
     */
    public function passwordGenerar()
    {
        $password = CodigoAleatorio(12, true, true, false);

        return $password;
    }

    /*
     * Cambiar contraseña
     */
    public function passwordCambiar($id, Request $request)
    {
        $rules = [
            'password' => 'required'
        ];

        switch ($request->method())
        {
            case 'GET':
                $row = $this->userRepo->findOrFail($id);

                $dato = view('admin.usuarios.password-cambiar', compact('row'));
                break;

            case 'PUT':
                $this->validate($request, $rules);

                $user = $this->userRepo->findOrFail($id);
                $user->fill($request->all());
                $user->save();

                if($request->input('enviar_correo') == 1)
                {
                    Mail::to($user->email)->send(new UsuarioCambiarPassword($request));
                }

                $dato = redirect()->route('admin.usuarios.index')->with('estado','edit');
                break;
        }

        return $dato;
    }
}