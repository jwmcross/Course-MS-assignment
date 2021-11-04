<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Student extends Model
{

    protected $guarded = [];
    /**
     * @var mixed
     */
    protected $casts = [
        'qualifications' => 'array'
    ];

    public function calculateAge()
    {
        $now = new \DateTime();
        $dob = new \DateTime($this->date_of_birth);

        $diff = $now->diff($dob);

        $age = $diff->format('%Y');

        return $age;
    }

    public function formatDob()
    {
        $dob = new \DateTime($this->date_of_birth);
        return $dob->format('d F Y');
    }

    public function course()
    {
        return Course::where('id', $this->course_id) ?? null;

    }
}
