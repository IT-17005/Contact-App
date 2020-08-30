<?php

namespace App\Http\Controllers;

use App\students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = students::orderBy('id','desc')->get();

        return view('index',compact('students',$students));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|max:100',
        'student_id' => 'required',
        'session' => 'required',
        //'mobile' => 'required',
        // 'email' => 'required',
        ]);
        $students = new students;
        $students->name = $request->name;
        $students->student_id = $request->student_id;
        $students->session = $request->session;
        $students->mobile = $request->mobile;
        // $students->email = $request->email;
        $students->save();
        Session()->flash('success_store','A new student has added successfully...');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(students $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student =students::find($id);
        $students =students::orderBy('id','desc')->get();
        return  view('edit',compact('student',$student),compact('students',$students));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'student_id' => 'required',
            'session' => 'required',
            //'mobile' => 'required',
            // 'email' => 'required',
            ]);
        $students = new students;
        $students = students::find($id);
        $students->name = $request->name;
        $students->student_id = $request->student_id;
        $students->session = $request->session;
        $students->mobile = $request->mobile;
        // $students->email = $request->email;
        $students->save();
        Session()->flash('success_edit','The student has edited successfully...');
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $student = students::find($id);
        if(!is_null($student)){
            $student->delete();
        }
        Session()->flash('success_delete','The student has deleted successfully...');
        return redirect()->route('index');
    }
}
