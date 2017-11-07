<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseControllerAdmin extends Controller
{
    public function __construct()
    {
        //its just a dummy data object.
        $user = User::all();

        // Sharing is caring
        View::share('user', $user);
    }
}
