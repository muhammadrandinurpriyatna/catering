/*
=========================================
|                                       |
|       Multi-Check checkbox            |
|                                       |
=========================================
*/

function checkall(clickchk, relChkbox) {

    var checker = $('#' + clickchk);
    var multichk = $('.' + relChkbox);


    checker.click(function () {
        multichk.prop('checked', $(this).prop('checked'));
    });
}


/*
=========================================
|                                       |
|           MultiCheck                  |
|                                       |
=========================================
*/

/*
    This MultiCheck Function is recommanded for datatable
*/

$('table.datatable').each(function () {
    let ajaxUrl = $(this).data('url');
    let options = {
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 10,
        processing: false,
        serverSide: false,
        ajax: null,
        columns: null,
    }
    if (ajaxUrl) {
        options.processing = true;
        options.serverSide = true;
        options.ajax = ajaxUrl;
        options.columns = [
            {
                "data": "environment"
            },
            {
                "data": "medium"
            },
            {
                "data": "format"
            },
            {
                "data": "size_type"
            },
            {
                "data": "image_path"
            },
            {
                "data": "id"
            }
        ];
    }
    $(this).DataTable(options);
});

function multiCheck(tb_var) {
    tb_var.on("change", ".chk-parent", function () {
        var e = $(this).closest("table").find("td:first-child .child-chk"), a = $(this).is(":checked");
        $(e).each(function () {
            a ? ($(this).prop("checked", !0), $(this).closest("tr").addClass("active")) : ($(this).prop("checked", !1), $(this).closest("tr").removeClass("active"))
        })
    }),
        tb_var.on("change", "tbody tr .new-control", function () {
            $(this).parents("tr").toggleClass("active")
        })
}

var addModal = function (url, title = "", type="html") {
    $('#add-modal-box .modal-body').html(`<br><div class='text-center'><i class="fa fa-circle-o-notch fa-spin"></i></div>`);
    loadUrlTo('#add-modal-box .modal-body', url, type);
    $('#add-modal-box .modal-title').html(title);
    $('#add-modal-box').modal('show');
}

var loadUrlTo = function (tmpTarget, tmpUrl, type) {
    // startPageLoading();

    if (type == 'img') {
        $(tmpTarget).empty().append("<img src='" + tmpUrl + "' class='w-100'/>");
    } else {
        $.ajax({
            type: 'GET',
            cache: false,
            url: tmpUrl,
            dataType: 'HTML',
            success: function (response) {
                // stopPageLoading();
                window.onerror 	= true;
                $(tmpTarget).empty().append(response);
                // handleInit()
            },
            error: function (xhr, status, error) {
                // stopPageLoading();
                $(tmpTarget).empty().append(`<font color='red'>`+xhr.statusText+`</font>`);
            }
        });
    }
}

$('body').on('click', '[data-toggle=popajax]', function (e) {
    e.preventDefault();
    if (e.which != 1) return false;

    let url = $(this).attr('data-url');
    let title = $(this).attr('data-title') ?? '&nbsp;';
    let type = $(this).attr('data-url-type') ?? 'html';

    addModal(url, title, type);
});

$('body').on('click', '[data-toggle=popconfirm]', function (e) {
    e.preventDefault();
    if (e.which != 1) return false;
    var elem = $(this);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        padding: '2em'
    }).then(function (result) {
        if (result.value) {
            window.location = elem.attr('data-url');
        }
    });
});

var formatAllNumber = () => {
    $(".number-input[data-init=false]").each(function () {
        new AutoNumeric($(this)[0],{
            decimalCharacter : '.',
            digitGroupSeparator : ',',
            decimalPlaces: $(this).data('decimal') ? $(this).data('decimal') : 0,
            modifyValueOnWheel : false,
            unformatOnSubmit: true
        });
        $(this).attr('data-init', true);
        $(this).attr('autocomplete', 'off');
    });
    $(".rupiah-input[data-init=false]").each(function () {
        new AutoNumeric($(this)[0],{
            decimalCharacter : '.',
            digitGroupSeparator : ',',
            decimalPlaces: $(this).data('decimal') ? $(this).data('decimal') : 0,
            modifyValueOnWheel : false,
            unformatOnSubmit: true,
            currencySymbol : 'Rp '
        });
        $(this).attr('data-init', true);
        $(this).attr('autocomplete', 'off');
    });
}