<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($username, $password)
    {
        $user = $this->user->findByUsername($username);
        var_dump($user);
        // die();
        // if ($user && password_verify($password, $user->password)) {
        //     $_SESSION['user_id'] = $user->id;
        //     $_SESSION['role'] = $user->role;
        //     return true;
        // }
        if ($user ) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['role'] = $user->role;
            // return true;
        }
        // var_dump($_SESSION);
        // return false;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }
}
