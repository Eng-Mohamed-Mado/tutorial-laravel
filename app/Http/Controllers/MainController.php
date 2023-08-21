<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    // Contractor Functions
        // - Run Automatic Before Any Functions
    public function __construct()
    {
        $this->middleware('CheckDay');
            // If Except some Fun
        // $this->middleware('CheckDay')->except('name_function');
            // If Multi Middleware
        // $this->middleware('CheckDay','Auth')->except('name_function');
    }
    public function index()
    {
        // View Basic Page
        return view('contact');
    }

    public function storedata(Request $request){
        $title = $request -> title ;
        $doc = $request -> doc ;

        return view('welcome',compact('title','doc'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //

   }
}