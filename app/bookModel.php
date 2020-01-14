<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookModel extends Model
{
    protected $table='book';
    protected $primaryKey ='bookid';
    public $timestamps=false;
    protected $guarded=[];
}
