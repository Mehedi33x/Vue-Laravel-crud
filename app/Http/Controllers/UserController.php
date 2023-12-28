<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userShow()
    {
        $users = User::all();
        if ($users) {
            return response()->json($users);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No User Found'
            ]);
        }
    }
    public function userCreate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'gender' => 'required|in:male,female',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
        ]);
        // if($user){


        // }
    }

    public function userEdit(Request $request, $id)
    {
        // dd($id);
        $user = User::find($id);
        // dd($user);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No User Found'
            ]);
        }
    }

    public function userUpdate(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'gender' => 'required|in:male,female',
        ]);

        $user_image='';
        if($image=$request->hasFile('image'))
        {
            $image=$request->file('image');
            $user_image=date('Ymdhsi').'.'.$image->getClientOriginalExtension();
            $image->storeAs('/user',$user_image);
        }

        $user = User::find($id);
        if ($user) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'gender' => $request->gender,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found'
            ]);
        }
    }

    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
