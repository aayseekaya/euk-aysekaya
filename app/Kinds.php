<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinds extends Model
{
    protected $table = "kinds";
    protected $fillable = ['name','description',"imageUrl","order"];
    protected $guarded = [];

}
