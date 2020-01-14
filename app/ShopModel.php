<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    protected $table='goods_shop';
    protected $primaryKey ='goods_id';
    public $timestamps=false;
    protected $guarded=[];
}
