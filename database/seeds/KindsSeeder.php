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
        'imageUrl'    => "asdfghgfd",
        'order'   => "1",
    ]);
    Kinds::create(
    [
        'name'    => "Parmak Patates ve Cips",
        'imageUrl'    => "asdfgff",
        'order'   => "2",
    ]);
    }
}
