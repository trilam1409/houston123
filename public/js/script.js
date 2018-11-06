$(document).ready(function () {
   

    function show(){
        $('.field-group').attr('click-state',0);
    
        $('.field-title').on('click', function () { 
            if($(this).closest('.field-group').attr('click-state') == 0){
                    $(this).closest('.field-group').find('.field-body').addClass('show');
                    $(this).closest('.field-group').attr('click-state',1);
            } else {
                $(this).closest('.field-group').attr('click-state',0);
                $('.field-body > .row').attr('click-state',0).removeClass('show')
                $(this).closest('.field-group').find('.field-body').removeClass('show');
            }
       });
    }

    function collapseItem(){
        $('.field-body > .row').attr('click-state',0);
        $('.field-body > .row').on('click', function(){
            if ($(this).attr('click-state') == 0){
                $(this).attr('click-state',1).addClass('show');
            } else {
                $(this).attr('click-state',0).removeClass('show');
            }
        })
    }

    show();
    collapseItem();
});