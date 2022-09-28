<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('index');
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    { if($request->user() != null && $request->user()->type == 'A'){
       return redirect('/admin');
    }
        $data['products'] = product::orderBy('id', 'desc')->get();
        $data['services'] = service::orderBy('id', 'desc')->get();
        $data['productCount'] = product::count();
        return view('index',$data);
    }
}
