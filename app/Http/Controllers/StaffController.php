<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::where('role', 'admin')->orderBy('created_at', 'desc')->paginate(15);
        return view('staff.index', compact('users'));
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
                'role' => 'admin',
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

            return redirect()->route('staff.index')->with('success', 'Staff created successfully'); 
        }

        return view('staff.create');
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
    
            return redirect()->route('staff.index')->with('success', 'User updated successfully');
        }

        $user = User::findOrFail($id);
        return view('staff.edit', compact('user'));
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if(auth()->user()->role == 'admin') {
            return redirect()->route('staff.index')->with('error', 'You cannot delete another admin');
        }

        if ($user->id == auth()->user()->id) {
            return redirect()->route('staff.index')->with('error', 'You cannot delete yourself');
        }

        $user->delete();

        return redirect()->route('staff.index')->with('success', 'User deleted successfully');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail(auth()->user()->id);

        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->storeAs('photos', $imageName, 'public');
        $user->update(['photo' => $imageName,]);

        return redirect()->back()->with('success', 'Photo uploaded successfully');
    }
}
