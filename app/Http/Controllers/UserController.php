<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest; 
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('index', compact('users'));
    }

    
    public function create()
    {
        return view('create');
    }

   
    public function store(CreateUserRequest $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:5',
            'email' => 'required|string|email|max:25|unique:users',
            'phone' => 'required|number|max:12',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create($validatedData);
        return redirect()->route('show', $user->id);
        $user = User::create($request->all());

       
        $admin = User::where('role', 'admin')->first();
        Notification::send($admin, new NewClientNotification($user->name, $user->surname, $user->email));
    
        return redirect()->back();
    }

   
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('show', compact('user'));
    }

   
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

  
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        $user->update($validatedData);
        return redirect()->route('show', $user->id);
    }

   
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('index');
    }
}
