<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {
       
    }

    
    public function create()
    {
        return view('create');
    }

    
    public function store(ContactFormRequest $request)
    {
        
    }

    
    public function show(string $id)
    {
       
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
