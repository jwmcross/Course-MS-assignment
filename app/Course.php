<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module as Module;

class Course extends Model
{
    protected $table = 'courses';
    protected $guarded = [];

    public $faculties = [
        'AVM' => 'Advertsing and Marketing',
        'ART' => 'Art and Design',
        'BIO' => 'Biological Science',
        'CSY' => 'Computing',
        'ECO' => 'Economics, Account and Finance',
        'EDU' => 'Education',
        'ENG' => 'Engineering',
        'ENL' => 'English',
        'ENV' => 'Environmental Sciences',
        'EVH' => 'Events and Hospitality',
        'FSH' => 'Fashion',
        'HIS' => 'History',
        'JRL' => 'Journalism',
        'LAW' => 'Law',
        'NRS' => 'Nursing',
        'POL' => 'Politics',
        'PSY' => 'Psychology',
        'SSC' => 'Sport Science',
    ];

    public $award_types =  [
        'HND' => 'Higher National Diploma',
        'BEng'  =>'Bachelor of Engineering',
        'BSc'   => 'Bachelor of Science',
        'BA' => 'Bachelor of Arts',
        'MSc' => 'Master of Science',
        'MEng' => 'Master of Engineering',
        'MBA' => 'Master of Business Administration',
        'MA' => 'Master of Arts',
    ];


    public function staff()
    {
        return $this->belongsToMany('App\Staff');
    }

    public function modules()
    {
        return $this->belongsToMany('App\Module');
    }

    public function faculties()
    {
        return $this->faculties;
    }


    public function courseFaculty()
    {
        return $this->faculties[$this->faculty];
    }

    public function awardTypes()
    {
        return $this->award_types;
    }

    public function awardType()
    {
        return $this->award_types[$this->award_type];
    }

    public function numOfModules()
    {
        $count = 0;
        if($this->year1_module_one) $count++;
        if($this->year1_module_two) $count++;
        if($this->year1_module_three) $count++;
        if($this->year1_module_four) $count++;
        if($this->year1_module_five) $count++;
        if($this->year1_module_six) $count++;
        if($this->year2_module_one) $count++;
        if($this->year2_module_two) $count++;
        if($this->year2_module_three) $count++;
        if($this->year2_module_four) $count++;
        if($this->year2_module_five) $count++;
        if($this->year2_module_six) $count++;
        if($this->year3_module_one) $count++;
        if($this->year3_module_two) $count++;
        if($this->year3_module_three) $count++;
        if($this->year3_module_four) $count++;
        if($this->year3_module_five) $count++;

        return $count;
    }

    public function yearOneModules()
    {
        $modules = [];

        $modules[] = $this->year1_module_one;
        $modules[] = $this->year1_module_two;
        $modules[] = $this->year1_module_three;
        $modules[] = $this->year1_module_four;
        $modules[] = $this->year1_module_five;
        $modules[] = $this->year1_module_six;

        return Module::whereIn('id',$modules)->get();
    }

    public function yearTwoModules()
    {
        $modules = [];

        $modules[] = $this->year2_module_one;
        $modules[] = $this->year2_module_two;
        $modules[] = $this->year2_module_three;
        $modules[] = $this->year2_module_four;
        $modules[] = $this->year2_module_five;
        $modules[] = $this->year2_module_six;

        return Module::whereIn('id',$modules)->get();
    }

    public function yearThreeModules()
    {
        $modules = [];

        $modules[] = $this->year3_module_one;
        $modules[] = $this->year3_module_two;
        $modules[] = $this->year3_module_three;
        $modules[] = $this->year3_module_four;
        $modules[] = $this->year3_module_five;

        return Module::whereIn('id',$modules)->get();
    }

    public function courseLeader()
    {
        $name = $this->staff()->get()->first()->title.'. '.$this->staff()->get()->first()->firstname.' '.$this->staff()->get()->first()->surname;


        return $name;
    }
}
