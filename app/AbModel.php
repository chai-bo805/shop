<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbModel extends Model
{
    protected $table='student';
    protected $primaryKey ='studentid';
    public $timestamps=false;
    protected $guarded=[];
}
