<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccesoSistema extends Controller
{
    public function login(){
        return view('sistema.login');
    }
    public function index(){
        return view('index');
    }
}
