<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Module extends Model
{
    //
    protected $table = 'modules';
    protected $guarded = [];

    public function getYearModules( $yearModule )
    {
        $modules = DB::table('modules')
            ->where('level', $yearModule)
            ->get();
        return $modules;
    }

    public function courseDept()
    {
        $codes = (new Course)->faculties();
        $code = $codes[$this->course_dept];
        return $code;

    }

    public function staff()
    {
        return $this->belongsToMany('App\Staff');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function moduleLeader()
    {
        $names = [];

        return $this->staff()->get();


    }
}
