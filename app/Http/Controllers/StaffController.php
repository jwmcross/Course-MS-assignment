<?php

namespace App\Http\Controllers;

use App\Course;
use App\Module;
use App\ProfileStatus as ProfileStatus;
use App\Role;
use App\Staff;
use App\StaffRole;
use App\Title as Title;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    private $statuses;
    private $titles;

    public function __construct(ProfileStatus $statuses, Title $titles)
    {
        $this->statuses = $statuses;
        $this->titles = $titles;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff_arr = Staff::all();

        return view('staff.staff_table',compact('staff_arr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $staff = new Staff();
        $staff->specialist_subjects = [];
        $statuses = $this->statuses->allStaffStatus();
        $dormancies = $this->statuses->allStaffDormancy();
        $titles = $this->titles->all();

        //Generate Random ID
        $staff->assigned_id = rand(99100000, 99101999);
        while($staff->assigned_id == Staff::where('assigned_id',$staff->assigned_id)->first()){
            $staff->assigned_id = rand(99100000, 99101999);
        }

        return view('staff.staff_create', compact(['staff','statuses','dormancies','titles' ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request )
    {
        $data = $this->validateForm();

        if(Staff::create($data))
            $request->session()->flash('success','Successfully Added Staff Record');
        else
            $request->session()->flash('error','An Error Occurred. Changes not saved');

        return redirect('/staff');
    }

    /**
     * Display the specified resource.
     */
    public function show( Staff $staff )
    {
        $statuses = $this->statuses->allStaffStatus();
        $dormancies = $this->statuses->allStaffDormancy();
        $titles = $this->titles->all();

        return view('staff.staff_view', compact(['staff','statuses','dormancies','titles' ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Staff $staff )
    {

        $statuses = $this->statuses->allStaffStatus();
        $dormancies = $this->statuses->allStaffDormancy();
        $titles = $this->titles->all();

        return view('staff.staff_edit')->with(compact(['staff','statuses','dormancies','titles' ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Staff $staff )
    {
        $data = $this->validateForm($staff);
        $name = $staff->title. '. ' .$staff->firstname. ' ' .$staff->surname;
        if($staff->update($data))
            $request->session()->flash('success','Successfully Updated Staff Record : '.$name);
        else
            $request->session()->flash('error','An Error Occurred. Changes not saved');

        return redirect('/staff');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request, Staff $staff )
    {
        $staff->modules()->detach();
        $staff->courses()->detach();
        if($staff->delete())
            $request->session()->flash('success','Successfully Deleted Staff Record');
        else
            $request->session()->flash('error','An Error Occurred. Changes not saved');
        return redirect('/staff');
    }

    /**
     * Show the table of staff assignations
     *
     */
    public function assignStaff()
    {
        $staff_arr = Staff::all();

        return view('staff.staff_assigntable', compact('staff_arr'));
    }


    /**
     * Assign a staff member a role
     *
     */
    public function assignModuleTable(Request $request, Staff $staff)
    {
        $modules = Module::all();

        return view('staff.staff_assign_module',compact(['modules','staff']));
    }

    public function assignCourseTable(Request $request, Staff $staff)
    {
        $courses = Course::where('status','active')->get();

        return view('staff.staff_assign_course',compact(['courses','staff']));
    }

    public function assignModule(Request $request, Staff $staff)
    {

        $name = $staff->title. '. ' .$staff->firstname. ' ' .$staff->surname;
        if($staff->modules()->sync($request->modules))
            $request->session()->flash('success','Successfully Assigned '. $name .' as Module Leader to Modules.');
        else
            $request->session()->flash('error','An Error Occurred. Changes were not saved');

        return redirect()->route('assign_staff_table');
    }

    public function assignCourse(Request $request, Staff $staff)
    {

        $name = $staff->title. '. ' .$staff->firstname. ' ' .$staff->surname;
        if($staff->courses()->sync($request->courses))
            $request->session()->flash('success','Successfully Assigned '. $name .' as Course Leader to Course.');
        else
            $request->session()->flash('error','An Error Occurred. Changes not saved');

        return redirect()->route('show_staff');
    }

    private function validateForm(Staff $staff = null)
    {
        return request()->validate(
            [
                'assigned_id' => 'required|unique:staff,assigned_id'.( $staff ? ','.$staff->id.',id' : ''),
                'staff_status' => 'required',
                'dormancy_reason' => 'required_if:staff_status,==,Dormant',
                'title' => '',
                'firstname' => 'required',
                'middlenames' => '',
                'surname' => 'required',
                'address_street' => 'required',
                'address_city' => 'required',
                'address_postcode' => 'required',
                'contact_no' => 'required|min:11',
                'email' => 'required|email',
                'specialist_subjects' => '',
            ]
        );
    }
}
