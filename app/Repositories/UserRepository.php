<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface{

  public function getAllUsers()
  {
    return User::select(['id','name','email','role_id','estado'])->with('role')->orderby('id')->paginate();
  }

  public function getUserById(User $user)
  {
    $user->load('role');
    return $user;
  }

  public function deleteUser(User $user)
  {
   return $user->delete(); 
  }

  public function createUser(array $requestValidated)
  {
    return User::create([
        'name' => $requestValidated['name'],
        'email' => $requestValidated['email'],
        'role_id' => $requestValidated['role_id'],
        'password' => Hash::make($requestValidated['password']),
        
    ]);
  }

  public function updateUser(User $user, array $dateToUpdate)
  {
    
    return $user->update($dateToUpdate);
    
    // return User::update([
    //     'name' => $requestValidated['name'],
    //     'email' => $requestValidated['email'],
    //     'role_id' => $requestValidated['role_id'],
    //     'password' => Hash::make($requestValidated['password']),
        

    // ]);
  }

  public function updateEstado(User $user,array $dataToUpdate)
  {
    return $user->update($dataToUpdate);
  }


}