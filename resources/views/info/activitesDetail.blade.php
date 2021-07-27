@extends('_layouts.default')
@section('content')
    <?php
    if(isset($result["item"]["id"])) {
        $title = "Aktivite Düzenle";
        $date = date("Y.m.d H:i", strtotime(@$result["item"]["date"]));      
    } else {
        $title = "Aktivite Ekle";
        $date = date("Y.m.d H:i");
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
                                Başlık
                            </label>
                            <div class="col-md-10">
                                <div class="m-input-icon m-input-icon--left turkish">
                                    <input type="text" name="name_tr" value="{{@$result['item']['name_tr']}}" class="form-control m-input" placeholder="Başlık">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="lang tr"></i>
                                        </span>
                                    </span>
                                </div>
                                <div class="m-input-icon m-input-icon--left english">
                                    <input type="text" name="name_en" value="{{@$result['item']['name_en']}}" class="form-control m-input" placeholder="Başlık">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="lang en"></i>
                                        </span>
                                    </span>
                                </div>
                                <div class="m-input-icon m-input-icon--left russian">
                                    <input type="text" name="name_ru" value="{{@$result['item']['name_ru']}}" class="form-control m-input" placeholder="Başlık">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="lang ru"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                               Tarihi
                            </label>
                            <div class="col-md-4">
                                <div class='input-group date'>
                                    <input type='text' class="form-control m-input datetimepicker" value="<?php echo $date;?>" name="date" placeholder="Tarih / Saat Seçiniz" />
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o glyphicon-th"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Kota
                            </label>
                            <div class="col-md-4">
                                <input name="quota" value="{{@$result['item']['quota']}}" placeholder="Kota" class="form-control col-md-12" />
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