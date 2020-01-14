<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LianModel extends Model
{
    protected $table='yuan';
    protected $primaryKey ='yuanid';
    public $timestamps=false;
    protected $guarded=[];
}
