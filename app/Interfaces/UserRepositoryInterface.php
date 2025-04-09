<?php

namespace App\Interfaces;

use App\Models\Role;
use App\Models\User;

interface UserRepositoryInterface{

    public function getAllUsers();
    public function getUserById(User $user);
    public function deleteUser(User $user);
    public function createUser( array $requestValidated);
    public function updateUser(User $user, array $requestValidated);
    
    

}
