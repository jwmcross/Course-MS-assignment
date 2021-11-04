<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title
{
    //
    protected $title_arr = ['Mr', 'Mrs', 'Miss', 'Dr', 'Prof', 'Rev'];

    public function all()
    {
        return $this->title_arr;
    }

    public function get($id)
    {
        return $this->title_arr[$id];
    }
}
