<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //auth admin
    public function __construct()
    {
        $this->middleware('auth');
    }
    //home admin
    public function index()
    {
        return view('pengurus/PanelPengurus');
    }
}
