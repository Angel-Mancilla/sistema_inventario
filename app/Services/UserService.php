<?php
namespace App\Services;

use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserService{

    protected UserRepositoryInterface $userRepository;
    protected RoleRepositoryInterface $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    

    public function getAllUsers(){
        try {
            return $this->userRepository->getAllUsers();
        } catch(\Exception $e) {
            throw new Exception('Ha ocurrido un error al obtener la lista de usuarios');

        }
    }

    public function getUserById(User $user){
        try {
           return $this->userRepository->getUserById($user);
        } catch(\Exception $e) {
            throw new Exception('No se pudo obtener el usuario');
        }
    }
    public function createUser(array $requestValidated){
        try {
            return $this->userRepository->createUser($requestValidated);
        } catch(\Illuminate\Database\QueryException $e) {
            if($e->getCode() == '23000'){
                throw new Exception('El id del usuario ya esta registrado');
            }
            throw new Exception('Error en la base de datos al crear el usuario');
        } catch(\Exception $e) {
            throw new Exception('Ocurrio un error inesperado al crear el usuario');
        }
    }

    public function updateUser(User $user, array $requestValidated){

        try {
            $dataToUpdate = [
                'name' => $requestValidated['name'],
                'email' => $requestValidated['email'],
                'role_id' => $requestValidated['role_id'],
            ];

            if(!empty($requestValidated['password'])) {
                $dataToUpdate['password'] = Hash::make($requestValidated['password']);
            }
            return $this->userRepository->updateUser($user, $dataToUpdate);
        } catch(\Illuminate\Database\QueryException $e) {
            throw new Exception('Error en la base de datos al actualizar el usuario');
        } catch(\Exception $e) {
            throw new Exception('Ocurrio un error inesperado al actualizar el usuario');
        }
        

    }
    public function updateEstado(User $user, array $requestValidated){
        
        
        $hasEstado= (bool)$requestValidated['estado'];
        
         $dataToUpdate = [
            'estado' => $hasEstado,
         ];
         
        return $this->userRepository->updateEstado($user, $dataToUpdate);

        
    }

    public function deleteUser(User $user){
        try {
            return $this->userRepository->deleteUser($user);
        } catch(\Exception $e) {
            throw new Exception('Ocurrio un error inesperado al eliminar el usuario');
        }
    }

    public function getAllRoles(){
        return $this->roleRepository->getAllRoles();
    }
}