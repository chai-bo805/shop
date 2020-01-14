<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FengModel extends Model
{
    
    protected $table='feng';
    protected $primaryKey ='louid';
    public $timestamps=false;
    protected $guarded=[];
}
