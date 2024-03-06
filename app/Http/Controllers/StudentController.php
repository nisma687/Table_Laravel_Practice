<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentDetailsRequest;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
// use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function __construct()
{
    $this->middleware('auth:sanctum')->except(['create', 'index']);
}

public function store(StudentRequest $request)
{
    $validatedData = $request->validated();
    DB::beginTransaction();
    try{
        // student data save 
        // new object creation
        // $student=new Student();
        // $student->name=$request->name;
        // $student->result=$request->result;
        // $student->class=$request->class;
        // $student->save();
        $student=Student::create($validatedData) ;
        $student->studentDetails()->create($validatedData);

        // details data save
        // new object creation
        // $details= new StudentDetail();
        // $details->father_name=$request->father_name;
        // $details->father_number=$request->father_number;
        // $details->save();

        DB::commit();

        return response()->json([
            'message'=> '',
            'data'=> $student
            ]);
    }
    catch(\Exception $e){
        DB::rollBack(); 
        return back()->with('error', $e->getMessage());
    }

}

public function index(){
    $student=Student::all();
    if($student){
        return response()->json([
            "status"=> "success",
            "message"=> "you got the data",
            "data"=> $student
        ]);
    }else{
        return response()->json([
            "status"=> "success",
            "message"=> "No data Found "
        ]);
    }

    
}






















}