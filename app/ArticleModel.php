<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table='article';
    protected $primaryKey ='aid';
    public $timestamps=false;
    protected $guarded=[];
}
