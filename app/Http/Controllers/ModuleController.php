<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Module as Module;

class ModuleController extends Controller
{

    private $module;
    private $course;

    public function __construct(Module $module, Course $course)
    {
        $this->module = $module;
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::all();
        return view('module.module_table', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $module = new Module();
        $module->module_code = '0'.rand(10,99);
        $course_codes = $this->course->faculties();

        return view('module.module_create', compact('module', 'course_codes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data['module_code'] = $request->input('course_dept').'-'.$request->input('level').$request->input('module_code');
        $data = $this->validateForm();

        if($module= Module::create($data))
            $request->session()->flash('success','Successfully Created Module - '.$module->module_title);
        else
            $request->session()->flash('error','An Error Occurred. Module was not saved.');

        return redirect('/module');
    }

    /**
     * Display the specified resource.
     */
    public function show( Module $module )
    {
        return view('module.module_view', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Module $module )
    {

        $course_codes = $this->course->faculties();

        return view('module.module_edit', compact('module','course_codes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module )
    {
        $data = $this->validateForm($module);
        if($module->save($data))
            $request->session()->flash('success','Successfully Updated Module Details - '.$module->module_title);
        else
            $request->session()->flash('error','An Error Occurred. Changes were not saved.');

        return redirect('/module');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Module $module )
    {
        $title = $module->title;
        if($module->delete())
            $request->session()->flash('success','Successfully Deleted Module - '.$title);
        else
            $request->session()->flash('error','An Error Occurred. Changes not saved');

        return redirect('/module');
    }

    private function validateForm( Module $module = null )
    {
        return request()->validate(
            [
                'course_dept'           => 'required',
                'module_code'           => 'unique:modules,module_code'.( $module ? ','.$module->id.',id' : ''),
                'level'                 => 'required',
                'points'                => 'required',
                'module_title'          => 'required',
                'assessment1_weight'    => '',
                'assessment2_weight'    => '',
                'exam_weight'           => '',
            ]
        );
    }
}
