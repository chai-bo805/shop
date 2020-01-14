<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddCart extends Model
{
    protected $table='cart';
    protected $primaryKey ='cart_id';
    public $timestamps=false;
    protected $guarded=[];
}
