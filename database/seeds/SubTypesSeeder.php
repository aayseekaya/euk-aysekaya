<?php

use Illuminate\Database\Seeder;
use App\SubTypes;
class SubTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubTypes::create([
            'name'    => "Yemeklik",
            "imageUrl"=>"eeeeeeeeeee",
            "video_thumb"=>"eeeeeeeeeee",
            "video"=>"eeeeeeeeeee",
            "content"=>"eeeeeeeeeee",
            "order"=>"1",
           "kinds_id"=>1
        ]);
        SubTypes::create(
        [
            'name'    => "Parmak Patates ve Cips",
            "imageUrl"=>"eeeeeeeeeee",
            "video_thumb"=>"eeeeeeeeeee",
            "video"=>"eeeeeeeeeee",
            "content"=>"eeeeeeeeeee",
            "order"=>"2",
           "kinds_id"=>2
        ]);
    }
}
