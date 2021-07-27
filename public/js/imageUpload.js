var imageUpload = function (selector, name, url) {

    url = (typeof url !== 'undefined') ?  url : "/admin/general/upload";

    var initSelectImage = function () {
        $(selector +" .select-image").on("click", function (e) {
            e.preventDefault();
            $(this).parent().find(".image-input").click();
        });
        $(selector +" .close-button").on("click", function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });
        $(selector +" .image-input").on("change", function (e) {
            //readURL(this);
            var elementParent = $(this).parent();
            var output = elementParent.find(".image-back");


            $("button.btn-block").addClass("disabled");
            elementParent.find(".select-image").addClass("show-response");
            elementParent.find(".select-image").html("<i class='fa fa-cog fa-spin'></i> Yükleniyor..");

            console.log(e.target.files[0].type);
            if(e.target.files[0].type === "application/pdf") {
                output.attr("src", "/images/pdf.png");
            } else {
                output.attr("src", URL.createObjectURL(e.target.files[0]));
            }

            var formData = new FormData();
            formData.append("files[]", e.target.files[0]);
            formData.append("_token", $('input[name=_token]').val());
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (data) {
                    console.log(data);
                    elementParent.find(".targetInput").val(data);
                    $("button.btn-block").removeClass("disabled");
                    elementParent.find(".select-image").removeClass("show-response");
                    elementParent.find(".select-image").html("Değiştir");
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    }

    $(selector +" .add-image-button").on("click", function (e) {
        e.preventDefault();
        var sampleBox = '<div class="col-md-3">\n' +
            '<div class="image-box">\n' +
            '   <img class="image-back" src="">\n' +
            '   <a href="#" class="close-button m-portlet__nav-link btn m-btn btn-secondary m-btn--icon-only m-btn--icon m-btn--pill"><i class="la la-close"></i></a>\n' +
            '   <a href="#" class="select-image">Resmi Değiştir</a>\n' +
            '   <input class="image-input d-none" accept="image/*" type="file" />\n' +
            '   <input type="text" value="/upload/noimage.png" name="'+name+'" class="targetInput">\n' +
            '</div>\n' +
            '</div>';
        $(selector + " .listItems").append(sampleBox);
        initSelectImage();
        $("#submit-button").prop("disabled", false);
    });
    initSelectImage();
};