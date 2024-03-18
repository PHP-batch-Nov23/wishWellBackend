<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllUser;

class AllUserController extends Controller
{
    public function index(Request $request)
    {
        $allusers = AllUser::all();
        return response()->json($allusers);
    }

    public function store(Request $request)
    {
        //print_r ($request);
        //  return response()->json($request);
    
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:allusers,email',
            'password' => 'required',
            'role' => 'required|in:donor,fundraiser',
            'sex'=>'required|in:male,female,other',
            'pan' => 'unique:allusers',
            'dob' => 'nullable|date',
            'age' => 'nullable',
            'balance' => 'nullable|numeric',
            'address' => 'nullable',
            'city' => 'nullable',
            'profile_picture' => 'nullable',
            'description' => 'nullable',
        ]);

        $user = new AllUser();
        $user->fill($request->input());
        //$user->password = bcrypt($request->password);       // hashing of password
        $user->save();
        return response()->json($user);
    }
      
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        
     $user = User::findOrFail($id);
     $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:allusers,email,' . $user->id,
        'password' => 'required',
        'role' => 'required|in:donor,fundraiser',
        'dob' => 'nullable|date',
        'age' => 'nullable',
        'address' => 'nullable',
        'city' => 'nullable',
        'profile_picture' => 'nullable',
        'description' => 'nullable',
    ]);

    $user->fill($request->input());
    $user->save();
    return response()->json($user);
    }

    public function destroy($id)
    {
     $user = User::findOrFail($id);
     $user->delete();
     return response()->json($user);
    }

}
