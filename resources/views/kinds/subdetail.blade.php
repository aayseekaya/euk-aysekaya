@extends('_layouts.default')
@section('content')
    <?php
    if(isset($result["id"])) {
        $title = "Çeşit Düzenle";
        $startDate = date("Y.m.d H:i", strtotime(@$result["startdate"]));
        $endDate = date("Y.m.d H:i", strtotime(@$result["enddate"]));
        $images = $result['images'];
    } else {
        $title = "Çeşit Ekle";
        $startDate = date("Y.m.d H:i");
        $endDate = date("Y.m.d H:i");

        $images = [];
    }
    ?>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

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
                                <textarea name="content" rows="6" placeholder="Açıklama" class="form-control col-md-12 ckeditor"><?php echo @$result["content"]?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                            Açıklama
                            </label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="m-input-icon m-input-icon--left ">
                                <textarea name="dormancy_process" rows="6" placeholder="Açıklama" class="form-control col-md-12 ckeditor"><?php echo @$result["dormancy_process"]?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                            Açıklama
                            </label>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="m-input-icon m-input-icon--left ">
                                <textarea name="planting_suggestions" rows="6" placeholder="Açıklama" class="form-control col-md-12 ckeditor"><?php echo @$result["planting_suggestions"]?></textarea>
                                </div>
                            </div>

                        </div>
                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Anket Sırası
                            </label>
                            <div class="col-md-4">
                                <div>
                                    <input type="text" name="order" value="{{@$result['order']}}" class="form-control m-input" placeholder="Anket Adı">
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
                            <label class="col-form-label col-md-2">
                                Video Thumb
                            </label>
                            <div class="col-md-10 row">
                                <div id="single" class="gallery">
                                    <div class="listItems">
                                        <div class="col-md-3">
                                            <div class="image-box">
                                                        <img class="image-back" src="{{@$result['video_thumb']}}">
                                                        <a href="#" class="select-image">Görsel Değiştir</a>
                                                        <input class="image-input d-none" accept="image/*" type="file"/>
                                                        <input type="hidden" value="{{@$result['video_thumb']}}" name="video_thumb" class="targetInput">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Video
                            </label>
                            <div class="col-md-10 row">
                                <div id="single" class="gallery">
                                    <div class="listItems">
                                        <div class="col-md-3">
                                         <div class="image-box">
                                                    <img class="image-back" src="{{@$result['video']}}">
                                                    <a href="#" class="select-image">Video Değiştir</a>
                                                    <input class="image-input d-none" accept="video/*" type="file"/>
                                                    <input type="hidden" value="{{@$result['video']}}" name="video" class="targetInput">
                                                </div>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <?php if(@$result["media_thumb"] != "" && @$result["video"] != "") {?>
                            <div class="form-group m-form__group row">
                                <label for="example-url-input" class="col-md-2 col-form-label">
                                    Video Önizleme
                                </label>
                                <div class="col-md-8">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="video" width="400px" class="embed-responsive-item" style="max-width:100%;" poster="{!! @$result["media_thumb"] !!}" preload="none" controls playsinline webkit-playsinline
                                               preload="auto" controlsList="nodownload noremoteplayback">
                                            <source src="{{asset(@$result["video"])}}" type="video/mp4" codecs="avc1.4D401E, mp4a.40.2">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

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
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Kabuk
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Kuru Madde Oranı
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Özelliği
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Göz Rengi
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Boyutu
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                               Verimlilik
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
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
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                    </div>
                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Kabuk
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                    </div>
                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Kuru Madde Oranı
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
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
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Kabuk
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Kuru Madde Oranı
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Özelliği
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Göz Rengi
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Yumru Boyutu
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                               Verimlilik
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="title" value="{{@$result['title']}}" class="form-control m-input" placeholder="Başlık">
                                
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