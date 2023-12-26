<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentSave(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'contact' => 'required',
        //     'dob' => 'required',
        //     'gender' => 'required',
        // ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'dob' => $request->dob,
            'gender' => $request->gender,
        ]);

        // return to_route();
    }
    public function studentShow(){
        $student_data=Student::all();
        return response()->json($student_data);
    }
}
