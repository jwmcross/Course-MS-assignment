<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Staff extends Model
{
    //
    protected $guarded = [];
    /**
     * @var mixed
     */
    protected $casts = [
        'specialist_subjects' => 'array'
    ];


    public function modules()
    {
        return $this->belongsToMany('App\Module');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function roles()
    {
        $roles = [];
        //Check if the staff member is assigned to a module/course
        $modules = $this->modules()->exists();
        $courses = $this->courses()->exists();

        if($courses) $roles[] = 'Course Leader';
        if($modules) $roles[] = 'Module Leader';

        return $roles;
    }

    public function associatedCourse()
    {
        return $this->courses()->exists() ? $this->courses()->get()->toArray() : null;
    }

    public function associatedModules()
    {
        return $this->modules()->exists() ? $this->modules()->get()->toArray() : null;
    }

}
