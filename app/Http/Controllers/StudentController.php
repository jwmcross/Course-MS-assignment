<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProfileStatus as ProfileStatus;
use App\Country as Country;
use App\Title as Title;

use App\Course;
use App\Student;


class StudentController extends Controller
{

    private $statuses;
    private $titles;
    private $country;
    private $course;

    public function __construct(ProfileStatus $statuses, Title $titles, Country $country, Course $course)
    {
        $this->statuses = $statuses;
        $this->titles = $titles;
        $this->country = $country;
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $student_arr = Student::all();

        return view('student.student_table', compact('student_arr'));
    }

    /**
     * Display a listing of the resource with management controls.
     */
    public function manage()
    {

        $student_arr = Student::all();

        return view('student.student_table_manage', compact('student_arr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $student = new Student();
        $student->qualifications = [];
        $statuses = $this->statuses->allStudentStatus();
        $dormancies = $this->statuses->allStudentDormancy();
        $titles = $this->titles->all();
        $countries = $this->country->all();
        $courses = $this->course->all();

        //Generate Random ID
        $student->assigned_id = date('y').rand(100000, 999999);
        while($student->assigned_id == Student::where('assigned_id',$student->assigned_id)->first()){
            $student->assigned_id = rand(10000, 999999);
        }


        return view('student.student_create', compact(['student','statuses','dormancies','titles','countries','courses' ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateForm();

        if(Student::create($data))
            $request->session()->flash('success','Successfully Added Student Record');
        else
            $request->session()->flash('error','An Error Occurred. Changes not saved');

        return redirect('/student');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.student_view ', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {

        $statuses = $this->statuses->allStudentStatus();
        $dormancies = $this->statuses->allStudentDormancy();
        $titles = $this->titles->all();
        $countries = $this->country->all();
        $courses = $this->course->all();

        return view('student.student_edit', compact(['student','statuses','dormancies','titles','countries','courses' ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $this->validateForm($student);
        $name = $student->firstname. ' ' .$student->surname;
        if($student->update($data))
            $request->session()->flash('success','Successfully Updated Student Record : '.$name);
        else
            $request->session()->flash('error','An Error Occurred. Changes not saved');


        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request, Student $student)
    {
        if($student->delete())
            $request->session()->flash('success','Successfully Deleted Student Record');
        else
            $request->session()->flash('error','An Error Occurred. Changes not saved');

        return redirect('/student');
    }

    public function archive( Student $student_id )
    {


        return redirect()->route('student.manage_student');
    }



    private function validateForm( Student $student = null )
    {
        return request()->validate(
            [
                'assigned_id' => 'required|unique:students,assigned_id'.( $student ? ','.$student->id.',id' : ''),
                'student_status' => 'required',
                'dormancy_reason' => 'required_if:student_status,==,Dormant',
                'title' => '',
                'firstname' => 'required',
                'middlenames' => '',
                'surname' => 'required',
                'date_of_birth' => 'required|date_format:Y-m-d|before:today',
                'term_address_street' => 'required',
                'term_address_city' => 'required',
                'term_address_postcode' => 'required',
                'term_address_country' => 'required',
                'home_address_street' => '',
                'home_address_city' => '',
                'home_address_postcode' => '',
                'home_address_country' => '',
                'contact_no' => 'required|min:11',
                'email' => 'required|email:filter',
                'course_id' => '',
                'qualifications' => '',
            ]
        );
    }
}
