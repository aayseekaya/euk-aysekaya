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
            "name"=>"Anuscka",
            "title"=>"FONTANE pazarlanabilir yüksek verimli, orta geççi, parmak patates ve cipse uygun bir çeşittir.",
            "imageUrl"=>"http://127.0.0.1:8000/images/366843200991.png",
            "product_receipt"=>"http://127.0.0.1:8000/images/814657635990.pdf",
            "video_thumb"=>"http://127.0.0.1:8000/images/65028677683.jpg",
            "video"=>"http://127.0.0.1:8000/images/810107092039.mp4",
            "content"=>"Düşük şeker içeriğiyle iyi işleme kalitesine sahiptir.
            Kuru madde oranı yüksek ve tüm toprak yapılarında yetişme özelliğine sahiptir.
            Yumrular uzun oval homojen dağılımlı yumru sayısı ve verimi yüksek bir çeşittir.",
            "use"=>" Pazarlanabilir, yüksek verimli, parmak patates için uygun",
            "tuber_color"=>"Açık sarı",
            "tuber_shell"=>"Sarı",
            "dry_matter_ratio"=>"Oldukça",
            "bump_feature"=>"Uzun oval yumrular",
            "eye_depth"=>"Siğ",
            "bump_size"=>"Oval",
            "productivity"=>"Çok yüksek pazarlanabilir verim",
            "maturity_period"=>"Pazarlanabilir, yüksek verimli, parmak patates için uygun",
            "flowering_ınterval"=>"Açık sarı",
            "flower_color"=>"Sarı",
            "green_evening_ıntensity"=>"Oldukça",

            "late_blight"=>"Yumrular orta seviyede, Yeşil Aksam hassastır.",
            "dry_rot"=>"Oldukça dayanıklıdır.",
            "yn_virus"=>"Biraz Hassas",
            "yntn_virus"=>"oldukça Dayanıklı",
            "virüs_x"=>"Dayanıklı",
            "tobacco_ring_virus"=>"Dayanıklı",
            "golden_cyst_nematode"=>"Dayanıklı",
            "ro1_and_ro4"=>"Dayanıklı",
            "white_nematode"=>"Hassas",
            "dormancy_process"=>"FONTANE patates tohumu, 7oC ’de uzun süre patates depolama özelliğine sahiptir.",
            "planting_suggestions"=>"Sertifikalı patates tohumu kullanılmalı,
            Patates tohumları kesilmemeli,
            Tohum boyu 35-45 mm için sıra üzeri 14-25 cm,
            Tohum boyu 45-55 mm için sıra üzeri 17-18 cm,
            Tohum boyu 55-60 mm için sıra üzeri 18-23 cm,
            Dikim esnasında alet ekipmanı dezenfekte edilmeli,
            Patates tohumu ilaçlaması yapılmalı,
            Münavebe göz önünde bulundurulmalı",
            "order"=>"1",
            "kinds_id"=>1

        ]);
        SubTypes::create(
        [
            "name"=>"Fantone",
            "title"=>"FONTANE pazarlanabilir yüksek verimli, orta geççi, parmak patates ve cipse uygun bir çeşittir.",
            "imageUrl"=>"http://127.0.0.1:8000/images/366843200991.png",
            "product_receipt"=>"http://127.0.0.1:8000/images/814657635990.pdf",
            "video_thumb"=>"http://127.0.0.1:8000/images/65028677683.jpg",
            "video"=>"http://127.0.0.1:8000/images/810107092039.mp4",
            "content"=>"Düşük şeker içeriğiyle iyi işleme kalitesine sahiptir.
            Kuru madde oranı yüksek ve tüm toprak yapılarında yetişme özelliğine sahiptir.
            Yumrular uzun oval homojen dağılımlı yumru sayısı ve verimi yüksek bir çeşittir.",
            "use"=>" Pazarlanabilir, yüksek verimli, parmak patates için uygun",
            "tuber_color"=>"Açık sarı",
            "tuber_shell"=>"Sarı",
            "dry_matter_ratio"=>"Oldukça",
            "bump_feature"=>"Uzun oval yumrular",
            "eye_depth"=>"Siğ",
            "bump_size"=>"Oval",
            "productivity"=>"Çok yüksek pazarlanabilir verim",
            "maturity_period"=>"Pazarlanabilir, yüksek verimli, parmak patates için uygun",
            "flowering_ınterval"=>"çık sarı",
            "flower_color"=>"Sarı",
            "green_evening_ıntensity"=>"Oldukça",

            "late_blight"=>"Yumrular orta seviyede, Yeşil Aksam hassastır.",
            "dry_rot"=>"Oldukça dayanıklıdır.",
            "yn_virus"=>"Biraz Hassas",
            "yntn_virus"=>"oldukça Dayanıklı",
            "virüs_x"=>"Dayanıklı",
            "tobacco_ring_virus"=>"Dayanıklı",
            "golden_cyst_nematode"=>"Dayanıklı",
            "ro1_and_ro4"=>"Dayanıklı",
            "white_nematode"=>"Hassas",
            "dormancy_process"=>"FONTANE patates tohumu, 7oC ’de uzun süre patates depolama özelliğine sahiptir.",
            "planting_suggestions"=>"Sertifikalı patates tohumu kullanılmalı,
            Patates tohumları kesilmemeli,
            Tohum boyu 35-45 mm için sıra üzeri 14-25 cm,
            Tohum boyu 45-55 mm için sıra üzeri 17-18 cm,
            Tohum boyu 55-60 mm için sıra üzeri 18-23 cm,
            Dikim esnasında alet ekipmanı dezenfekte edilmeli,
            Patates tohumu ilaçlaması yapılmalı,
            Münavebe göz önünde bulundurulmalı",
            "order"=>"2",
            "kinds_id"=>2
        ]);
    }
}
