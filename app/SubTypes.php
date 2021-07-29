<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTypes extends Model
{
    protected $table = "subTypes";
    protected $fillable = [ 'name','title','imageUrl','product_receipt','video_thumb','video','content','use',
    'tuber_color','tuber_shell','dry_matter_ratio','bump_feature','eye_depth','bump_size',
    'productivity','maturity_period','flowering_ınterval','flower_color','green_evening_ıntensity',
    'late_blight','dry_rot','yn_virus','yntn_virus','virüs_x','tobacco_ring_virus','golden_cyst_nematode',
    'ro1_and_ro4','white_nematode','dormancy_process','planting_suggestions','order',"kinds_id"];
    protected $guarded = [];

}
