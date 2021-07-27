//== Class definition

var FormWidgets = function () {
    //== Private functions
    var validator;

    var initWidgets = function() {
        // datepicker
        $('#m_datepicker').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            },
            autoclose: true,
            format: 'yyyy.mm.dd'
        });
        $('.datepicker').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            },
            autoclose: true,
            //2018-12-26
            format: 'yyyy.mm.dd'
        });
        $('#m_datepicker2').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });
        // datetimepicker
        $('.datetimepicker').datetimepicker({
            pickerPosition: 'bottom-left',
            todayHighlight: true,
            autoclose: true,
            format: 'yyyy.mm.dd hh:ii'
        });

        $('#m_datetimepicker').change(function() {
            validator.element($(this));
        });

        // timepicker
        $('#m_timepicker').timepicker({
            minuteStep: 2,
            showSeconds: true,
            showMeridian: true
        });

        $('.timepicker').timepicker({
            minuteStep: 1,
            showSeconds: false,
            showMeridian: false,
            format: 'hh:ii'
        });
        // daterangepicker
        $('#m_daterangepicker').daterangepicker({
            buttonClasses: 'm-btn btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary'
        }, function(start, end, label) {
            var input = $('#m_daterangepicker').find('.form-control');
            
            input.val( start.format('YYYY/MM/DD') + ' / ' + end.format('YYYY/MM/DD'));
            validator.element(input); // validate element
        });

        // bootstrap switch
        $('[data-switch=true]').bootstrapSwitch();


        // bootstrap select
        $('#m_bootstrap_select').selectpicker();
        $('#m_bootstrap_select').on('changed.bs.select', function() {
            validator.element($(this)); // validate element
        });

        // select2
        $('#m_select2').select2({
            placeholder: "Select a state",
        });
        $('#m_select2').on('select2:change', function(){
            validator.element($(this)); // validate element
        });



        $('#m_typeahead').bind('typeahead:select', function(ev, suggestion) {
            validator.element($('#m_typeahead')); // validate element
        });
    }
    
    var initValidation = function () {
        validator = $( "#m_form_1" ).validate({
            // define validation rules
            rules: {
                date: {
                    required: true,
                    date: true 
                },
                daterange: {
                    required: true
                },
                datetime: {
                    required: true
                },
                time: {
                    required: true
                },

                select: {
                    required: true,
                    minlength: 2,
                    maxlength: 4
                },
                select2: {
                    required: true
                },
                typeahead: {
                    required: true
                },

                switch: {
                    required: true
                },

                markdown: {
                    required: true
                }
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {             
                var alert = $('#m_form_1_msg');
                alert.removeClass('m--hide').show();
                mApp.scrollTo(alert, -200);
            },

            submitHandler: function (form) {
                //form[0].submit(); // submit the form
            }
        });       
    }

    return {
        // public functions
        init: function() {
            initWidgets(); 
            initValidation();
        }
    };
}();

jQuery(document).ready(function() {    
    FormWidgets.init();
});