<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $timetamps = true;
    protected $fillable = ['class_id', 'class_name'];

}
