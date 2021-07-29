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
                                Başlık
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left ">
                                    <input type="text" name="name" value="{{@$result['name']}}" class="form-control m-input" placeholder="Başlık">
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Açıklama
                            </label>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                                <div class="m-input-icon m-input-icon--left ">
                                    <textarea name="description" rows="6" placeholder="Açıklama" class="form-control col-md-12"><?php echo @$result["description"]?></textarea>
                                    
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
    });
    jQuery(document).ready(function () {
        imageUpload("#single","admin_logo");
    });
</script>
@stop