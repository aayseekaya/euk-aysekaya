<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8" />
    <title>
        SmartEvent Admin
    </title>
    <meta name="description" content="Api events examples">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--begin::Base Styles -->
    <link href="{{asset("/css/vendors.bundle.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("/css/style.bundle.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("/css/custom.css")}}" rel="stylesheet" type="text/css" />
</head>
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url({{asset("/images/loginbg.jpg")}});">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="{{asset("/images/ar_logo.png")}}" style="height:165px;">
                    </a>
                </div>
                <div class="m-login__signin">
                    <form class="m-login__form m-form" action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group m-form__group">
                            <input class="form-control m-input"   type="text" placeholder="Kullanıcı Adınız.." name="email" autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Şifreniz.." name="password">
                        </div>


                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit" class="btn btn-secondary m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                Giris Yap
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Page -->
<!--begin::Base Scripts -->
<script src="{{asset("/js/vendors.bundle.js")}}" type="text/javascript"></script>
<script src="{{asset("/js/scripts.bundle.js")}}" type="text/javascript"></script>
<!--end::Base Scripts -->
<script>
$(document).ready(function() {
        <?php if(isset($_SESSION["message"])) {
        echo 'swal({position:"top-right",type:"'.$_SESSION["message"]["type"].'",title:"'.$_SESSION["message"]["title"].'",text:"'.$_SESSION["message"]["content"].'",showConfirmButton:!1,timer:2500});';
        unset($_SESSION["message"]);
    } ?>
});
</script>
</body>

</html>
