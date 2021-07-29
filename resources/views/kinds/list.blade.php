@extends('_layouts.default')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                             Çeşit
                            <small>
                                Listesi
                            </small>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Search Form -->
                <div class="m-form m-form--label-align-right m--margin-bottom-30">
                    <div class="row align-items-center">
                        <div class="col-xl-4 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-10">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input" placeholder="Ara..." id="generalSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span>
                                                <i class="la la-search"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 order-1 order-xl-2 m--align-right top-buttons">
                           
                            <a href="<?php echo env("APP_URL");?>/admin/kinds/add" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="flaticon-plus"></i>
                                    <span>
                                        Yeni Kayıt
                                    </span>
                                </span>
                            </a>
                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                        </div>
                    </div>
                </div>
                <!--end: Search Form -->
                <!--begin: Datatable -->
                <div class="m_datatable"></div>
                <!--end: Datatable -->

            </div>
        </div>
    </div>
</div>
<script>
    var datatable = $('.m_datatable').mDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: '/admin/kinds/json'
                }
            },
            pageSize: 20, // display 20 records per page
            serverPaging: false,
            serverFiltering: false,
            serverSorting: false,
        },

        // layout definition
        layout: {
            theme: 'default',
            class: '',
            scroll: true,
            height: 550,
            footer: false
        },

        // column sorting
        sortable: true,

        // toolbar
        toolbar: {
            // toolbar placement can be at top or bottom or both top and bottom repeated
            placement: ['bottom'],

            // toolbar items
            items: {
                // pagination
                pagination: {
                    // page size select
                    pageSizeSelect: [20, 30, 50] // display dropdown to select pagination size. -1 is used for "ALl" option
                },
            }
        },

        search: {
            input: $('#generalSearch')
        },

        // columns definition
        columns: [{
            field: "id",
            title: "#",
            sortable: false, // disable sort for this column
            width: 20,
            locked: {left: 'xl'},
            selector: {class: 'm-checkbox--solid m-checkbox--brand'}
        },{
            field: "name",
            title: "Tür Adı"
        },{
            field: "Actions",
            width: 250,
            title: "İşlemler",
            locked: {right: 'xl'},
            overflow: 'visible',
            template: function (row, index, datatable) {
                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                return 	'<a href="<?php echo env("APP_URL");?>/admin/kinds/'+row.id+'"class="edit-button m-portlet__nav-link btn m-btn btn-primary m-btn--icon m-btn--icon-only m-btn--pill"><i><i class="la la-share-square"></i></a> '+
                        '<a href="<?php echo env("APP_URL");?>/admin/kinds/edit/'+row.id+'" class="m-portlet__nav-link btn btn-secondary m-btn  m-btn--hover-primary m-btn--icon m-btn--pill" title="Edit details"><span><i class="la la-edit"></i><span>Düzenle</span></span></a> &nbsp; &nbsp;'+
						'<a href="<?php echo env("APP_URL");?>/admin/kinds/delete/'+row.id+'" class="delete-button btn btn btn-danger m-btn m-portlet__nav-link m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-trash"></i></a>';
            }
        }]
    });



    $('#m_datatable_reload').on('click', function () {
        datatable.reload();
    });
    $(document).on("click", "#deleteAll", function(e) {
        e.preventDefault();
        var cbArr = [];
        var selectedRows = datatable.getSelectedRecords();
        var $cbAnswer = $(selectedRows).find(".m-checkbox > [type='checkbox']");
        $cbAnswer.each(function(i) {
            var id = $(this).val();
            cbArr.push(id);
        });
        console.log(cbArr);
    });

</script>
@stop