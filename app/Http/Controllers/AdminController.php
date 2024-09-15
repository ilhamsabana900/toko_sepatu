<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.products.index'); // Pastikan Anda membuat file view untuk dashboard admin
    }
}
