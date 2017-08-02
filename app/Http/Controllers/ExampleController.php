<?php

namespace App\Http\Controllers;
use App\User;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getAllUser()
    {
        $dataUser = User::all();
        return response()->json($dataUser);
    }
}
