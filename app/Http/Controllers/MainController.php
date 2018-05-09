<?php

namespace App\Http\Controllers;

use App\Product;

class MainController extends Controller
{

    public function index()
    {
//        session()->flush();
        return view('index', [
            'newestProducts' => Product::orderBy('created_at', 'desc')->take(7)->get()
        ]);
    }

    public function indexAdmin()
    {
        return view('admin.main');
    }
}
