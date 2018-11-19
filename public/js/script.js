$(document).ready(function () {


    function show() {
        $('.field-group').attr('click-state', 0);
        $('.field-title').on('click', function () {
            if ($(this).closest('.field-group').attr('click-state') == 0) {
                $(this).addClass('show');
                $(this).closest('.field-group').find('.field-body').addClass('show');
                $(this).closest('.field-group').attr('click-state', 1);
            } else {
                $(this).removeClass('show');
                $(this).closest('.field-group').attr('click-state', 0);
                $('.field-body .row').attr('click-state', 0).removeClass('show')
                $(this).closest('.field-group').find('.field-body').removeClass('show');
                $(this).closest('.field-group').find('.views-col-3, .views-col-4, .views-col-5, .views-col-6').removeClass('show');
            }
        });
    }

    function collapseItem() {
        $('.field-body .row').attr('click-state', 0);
        $('.field-body .row .views-col-1').on('click', function () {
            if ($(this).closest('.row').attr('click-state') == 0) {
                $(this).closest('.row').attr('click-state', 1).addClass('show');
                $(this).closest('.row').find('.views-col-3, .views-col-4, .views-col-5, .views-col-6').addClass('show');
            } else {
                $(this).closest('.row').attr('click-state', 0).removeClass('show');
                $(this).closest('.row').find('.views-col-2').removeClass('show');
                $(this).closest('.row').find('.views-col-3, .views-col-4, .views-col-5, .views-col-6').removeClass('show');
            }
        })
    }

    function addStyle() {
        $('.views-col-1 pre').each(function () {
            if ($(this).text() == 'GET') {
                $(this).closest('.row').addClass('get-method');
            } else if ($(this).text() == 'POST') {
                $(this).closest('.row').addClass('post-method');
            } else if ($(this).text() == 'PUT') {
                $(this).closest('.row').addClass('put-method');
            } else if ($(this).text() == 'DELETE') {
                $(this).closest('.row').addClass('delete-method');
            }
        })
    }
    show();
    collapseItem();
    addStyle();
});
