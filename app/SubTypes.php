<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTypes extends Model
{
    protected $table = "subTypes";
    protected $fillable = ['name', "imageUrl", "video_thumb", "video", "content", "order","kinds_id"];
    protected $guarded = [];

}
