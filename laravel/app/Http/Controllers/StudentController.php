<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function student(Request $request)
    {


        $students = Student::all();

        return view('students', [
            "students" => $students
        ]);
    }

    public function showOne($id)
    {

        $oneName = Student::find($id);
//        dd($oneName->work);

        return view('onename',
        [
            "onename" => $oneName
        ]);
    }
}
