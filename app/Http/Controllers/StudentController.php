<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{

    public $genders = [
        "0" => "Female",
        "1" => "Male",
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $data = array(
            'gender'    => $request->gender
        );
        // dd($data['gender']);

        $students = DB::table('students')->where('gender', '=', $data['gender'])->get();
        // $students = DB::table('students')->get();
        // dd($students);
        return view('students.dashboard',compact('students'))->with('students',Student::paginate(5));
        // return redirect()->route('students.index');
        
        

        // dd($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //for Validation
        $request->validate([
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'gender'        =>  'required|string',
                'country'       =>  'required',
                'city'          =>  'required',
                'address'       =>  'required',


        ]);


        Student::create($request->all());

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        


        $students = Student::findOrFail($id);

        return view('students.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function edit(Student $student)
    public function edit($id)
    {
        $students = Student::findOrFail($id);

        return view('students.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //for Validation
       $request->validate([
        'first_name'    =>  'required',
        'last_name'     =>  'required',
        'gender'        =>  'required',
        'country'       =>  'required',
        'city'          =>  'required',
        'address'       =>  'required',


]);

        $student = array(
            'first_name'    =>  $request->first_name,
            'last_name'     =>  $request->last_name,
            'gender'        =>  $request->gender,
            'country'       =>  $request->country,
            'city'          =>  $request->city,
            'address'       =>  $request->address,
        );

        // dd($student);

        Student::whereId($id)->update($student);

        return redirect()->route('students.index')->with('success','Student successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::findOrFail($id);
        $students->delete();

        return redirect()->route('students.index')->with('success', 'Student Successfully deleted!');
    }

    public function studentGender(Request $request)
    {
        $data = array(
            'gender'    => $request->gender
        );
        dd($data);

        $students = DB::table('students')->where('gender', '=', $data['gender'])->tosql();
        return view('students.dashboard',compact('students'))->with('students',Student::paginate(5));
    }

    
}
