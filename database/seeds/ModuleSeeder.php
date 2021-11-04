<?php

use Illuminate\Database\Seeder;
use App\Module;
use Illuminate\Support\Facades\DB;


class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create(['module_title' => 'Computing Mathematics','course_dept'=>'CSY','module_code'=>'CSY1001','level'=>'1',
            'points'=>'20', 'assessment1_weight'=>'50', 'exam_weight'=>'50']);
        Module::create(['module_title' => 'Systems Architecture','course_dept'=>'CSY','module_code'=>'CSY1002','level'=>'1',
            'points'=>'20', 'assessment1_weight'=>'50', 'exam_weight'=>'50']);
        Module::create(['module_title' => 'Problems Solving','course_dept'=>'CSY','module_code'=>'CSY1003','level'=>'1',
            'points'=>'20', 'assessment1_weight'=>'50', 'exam_weight'=>'50']);
        Module::create(['module_title' => 'Software Modelling 1','course_dept'=>'CSY','module_code'=>'CSY1004','level'=>'1',
            'points'=>'20', 'assessment1_weight'=>'50', 'exam_weight'=>'50']);
        Module::create(['module_title' => 'Software Implementation 1','course_dept'=>'CSY','module_code'=>'CSY1005','level'=>'1',
            'points'=>'20', 'assessment1_weight'=>'50', 'assessment2_weight'=>'50']);
        Module::create(['module_title' => 'Distributed Systems','course_dept'=>'CSY','module_code'=>'CSY1006','level'=>'1',
            'points'=>'20', 'assessment1_weight'=>'50', 'assessment2_weight'=>'50']);

        Module::create(['module_title' => 'Software Modelling 2','course_dept'=>'CSY','module_code'=>'CSY2001','level'=>'2',
            'points'=>'20', 'assessment1_weight'=>'50', 'assessment2_weight'=>'50']);
        Module::create(['module_title' => 'Software Implementation 2','course_dept'=>'CSY','module_code'=>'CSY2002','level'=>'2',
            'points'=>'20', 'assessment1_weight'=>'40', 'exam_weight'=>'60']);
        Module::create(['module_title' => 'Knowledge Processing','course_dept'=>'CSY','module_code'=>'CSY2003','level'=>'2',
            'points'=>'20', 'assessment1_weight'=>'20', 'assessment2_weight'=>'20', 'exam_weight'=>'60']);
        Module::create(['module_title' => 'Formal Specification of Software Systems 1','course_dept'=>'CSY','module_code'=>'CSY2004','level'=>'2',
            'points'=>'20', 'assessment1_weight'=>'40', 'exam_weight'=>'60']);
        Module::create(['module_title' => 'Database Technology ','course_dept'=>'CSY','module_code'=>'CSY2005','level'=>'2',
            'points'=>'20', 'assessment1_weight'=>'40', 'exam_weight'=>'60']);
        Module::create(['module_title' => 'Group Project and Project Management','course_dept'=>'CSY','module_code'=>'CSY2006','level'=>'2',
            'points'=>'20', 'assessment1_weight'=>'100']);

        Module::create(['module_title' => 'Software Modelling 3','course_dept'=>'CSY','module_code'=>'CSY3001','level'=>'3',
            'points'=>'20', 'assessment1_weight'=>'30', 'exam_weight'=>'70']);
        Module::create(['module_title' => 'Software Implementation 3','course_dept'=>'CSY','module_code'=>'CSY3002','level'=>'3',
            'points'=>'20', 'assessment1_weight'=>'30', 'exam_weight'=>'70']);
        Module::create(['module_title' => 'Applications of Artificial Intelligence','course_dept'=>'CSY','module_code'=>'CSY3003','level'=>'3',
            'points'=>'20', 'assessment1_weight'=>'30', 'exam_weight'=>'70']);
        Module::create(['module_title' => 'Formal Specification of Software Systems 2','course_dept'=>'CSY','module_code'=>'CSY3004','level'=>'3',
            'points'=>'20', 'assessment1_weight'=>'30', 'exam_weight'=>'70']);
        Module::create(['module_title' => 'Dissertation ','course_dept'=>'CSY','module_code'=>'CSY3005','level'=>'3',
            'points'=>'40', 'assessment1_weight'=>'20', 'assessment2_weight'=>'80']);
    }
}
