<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewcateModel extends Model
{
    protected $table='new_cate';
    protected $primaryKey ='cate_id';
    public $timestamps=false;
    protected $guarded=[];
}
