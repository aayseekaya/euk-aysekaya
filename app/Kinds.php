<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinds extends Model
{
    protected $table = "kinds";
    protected $fillable = ['name',"imageUrl","order"];
    protected $guarded = [];

}
