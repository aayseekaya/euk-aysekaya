<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Kinds;
class KindsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { Kinds::create([
        'name'    => "Yemeklik",
        'description'=>"Yemeklik patates tohumu çeşitlerimizi inceleyiniz.",
        'imageUrl'    => 'http://127.0.0.1:8000/images/672042865206.png',
        'order'   => "1",
    ]);
    Kinds::create(
    [
        'name'    => "Parmak Patates ve Cips",
        'description'=>"Parmak patates ve cips tohumu çeşitlerimizi inceleyiniz.",
        'imageUrl'    => "http://127.0.0.1:8000/images/672042865206.png",
        'order'   => "2",
    ]);
    }
}
