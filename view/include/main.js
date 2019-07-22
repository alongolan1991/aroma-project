                      
(function($){
    const time = 100;
    $("#category-1").fadeIn(time);
    $("#picture-1").fadeIn(time);

    $('.category-link').on('mouseenter', function(e) {
        const categoryId = $(this).data('category-id');
        $('.category-items').css('display','none');
        $('.category-picture').css('display','none');
        $("#category" + "-" + categoryId).fadeToggle(time);
        $("#picture" + "-" + categoryId).fadeToggle(time);


   })
})($);

