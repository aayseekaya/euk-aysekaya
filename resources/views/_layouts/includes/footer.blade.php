</div>
<!-- end:: Body -->
</div>
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
    <i class="la la-arrow-up"></i>
</div>
<script src="{{asset("/js/validation/form-widgets.js")}}" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        CKEDITOR.replaceClass = 'ckeditor';
        var BootstrapSelect={init:function(){$(".m_selectpicker").selectpicker()}};jQuery(document).ready(function(){BootstrapSelect.init()});
        <?php

        if(session("message")!="") {
            echo 'swal({position:"top-right",type:"'.session("message")["message_type"].'",title:"'.session("message")["message_text"].'",text:"'.session("message")["message_text"].'",showConfirmButton:!1,timer:2500});';
            session(["message"=>""]);
            //unset(session("message"));
        }
        ?>
        $(document).on('click', 'a.delete-button', function(e) {
            e.preventDefault();
            var url = $(this).attr("href");
            console.log(url);
        swal({title:"Silmek İstediğinize Emin misiniz?",
            text:"Kayıt kalıcı olarak silinecektir!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonText:"Evet, Sil!"
        }).then(function(e){
            if(e.value) {
                window.location.href = url;
            } else {

            }
        });
    });

    });
</script>

<?php
$style = "";
if(session("turkish")) $style .= '.turkish {display: block !important;}';
if(session("english")) $style .= '.english {display: block !important;}';
if(session("russian")) $style .= '.russian {display: block !important;}';
?>
<style><?php echo $style;?></style>


</body>
<!-- end::Body -->
</html>