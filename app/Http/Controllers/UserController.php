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
        return response()->json($users);
    }

    public function create()
    {
        return response()->json('create');
    }

    public function store(CreateUserRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::create($validatedData);
        $admin = User::where('role', 'admin')->first();
        Notification::send($admin, new NewClientNotification($user->name, $user->surname, $user->email));
        return response()->json($user);
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validated();
        $user->update($validatedData);
        return response()->json($user);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
