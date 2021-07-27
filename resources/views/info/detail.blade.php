@extends('_layouts.default')
@section('content')
    <?php
    if(isset($result["item"]["id"])) {
        $title = "Bilgi Düzenle";
        $startDate = date("Y.m.d H:i", strtotime(@$result["item"]["startdate"]));
        $endDate = date("Y.m.d H:i", strtotime(@$result["item"]["enddate"]));
    } else {
        $title = "Bilgi Ekle";
        $startDate = date("Y.m.d H:i");
        $endDate = date("Y.m.d H:i");
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
                        

                        @if(@$result['item']["type"] != "activites")

                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Tipi
                            </label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <select class="form-control m-bootstrap-select m_selectpicker" name="type">
                                    <option value="content" <?php if(@$result['item']['type']=="content") echo "selected";?>>İçerik</option>
                                    <option value="image" <?php if(@$result['item']['type']=="image") echo "selected";?>>Resim</option>
                                    <option value="image-content" <?php if(@$result['item']['type']=="image-content") echo "selected";?>>Resim + İçerik</option>
                                  <!--  <option value="category" <?php if(@$result['item']['type']=="category") echo "selected";?>>Kategori</option>
                                    <option value="map" <?php if(@$result['item']['type']=="map") echo "selected";?>>Harita</option> -->
                                    <option value="slider" <?php if(@$result['item']['type']=="slider") echo "selected";?>>Slider</option>
                                    <option value="activites" <?php if(@$result['item']['type']=="activites") echo "selected";?>>Aktivite</option>
                                    <option value="pdf" <?php if(@$result['item']['type']=="pdf") echo "selected";?>>Pdf</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Format tipi
                            </label>
                            
                            <div class="col-lg-4 col-md-9 col-sm-12">
                            <button type="button" onclick="myFunction1()">Uçuş</button>
                            <button type="button" onclick="myFunction2()">Servis</button>
                            <button type="button" onclick="myFunction3()">Otel</button>
                            <button type="button" onclick="myFunction4()">İst Dışı</button>
                            <button type="button" onclick="myFunction5()">İst İçi</button>
                            <button type="button" onclick="myFunction6()">Uçak Saatleri</button>
                            </div>
                            
                        </div>
                       
                       
                       
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Açıklama
                            </label>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                            <div class=" m-input-icon--left turkish">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span> <i class="lang tr"></i></span>
                                    </span>
                            <textarea id="demo2" name="content_tr"  rows="6" placeholder="Açıklama"
                                      class="ckeditor form-control col-md-12"><?php echo @$result["item"]["content_tr"]?></textarea>
                                     
                            </div>

                                
                                <div class="m-input-icon m-input-icon--left english">
                                    <textarea name="content_en" rows="6" placeholder="Açıklama" class="form-control col-md-12 ckeditor"><?php echo @$result["item"]["content_en"]?></textarea>
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span>
                                                <i class="lang en"></i>
                                            </span>
                                        </span>
                                </div>
                                <div class="m-input-icon m-input-icon--left russian">
                                    <textarea name="content_ru" rows="6" placeholder="Açıklama" class="form-control col-md-12 ckeditor"><?php echo @$result["item"]["content_ru"]?></textarea>
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
                                Resim TR
                            </label>
                            <div class="col-md-10 row">
                                <div id="single" class="gallery">
                                    <div class="listItems">
                                        <div class="col-md-3">
                                            <div class="image-box">
                                                <img class="image-back" src="{{@$result['item']['image_tr']}}">
                                                <a href="#" class="select-image">Resmi Değiştir</a>
                                                <input class="image-input d-none" accept="image/*" type="file"/>
                                                <input type="hidden" value="{{@$result['item']['image_tr']}}" name="image_tr" class="targetInput">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Resim EN
                            </label>
                            <div class="col-md-10 row">
                                <div id="single" class="gallery">
                                    <div class="listItems">
                                        <div class="col-md-3">
                                            <div class="image-box">
                                                <img class="image-back" src="{{@$result['item']['image_en']}}">
                                                <a href="#" class="select-image">Resmi Değiştir</a>
                                                <input class="image-input d-none" accept="image/*" type="file"/>
                                                <input type="hidden" value="{{@$result['item']['image_en']}}" name="image_en" class="targetInput">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="upload_file" class="control-label col-md-2">
                            PDF TR
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" value="{{@$result['item']['pdf_tr']}}" name="pdf_tr" id="upload_file">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="upload_file" class="control-label col-md-2">
                            PDF EN
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" value="{{@$result['item']['pdf_en']}}" name="pdf_en" id="upload_file">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Slider TR
                            </label>
                            <div class="col-md-10">
                                <div id="multi" class="gallery">
                                    <div class="listItems row">
                                            <?php
                                            $images = json_decode(@$result['item']['slides_tr']);
                                            if($images) {
                                            foreach($images as $key => $value)  {?>
                                        <div class="col-md-3">
                                            <div class="image-box">
                                                <img class="image-back" src="{{$value->url}}">
                                                <a href="#" class="close-button m-portlet__nav-link btn m-btn btn-secondary m-btn--icon-only m-btn--icon m-btn--pill"><i class="la la-close"></i></a>
                                                <a href="#" class="select-image">Resmi Değiştir</a>
                                                <input class="image-input d-none" accept="image/*" type="file"/>
                                                <input type="hidden" value="{{$value->url}}" name="slides_tr[][url]" class="targetInput">
                                            </div>
                                        </div>
                                            <?php } }?>

                                    </div>
                                    <div class="col-md-3">
                                            <a href="#" class="add-image-button m-portlet__nav-link btn m-btn btn-primary m-btn--icon m-btn--pill"><i class="la la-plus"></i> Resim Ekle</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-md-2">
                                Slider EN
                            </label>
                            <div class="col-md-10">
                                <div id="multi_en" class="gallery">
                                    <div class="listItems row">
                                        <?php
                                        $images = json_decode(@$result['item']['slides_en']);
                                        if($images) {
                                        foreach($images as $key => $value)  {?>
                                        <div class="col-md-3">
                                            <div class="image-box">
                                                <img class="image-back" src="{{$value->url}}">
                                                <a href="#" class="close-button m-portlet__nav-link btn m-btn btn-secondary m-btn--icon-only m-btn--icon m-btn--pill"><i class="la la-close"></i></a>
                                                <a href="#" class="select-image">Resmi Değiştir</a>
                                                <input class="image-input d-none" accept="image/*" type="file"/>
                                                <input type="hidden" value="{{$value->url}}" name="slides_en[][url]" class="targetInput">
                                            </div>
                                        </div>
                                        <?php } }?>

                                    </div>
                                    <div class="col-md-3">
                                            <a href="#" class="add-image-button m-portlet__nav-link btn m-btn btn-primary m-btn--icon m-btn--pill"><i class="la la-plus"></i> Resim Ekle</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif

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
    
    function myFunction1() {
        CKEDITOR.instances['demo2'].insertHtml('<p style="text-align: center;">&nbsp;</p><p style="text-align: center;">&nbsp;</p><table style="overflow-x: auto; margin-left: auto; margin-right: auto;">'+
        '<tbody><tr><td style="width: 448.8px; text-align: center; background-color: #000000;" colspan="4"><strong><span style="color: #ffffff;">SAMSUN - İSTANBUL</span></strong></td>'+
        '</tr><tr><td style="width: 448.8px; text-align: center; background-color: #ffffff;" colspan="4"><span style="color: #000000; background-color: #ffffff;">15 MART 2019 CUMA</span></td>'+
        '</tr><tr><td style="width: 113.6px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Havayolu</span></td>'+
        '<td style="width: 104px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Nereden</span></td>'+
        '<td style="width: 108px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Nereye</span></td>'+
        '<td style="width: 106.4px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Kalkış</span></td>'+
        '</tr><tr><td style="width: 113.6px; text-align: center;">ANADOLUJET</td><td style="width: 104px; text-align: center;">SFZ</td><td style="width: 108px; text-align: center;">SAW</td><td style="width: 106.4px; text-align: center;">21:05</td>'+
        '</tr><tr><td style="height: 50px; background-color: #ffffff;" colspan="4">&nbsp;</td></tr><tr><td style="width: 448.8px; text-align: center; background-color: #000000;" colspan="4"><strong><span style="color: #ffffff;">&nbsp;İSTANBUL - SAMSUN&nbsp;</span></strong></td>'+
        '</tr><tr><td style="width: 448.8px; text-align: center; background-color: #ffffff;" colspan="4"><span style="color: #000000; background-color: #ffffff;">15 MART 2019 CUMA</span></td>'+
        '</tr><tr><td style="width: 113.6px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Havayolu</span></td>'+
        '<td style="width: 104px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Nereden</span></td>'+
        '<td style="width: 108px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Nereye</span></td><td style="width: 106.4px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Kalkış</span></td>'+
        '</tr><tr><td style="width: 113.6px; text-align: center;">PEGASUS</td><td style="width: 104px; text-align: center;">SAW</td><td style="width: 108px; text-align: center;">SZF</td><td style="width: 106.4px; text-align: center;">12:20</td></tr>'+
        '</tbody></table>');
    }
    function myFunction2() {
        CKEDITOR.instances['demo2'].insertHtml('<p style="text-align: center;"><span style="color: #ffffff;"><strong>Otel - Havalimanı Servis Kalkış&nbsp;</strong></span></p><table style="overflow-x: auto; margin-left: auto; margin-right: auto;">'+
        '<tbody><tr><td style="height: 15pt; text-align: center; vertical-align: middle; white-space: nowrap; width: 269px;" colspan="2"><strong>GAZİANTEP</strong></td></tr><tr>'+
        '<td style="background-color: #000000; height: 15pt; text-align: center; vertical-align: middle; white-space: nowrap; width: 269px;" colspan="2"><span style="color: #ffffff;"><strong>16 Kasım Cuma</strong></span></td>'+
        '</tr><tr><td style="height: 15pt; text-align: center; vertical-align: middle; white-space: normal; width: 269px;" colspan="2">Gaziantep-İstanbul Sabiha G&ouml;k&ccedil;en</td>'+
        '</tr><tr><td style="height: 15pt; text-align: center; vertical-align: middle; white-space: normal; width: 269px;" colspan="2">Pegasus</td>'+
        '</tr><tr><td style="height: 15pt; text-align: center; vertical-align: middle; white-space: normal; width: 269px;" colspan="2">PNR: MCMKP2</td>'+
        '</tr><tr><td style="width: 224.4px; background-color: #ffffff; text-align: left;"><span style="background-color: #ffffff; color: #000000;"><strong>Kalkış Saati</strong></span></td>'+
        '<td style="width: 224.4px; background-color: #ffffff; text-align: left;"><span style="background-color: #ffffff; color: #000000;"><strong>Varış Saati</strong></span></td>'+
        '</tr><tr><td style="width: 224.4px; background-color: #ffffff; text-align: left;"><span style="background-color: #ffffff; color: #000000;">21:30</span></td>'+
        '<td style="width: 224.4px; background-color: #ffffff; text-align: left;"><span style="background-color: #ffffff; color: #000000;">23:10</span></td></tr><tr>'+
        '<td style="background-color: #999999; height: 15pt; text-align: center; vertical-align: middle; white-space: nowrap; width: 269px;" colspan="2"><span style="color: #ffffff;"><strong>Havalimanı-Otel&nbsp; Servis Kalkış&nbsp;</strong></span></td>'+
        '</tr><tr><td style="height: 15.75pt; text-align: center; vertical-align: middle; white-space: nowrap; width: 269px;" colspan="2">00.10</td>'+
        '</tr><tr><td style="background-color: #000000; height: 15pt; text-align: center; vertical-align: middle; white-space: nowrap; width: 269px;" colspan="2"><span style="color: #ffffff;"><strong>18 Kasım Pazar</strong></span></td>'+
        '</tr><tr><td style="height: 15pt; text-align: center; vertical-align: middle; white-space: normal; width: 269px;" colspan="2">İstanbul Sabiha G&ouml;k&ccedil;en-Gaziantep</td>'+
        '</tr><tr><td style="height: 15pt; text-align: center; vertical-align: middle; white-space: normal; width: 269px;" colspan="2">Pegasus</td>'+
        '</tr><tr><td style="height: 15pt; text-align: center; vertical-align: middle; white-space: normal; width: 269px;" colspan="2">PNR: MCMKP2</td>'+
        '</tr><tr><td style="width: 224.4px; background-color: #ffffff; text-align: left;"><span style="background-color: #ffffff; color: #000000;"><strong>Kalkış Saati</strong></span></td>'+
        '<td style="width: 224.4px; background-color: #ffffff; text-align: left;"><span style="background-color: #ffffff; color: #000000;"><strong>Varış Saati</strong></span></td>'+
        '</tr><tr><td style="width: 224.4px; background-color: #ffffff; text-align: left;"><span style="background-color: #ffffff; color: #000000;">16:45</span></td>'+
        '<td style="width: 224.4px; background-color: #ffffff; text-align: left;"><span style="background-color: #ffffff; color: #000000;">18:20</span></td></tr><tr>'+
        '<td style="background-color: #999999; height: 15pt; text-align: center; vertical-align: middle; white-space: nowrap; width: 269px;" colspan="2"><span style="color: #ffffff;"><strong>Havalimanı-Otel&nbsp; Servis Kalkış&nbsp;</strong></span></td>'+
        '</tr><tr><td style="height: 15.75pt; text-align: center; vertical-align: middle; white-space: nowrap; width: 269px;" colspan="2">14.05</td></tr><tr><td style="height: 15pt; vertical-align: middle; white-space: nowrap; width: 269px; text-align: center;" colspan="2">Servis Sorumlusu</td>'+
        '</tr><tr><td style="height: 15.75pt; text-align: center; vertical-align: middle; white-space: nowrap; width: 269px;" colspan="2">İbrahim &Ouml;n&uuml;l</td>'+
        '</tr><tr><td style="height: 15.75pt; text-align: center; vertical-align: middle; white-space: nowrap; width: 269px;" colspan="2">0 542 381 97 66</td></tr></tbody></table>');
        
    }
    function myFunction3() {
        CKEDITOR.instances['demo2'].insertHtml('<p style="text-align: center;">&nbsp;</p><table style="overflow-x: auto; margin-left: auto; margin-right: auto;"><tbody><tr>'+
'<td style="background-color: #000000; text-align: center; width: 367.5px;"><span style="color: #ffffff;"><strong>17 Kasım 2018</strong></span></td>'+
'</tr><tr><td style="text-align: center; width: 367.5px;">Kayaşehir - Altınşehir - Yarımburgaz Cad. - Atakent - G&uuml;neşpark - Tem - İstanbul Hilton Bomonti Otel</td>'+
'</tr><tr><td style="background-color: #999999; text-align: center; width: 367.5px;"><span style="color: #ffffff;"><strong>Otele Geliş Hareket Saati</strong></span></td></tr><tr><td style="width: 367.5px; text-align: center;">&nbsp;11.45</td>'+
'</tr><tr><td style="background-color: #999999; text-align: center; width: 367.5px;"><span style="color: #ffffff;"><strong>Otelden D&ouml;n&uuml;ş Hareket Saatleri</strong></span></td>'+
'</tr><tr><td style="text-align: center; width: 367.5px;">00.00</td></tr><tr><td style="background-color: #999999; text-align: center;"><span style="color: #ffffff;"><strong>Otele geliş ve 00.00 Aracı S&uuml;r&uuml;c&uuml; İletişim Bilgileri</strong></span></td></tr>'+
'<tr><td style="text-align: center;">Mahir Porsuk</td></tr><tr><td style="text-align: center; width: 367.5px;"><a href="tel://+905358788459">0535 878 84 59&nbsp;</a></td>'+
'</tr><tr><td style="text-align: center;">34 LAT 756</td></tr><tr><td style="background-color: #999999; text-align: center;"><span style="color: #ffffff;"><strong>&nbsp;Otelden D&ouml;n&uuml;ş Hareket Saati</strong></span></td>'+
'</tr><tr><td style="text-align: center;">&nbsp;01.15</td></tr><tr><td style="background-color: #999999; text-align: center; width: 367.5px;"><span style="color: #ffffff;"><strong>01. 15 Aracı S&uuml;r&uuml;c&uuml; İletişim Bilgileri</strong></span></td>'+
'</tr><tr><td style="text-align: center; width: 367.5px;">Recep G&uuml;ler</td></tr><tr><td style="text-align: center; width: 367.5px;"><a href="tel://+905353658463">0535 365 84 63</a></td>'+
'</tr><tr><td style="width: 367.5px; text-align: center;">&nbsp;34 LAT 756</td></tr></tbody></table><p style="text-align: center;">&nbsp;</p><p style="text-align: center;">&nbsp;</p>');
    }
    function myFunction4() {
            CKEDITOR.instances['demo2'].insertHtml('<p style="text-align: center;">&nbsp;</p><table style="overflow-x: auto; margin-left: auto; margin-right: auto;">'+
            '<tbody><tr><td style="width: 448.8px; text-align: center; background-color: #000000;" colspan="3"><span style="color: #ffffff; background-color: #000000;"><strong>GİDİŞ</strong></span></td>'+
            '</tr><tr><td style="width: 448.8px; text-align: center;" colspan="3"><span style="color: #000000;">15 MART 2019 CUMA</span></td>'+
            '</tr><tr><td style="width: 224.4px; padding-left: 5px; background-color: #999999;" colspan="2"><span style="background-color: #999999; color: #ffffff;">Kalkış Yeri</span></td>'+
            '<td style="width: 224.4px; padding-left: 5px; background-color: #999999;" colspan="2"><span style="background-color: #999999; color: #ffffff;">Kalkış Saati</span></td>'+
            '</tr><tr><td style="width: 200.8px; text-align: left;" colspan="2">ADAPAZARI ŞUBE &Ouml;N&Uuml;</td><td style="width: 104px; text-align: left;" colspan="1">19:30</td>'+
            '</tr><tr><td style="width: 110.6px; text-align: left;" colspan="2">İZMİT ŞUBE &Ouml;N&Uuml;</td><td style="width: 104px; text-align: left;" colspan="1">20:15</td></tr>'+
            '<tr><td style="width: 110.6px; text-align: left;" colspan="2">GEBZE ŞUBE &Ouml;N&Uuml;</td><td style="width: 104px; text-align: left;" colspan="1">20:30</td></tr><tr><td style="height: 50px; background-color: #ffffff;" colspan="3">&nbsp;</td></tr><tr>'+
            '<td style="width: 448.8px; text-align: center; background-color: #000000;" colspan="3"><span style="color: #ffffff; background-color: #000000;"><strong>D&Ouml;N&Uuml;Ş</strong></span></td>'+
            '</tr><tr><td style="width: 448.8px; text-align: center; background-color: #ffffff;" colspan="3"><span style="color: #000000; background-color: #ffffff;">15 MART 2019 CUMA</span></td>'+
            '</tr><tr><td style="width: 448.8px; text-align: center; background-color: #999999;" colspan="3"><span style="color: #ffffff; background-color: #999999;">Kalkış Saati</span></td>'+
            '</tr><tr><td style="width: 448.8px; text-align: center; background-color: #ffffff;" colspan="3"><span style="color: #000000; background-color: #ffffff;">11.30</span></td>'+
            '</tr><tr><td style="width: 149.6px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">S&uuml;r&uuml;c&uuml;</span></td>'+
            '<td style="width: 149.6px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Ara&ccedil; Plaka</span></td>'+
            '<td style="width: 149.6px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">S&uuml;r&uuml;c&uuml; İletişim</span></td>'+
            '</tr><tr><td style="width: 149.6px; text-align: center;">CEMİL KARA</td><td style="width: 149.6px; text-align: center;">34 GM 337</td><td style="width: 149.6px; text-align: center;">0538 768 1619</td></tr></tbody></table>');
    }
    function myFunction5() {
            CKEDITOR.instances['demo2'].insertHtml('<table style="margin-left: auto; margin-right: auto; width: 358px;"><tbody><tr><td style="text-align: center; width: 346px;" colspan="2"><strong>KADIK&Ouml;Y</strong></td></tr><tr>'+
            '<td style="text-align: center; width: 346px;" colspan="2">KADIK&Ouml;Y KAYMAKAMLIĞI-ALBAY FAİK S&Ouml;ZDENER CAD- TUĞLACI EMİNBEY CAD- DR ESAT IŞIK CAD-&nbsp; YOĞURT&Ccedil;U PARKI CAD- KUŞDİLİ CAD- PAZAR YOLU SK- ALTUNİZADE K&Ouml;P- E5 HİLTON BOMONTİ</td>'+
            '</tr><tr><td style="background-color: #000000; text-align: center; width: 346px;" colspan="2"><strong><span style="color: #ffffff;">GİDİŞ</span></strong></td>'+
            '</tr><tr><td style="background-color: #999999; width: 176.6px;">Kalkış Saati</td><td style="background-color: #999999; width: 169.4px;">Ara&ccedil; Plaka</td></tr><tr>'+
            '<td style="width: 176.6px;">09:10</td></tr><tr><td style="background-color: #999999; width: 176.6px;">S&uuml;r&uuml;c&uuml;</td><td style="background-color: #999999; width: 169.4px;">S&uuml;r&uuml;c&uuml; İletişim</td></tr>'+
            '<tr><td style="width: 176.6px;">ZEKİ SEFER</td><td style="width: 169.4px;">0535 225 21 82</td></tr><tr><td style="width: 176.6px;">&nbsp;</td><td style="width: 169.4px;">&nbsp;</td></tr>'+
            '<tr><td style="text-align: center; background-color: #000000; width: 346px;" colspan="2"><strong><span style="color: #ffffff;">D&Ouml;N&Uuml;Ş</span></strong></td></tr>'+
            '<tr><td style="background-color: #999999; width: 176.6px;">Kalkış Saati</td><td style="background-color: #999999; width: 169.4px;">Ara&ccedil; Plaka</td></tr>'+
            '<tr><td style="width: 169.4px;">34 LVR 826</td></tr><td style="background-color: #999999; width: 176.6px;">S&uuml;r&uuml;c&uuml;</td><td style="background-color: #999999; width: 169.4px;">S&uuml;r&uuml;c&uuml; İletişim</td></tr>'+
            '<tr><td style="width: 176.6px;">ZEKİ SEFER</td><td style="width: 169.4px;">0535 225 21 82</td></tr></tbody></table>');
    }
    function myFunction6() {
            CKEDITOR.instances['demo2'].insertHtml('<p style="text-align: center;">&nbsp;</p><table style="overflow-x: auto; margin-left: auto; margin-right: auto;"><tbody>'+
            '<tr><td style="width: 448.8px; text-align: center; background-color: #000000;" colspan="4"><strong><span style="color: #fff;">ADANA - İSTANBUL</span></strong></td></tr>'+
            '<tr><td style="width: 448.8px; text-align: center; background-color: #fff;" colspan="4"><span style="color: #000000; background-color: #fff;">15 MART 2019 CUMA</span></td></tr>'+
            '<tr><td style="width: 113.6px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Havayolu</span></td>'+
            '<td style="width: 104px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Nereden</span></td>'+
            '<td style="width: 108px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Nereye</span></td>'+
            '<td style="width: 106.4px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Kalkış</span></td></tr>'+
            '<tr><td style="width: 113.6px; text-align: center;">THY</td><td style="width: 104px; text-align: center;">ADA</td><td style="width: 108px; text-align: center;">IST</td>'+
            '<td style="width: 106.4px; text-align: center;">20:20</td></tr><tr><td style="width: 113.6px; text-align: center;">PEGASUS</td><td style="width: 104px; text-align: center;">ADS</td>'+
            '<td style="width: 108px; text-align: center;">SAW</td><td style="width: 106.4px; text-align: center;">22:15</td></tr><tr>'+
            '<td style="width: 448.8px; text-align: center; background-color: #000000;" colspan="4"><strong><span style="color: #fff;">&nbsp;İSTANBUL - ADANA&nbsp;</span></strong></td>'+
            '</tr><tr><td style="width: 448.8px; text-align: center; background-color: #ffffff;" colspan="4"><span style="color: #000000; background-color: #ffffff;">15 MART 2019 CUMA</span></td>'+
            '</tr><tr><td style="width: 113.6px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Havayolu</span></td>'+
            '<td style="width: 104px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Nereden</span></td>'+
            '<td style="width: 108px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Nereye</span></td>'+
            '<td style="width: 106.4px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Kalkış</span></td>'+
            '</tr><tr><td style="width: 113.6px; text-align: center;">THY</td><td style="width: 104px; text-align: center;">IST</td><td style="width: 108px; text-align: center;">ADA</td><td style="width: 106.4px; text-align: center;">14:20</td>'+
            '</tr><tr><td style="width: 113.6px; text-align: center;">PEGASUS</td><td style="width: 104px; text-align: center;">SAW</td><td style="width: 108px; text-align: center;">ADA</td>'+
            '<td style="width: 106.4px; text-align: center;">13:00</td></tr><tr><td style="width: 448.8px; text-align: center; background-color: #000000;" colspan="4"><strong><span style="color: #fff;">&nbsp;OTEL - HAVALİMANI SERVİS&nbsp;</span></strong></td>'+
            '</tr><tr><td style="width: 448.8px; text-align: center; background-color: #ffffff;" colspan="4"><span style="color: #000000; background-color: #ffffff;">17 MART 2019 PAZAR</span></td>'+
            '</tr><tr><td style="width: 113.6px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Kalkış Saati</span></td>'+
            '<td style="width: 104px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">Ara&ccedil; Plaka</span></td>'+
            '<td style="width: 108px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">S&uuml;r&uuml;c&uuml;</span></td>'+
            '<td style="width: 106.4px; text-align: center; background-color: #999999;"><span style="background-color: #999999; color: #ffffff;">S&uuml;r&uuml;c&uuml; İletişim</span></td>'+
            '</tr><tr><td style="width: 113.6px; text-align: center;">15:00</td><td style="width: 104px; text-align: center;">46 AC 558</td><td style="width: 108px; text-align: center;">Ahmet KAYA</td><td style="width: 106.4px; text-align: center;">05411111111</td></tr></tbody></table>');
                }
</script>
@stop