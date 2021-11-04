<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course as Course;
use App\Module as Module;

class CourseController extends Controller
{

    private $course;
    private $module;

    public function __construct(Course $course, Module $module)
    {
        $this->course = $course;
        $this->module = $module;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::where('status','active')->get();


        return view('course.course_table', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $course = new Course();
        $firstyear_modules = $this->module->getYearModules('1');
        $secondyear_modules = $this->module->getYearModules('2');
        $thirdyear_modules = $this->module->getYearModules('3');

        return view('course.course_create', compact(['course','firstyear_modules','secondyear_modules','thirdyear_modules' ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateForm();

        if($course = Course::create($data))
            $request->session()->flash('success','Successfully Created Course - '.$course->course_title);
        else
            $request->session()->flash('error','An Error Occurred. Course was not added.');

        return redirect('/course');
    }

    /**
     * Display the specified resource.
     */
    public function show( Course $course )
    {
        $firstyear_modules = $this->module->getYearModules('1');
        $secondyear_modules = $this->module->getYearModules('2');
        $thirdyear_modules = $this->module->getYearModules('3');

        return view('course.course_view', compact(['course','firstyear_modules','secondyear_modules','thirdyear_modules' ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Course $course )
    {
        $firstyear_modules = $this->module->getYearModules('1');
        $secondyear_modules = $this->module->getYearModules('2');
        $thirdyear_modules = $this->module->getYearModules('3');

        return view('course.course_edit', compact(['course', 'firstyear_modules', 'secondyear_modules', 'thirdyear_modules']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $this->validateForm($course);

        if($course->save($data))
            $request->session()->flash('success','Successfully Updated Course Details - '.$course->course_title);
        else
            $request->session()->flash('error','An Error Occurred. Changes were not saved.');


        return redirect('/course');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request, Course $course )
    {
        $title = $course->course->title;
        if($course->delete())
            $request->session()->flash('success','Successfully Delete Course - '.$title);
        else
            $request->session()->flash('error','An Error Occurred. Changes were not saved.');


        return redirect('/course');
    }

    private function validateForm( Course $course = null )
    {
        return request()->validate(
            [
                'course_code'       => 'required|unique:courses,course_code'.( $course ? ','.$course->id.',id' : ''),
                'award_level'       => 'required',
                'award_type'        => 'required',
                'course_title'      => 'required',
                'faculty'           => 'required',
                'year1_module_one'  => '',
                'year1_module_two'  => '',
                'year1_module_three'=> '',
                'year1_module_four' => '',
                'year1_module_five' => '',
                'year1_module_six'  => '',
                'year2_module_one'  => '',
                'year2_module_two'  => '',
                'year2_module_three'=> '',
                'year2_module_four' => '',
                'year2_module_five' => '',
                'year2_module_six'  => '',
                'year3_module_one'  => '',
                'year3_module_two'  => '',
                'year3_module_three'=> '',
                'year3_module_four' => '',
                'year3_module_five' => '',
            ]
        );
    }

    private function structureForm( Course $course = null )
    {
        return request()->validate(
            [
                'year1_module_one'  => '',
                'year1_module_two'  => '',
                'year1_module_three'=> '',
                'year1_module_four' => '',
                'year1_module_five' => '',
                'year1_module_six'  => '',
                'year2_module_one'  => '',
                'year2_module_two'  => '',
                'year2_module_three'=> '',
                'year2_module_four' => '',
                'year2_module_five' => '',
                'year2_module_six'  => '',
                'year3_module_one'  => '',
                'year3_module_two'  => '',
                'year3_module_three'=> '',
                'year3_module_four' => '',
                'year3_module_five' => '',
            ]
        );
    }

    public function archiveCourse( Request $request, Course $course )
    {
        $course->status = 'archived';
        if($course->save())
            $request->session()->flash('success','Successfully Archived Course - '.$course->course_title);
        else
            $request->session()->flash('error','An Error Occurred. Changes were not saved.');

        return redirect()->route('show_course');
    }

    public function archivee()
    {
        $courses = Course::where('status','archived')->get();


        return view('course.course_table_archived', compact('courses'));
    }

    public function structureCourseView()
    {

        $courses = Course::all();
        return view('course.course_table_structure', compact('courses'));
    }

    public function structureCourse( Course $course )
    {
        $firstyear_modules = Module::where('level','1')->get();
        $secondyear_modules = Module::where('level','2')->get();
        $thirdyear_modules = Module::where('level','3')->get();

        return view('course.course_structure', compact('course', 'firstyear_modules','secondyear_modules','thirdyear_modules'));
    }

    public function saveStructureCourse( Request $request, Course $course )
    {
        $data = [];
//        $data = $request->input(
//            'year1_module_one','year1_module_two','year1_module_three',
//            'year1_module_four','year1_module_five','year1_module_six',
//            'year2_module_one','year2_module_two','year2_module_three',
//            'year2_module_four','year2_module_five','year2_module_six',
//            'year3_module_one','year3_module_two','year3_module_three',
//            'year3_module_four','year3_module_five'
//        );
        $data = $this->structureForm();
        //dd($data);
        if($course->update($data))
            $request->session()->flash('success','Course Structure Saved Successfully');
        else
            $request->session()->flash('error', 'An Error Occurred Whilst Saving. No Changes Made.');


        return redirect()->route('course.structure_table');
    }

}
