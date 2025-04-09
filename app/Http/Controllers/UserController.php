<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService ;
    }

    public function index(){
         $users = $this->userService->getAllUsers();

        return view('inventario.usuario.index', compact('users'));
    }

    public function create(){
        $roles = $this->userService->getAllRoles();
       
        return view('inventario.usuario.create', compact('roles'));
    }

    public function store(StoreUserRequest $request){
        Gate::authorize('create',User::class);
        $requestValidated = $request->validated();
        
        $this->userService->createUser($requestValidated);
        return redirect()->route('usuario.index');
    }

    public function edit(User $user){
        $user = $this->userService->getUserById($user);
        $roles = $this->userService->getAllRoles();

        return view('inventario.usuario.edit', compact('user','roles'));
    }

    public function update(User $user, UpdateUserRequest $request){
        Gate::authorize('update',$user);
        $requestValidated = $request->validated();
        $this->userService->updateUser($user, $requestValidated);
        return redirect()->route('usuario.index');

    }

    public function destroy(){




    }
}
