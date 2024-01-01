<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function userShow()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        // dd($users);
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
        $validate = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'gender' => 'required|in:male,female',
            ],
        );

        $user_image = '';
        if ($image = $request->hasFile('image')) {
            $image = $request->file('image');
            $user_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/', $user_image);
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'skill' => $request->skills,
            'image' => $user_image,
        ]);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required|in:male,female',
        ]);



        $user = User::find($id);
        $user_image = $user->image;
        if ($image = $request->file('image')) {
            if (file_exists(public_path('uploads/user/' . $user_image))) {
                File::delete(public_path('uploads/user/' . $user_image));
            }
            $user_image = time() . '-' . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/user/', $user_image);
        }
        if ($user) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'gender' => $request->gender,
                'image' => $user_image,
                'skill' => $request->skills,
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
