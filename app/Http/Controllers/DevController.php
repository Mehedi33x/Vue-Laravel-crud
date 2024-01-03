<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function devShow()
    {
        $dev = Developer::get();
        if ($dev) {
            return response()->json(
                (object)[
                    'data' => $dev,
                    'status' => 200,
                    'message' => 'Dev Found'
                ]
            );
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No User Found'
            ]);
        }
    }


    public function devCreate(Request $request)

    {
        // dd($request->all());
        $dev = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'image' => 'nullable|file|mimes:jpeg,jpg,png|max:2048',
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($dev) {
            $dev_image = '';
            if ($image = $request->hasFile('image')) {
                $image = $request->file('image');
                $dev_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('uploads/', $dev_image);
            }

            $dev_cv = '';
            if ($cv = $request->hasFile('cv')) {
                $cv = $request->file('cv');
                $dev_cv = date('Ymdhsi') . '.' . $cv->getClientOriginalExtension();
                $cv->storeAs('uploads/', $dev_cv);
            }

            $dev = Developer::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'age' => $request->age,
                'gender' => $request->gender,
                'address' => $request->address,
                'skills' => json_encode($request->skills),
                'image' => $dev_image,
                'cv' => $dev_cv,
            ]);
            if ($dev) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Developers added'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Developers added failed'
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Validation Failed!!!'
            ]);
        }
    }

    public function devEdit($id)
    {
        $dev = Developer::find($id);
        // dd($dev);
        if ($dev) {
            return response()->json(
                (object)[
                    'data' => $dev,
                    'status' => 200,
                    'message' => 'Dev Found'
                ]
            );
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Developer Found'
            ]);
        }
    }

    public function devUpdate(Request $request, $id)
    {
        // dd($request->all());
        $dev = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'gender' => 'required',

        ]);

        if ($dev) {
            $dev_image = '';
            if ($image = $request->hasFile('image')) {
                $image = $request->file('image');
                $dev_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('uploads/', $dev_image);
            }

            $dev_cv = '';
            if ($cv = $request->hasFile('cv')) {
                $cv = $request->file('cv');
                $dev_cv = date('Ymdhsi') . '.' . $cv->getClientOriginalExtension();
                $cv->storeAs('uploads/', $dev_cv);
            }

            $dev = Developer::find($id);
            if ($dev) {
                $dev->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact' => $request->contact,
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'skills' => json_encode($request->skills),
                    'image' => $dev_image,
                    'cv' => $dev_cv,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Developer Found'
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Validation Failed!!'
            ]);
        }
    }






    public function devDelete($id)
    {
        $dev = Developer::find($id);
        // dd($dev);
        $dev->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
