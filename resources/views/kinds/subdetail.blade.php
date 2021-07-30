@extends('_layouts.default')
@section('content')
    <?php
    if(isset($result["id"])) {
        $title = "Ürün Düzenle";
        $startDate = date("Y.m.d H:i", strtotime(@$result["startdate"]));
        $endDate = date("Y.m.d H:i", strtotime(@$result["enddate"]));
        $images = $result['images'];
    } else {
        $title = "Ürün Ekle";
        $startDate = date("Y.m.d H:i");
        $endDate = date("Y.m.d H:i");

        $images = [];
    }
    ?>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="m-content">
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <i class=""></i> {{$title}}
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right" action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="m-portlet__body">
                        <pre><?php //var_dump($groups);?></pre>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                İsim
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="name" value="{{@$result['name']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Başlık
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                            Açıklama
                            </label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="m-input-icon m-input-icon--left ">
                                <textarea name="content" rows="6" class="form-control col-md-12 ckeditor"><?php echo @$result["content"]?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                            Dormansi Süreci
                            </label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="m-input-icon m-input-icon--left ">
                                <textarea name="dormancy_process" rows="6" class="form-control col-md-12 ckeditor"><?php echo @$result["dormancy_process"]?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                            Dikim Önerileri
                            </label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="m-input-icon m-input-icon--left ">
                                <textarea name="planting_suggestions" rows="6" class="form-control col-md-12 ckeditor"><?php echo @$result["planting_suggestions"]?></textarea>
                                </div>
                            </div>

                        </div>
                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                 Sırası
                            </label>
                            <div class="col-md-4">
                                <div>
                                    <input type="text" name="order" value="{{@$result['order']}}" class="form-control m-input" placeholder="Sırası">
                                </div>
                            </div>
                        </div>


                    
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">  Resim </label>
                            <div class="col-md-10 row">
                                <div id="single" class="gallery">
                                    <div class="listItems">
                                        <div class="col-md-3">
                                            <div class="image-box">
                                                <img class="image-back" src="{{@$result['imageUrl']}}">
                                                <a href="#" class="select-image">Resmi Değiştir</a>
                                                <input class="image-input d-none" accept="image/*" type="file"/>
                                                <input type="hidden" value="{{@$result['imageUrl']}}" name="imageUrl" class="targetInput">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <div class="form-group m-form__group row">
                        <label for="upload_file" class="control-label col-md-2">
                            Ürün Fişi
                        </label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" name="product_receipt" id="upload_file">
                            <p>Ürün Fişini indirmek için<a href="{{@$result['product_receipt']}}"> tıklayınız.</a></p> 
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label for="upload_file" class="control-label col-md-2">
                        Video
                        </label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" name="video" id="upload_file">
                        </div>
                    </div>
                    @if(@$result['video'] and @$result["video_thumb"] )         
                    <div class="form-group m-form__group row">
                        <label for="example-url-input" class="col-md-2 col-form-label">
                            Video Önizleme
                        </label>
                        
                        <div class="col-md-8">
                            
                            <video id="video" width="400px" style="max-width:100%;" poster="<?php echo @$result["video_thumb"];?>" preload="none" controls playsinline webkit-playsinline>
                                <source src="{{asset(@$result["video"])}}" type="video/mp4">
                            </video>
                        </div>
                    </div>      
                    @endif

                
                
                        <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    <i class=""></i> Ürünün Karakteristik Özellikleri
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Kullanım
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="use" value="{{@$result['use']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Et Rengi
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="tuber_color" value="{{@$result['tuber_color']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Kabuk
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="tuber_shell" value="{{@$result['tuber_shell']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Kuru Madde Oranı
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="dry_matter_ratio" value="{{@$result['dry_matter_ratio']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Özelliği
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="bump_feature" value="{{@$result['bump_feature']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Göz Rengi
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="eye_depth" value="{{@$result['eye_depth']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Boyutu
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="bump_size" value="{{@$result['bump_size']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                               Verimlilik
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="productivity" value="{{@$result['productivity']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>




                        
                    <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    <i class=""></i> Bitki Özelliği
                                </h3>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                              olgunluk Dönemi
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="maturity_period" value="{{@$result['maturity_period']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                    </div>
                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Çiçeklenme Aralığı
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="flowering_ınterval" value="{{@$result['flowering_ınterval']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                    </div>
                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Çiçek Rengi
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="flower_color" value="{{@$result['flower_color']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-md-2">
                            Yeşil Akşam Yoğunluğu
                        </label>
                        <div class="col-md-10">
                            <div class="m-input-icon m-input-icon--left ">
                                <input type="text" name="green_evening_ıntensity" value="{{@$result['green_evening_ıntensity']}}" class="form-control m-input" placeholder="Başlık">
                            
                            </div>
                        </div>
                </div>



                    <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    <i class=""></i>Hastalıklara Duyarlılık
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                               Geç Yanıklığı
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="late_blight" value="{{@$result['late_blight']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Kuru Çürülüğü
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="dry_rot" value="{{@$result['dry_rot']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yn-Virüsü
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="yn_virus" value="{{@$result['yn_virus']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                               Yntn virüsü
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="yntn_virus" value="{{@$result['yntn_virus']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Virüs X
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="virüs_x" value="{{@$result['virüs_x']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                <Table>
                                    Tütün Halka virüsü
                                </Table>
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="tobacco_ring_virus" value="{{@$result['tobacco_ring_virus']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Altın Kist Nematodu
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="golden_cyst_nematode" value="{{@$result['golden_cyst_nematode']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                R01 ve R04
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="ro1_and_ro4" value="{{@$result['ro1_and_ro4']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                               Beyaz Nematod
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="white_nematode" value="{{@$result['white_nematode']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>




                 </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-12 ml-lg-auto">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg pull-right">
                                        Kaydet
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <script src="{{asset("/js/imageUpload.js")}}" type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    jQuery(document).ready(function () {
        imageUpload("#multi","slides_tr[][url]");
        imageUpload("#multi_en","slides_en[][url]");
    });
    jQuery(document).ready(function () {
        imageUpload("#single","admin_logo");
    });
</script>
@stop