<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
            $user=User::all('id','name','email','role_id');
            return $user;
    }

    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);

        if($user) { $user->update($request->all());}

        else return response()->json(error);

        return response()->json([
            'message' => 'User updated successfully'
        ], 201);
    }

    public function destroy($id){

        $user=User::findOrFail($id);

        if($user) $user->delete();
        
        else return response()->json(error);

        return response()->json([
            'message' => 'User deleted successfully'
        ], 201);
    }

    public function show($id){
        $user = User::find($id);
        $role =  User::find($id)->role;
        return response()->json([
            'details' => $user,
            'role' => $role
        ], 201);
    }
}
