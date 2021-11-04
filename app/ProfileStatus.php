<?php

namespace App;

class ProfileStatus
{
    //
    protected $student_status = ['Provisional', 'Live', 'Dormant'];
    protected $student_dormancy = ['Graduated', 'Withdraw', 'Terminated'];
    protected $staff_status = ['Live', 'Dormant'];
    protected $staff_dormancy = ['Retired', 'Resigned', 'Misconduct'];

    public function allStudentStatus()
    {
        return $this->student_status;
    }

    public function allStudentDormancy()
    {
        return $this->student_dormancy;
    }

    public function allStaffStatus()
    {
        return $this->staff_status;
    }

    public function allStaffDormancy()
    {
        return $this->staff_dormancy;
    }
}
