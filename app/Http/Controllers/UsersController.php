<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('role', 'player')->orderBy('created_at', 'desc')->paginate(15);
        return view('players.index', compact('users'));
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users',
                'phone' => 'nullable|string',
                'gender' => 'required|string',
                'address1' => 'required|string',
                'address2' => 'nullable|string',
                'city' => 'nullable|string',
                'state' => 'nullable|string',
                'postcode' => 'nullable|string',
                'country' => 'nullable|string',
                'password' => 'required|string',
                'password_confirmation' => 'required|string|same:password',
            ]);

            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'role' => 'player',
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'postcode' => $request->postcode,
                'country' => $request->country,
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('players.index')->with('success', 'User created successfully'); 
        }

        return view('players.create');
    }

    public function edit(Request $request, $id)
    {
        if($request->isMethod('put')) {
            $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => 'nullable|string',
                'gender' => 'required|string',
                'address1' => 'required|string',
                'address2' => 'nullable|string',
                'city' => 'nullable|string',
                'state' => 'nullable|string',
                'postcode' => 'nullable|string',
                'country' => 'nullable|string'
            ]);
    
            $user = User::findOrFail($id);
    
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'postcode' => $request->postcode,
                'country' => $request->country,
                'password' => bcrypt($request->password),
            ]);
    
            return redirect()->route('players.index')->with('success', 'User updated successfully');
        }

        $user = User::findOrFail($id);
        return view('players.edit', compact('user'));
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('players.index')->with('success', 'User deleted successfully');
    }
}
