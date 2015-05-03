$(document).scroll(function() {

    var pageHeight = $(document).scrollTop(),
        logoHeight = 140;

    if (pageHeight >= logoHeight) {
        $('.main-navigation').addClass('main-navigation--fixed');
    }
    else {
        $('.main-navigation').removeClass('main-navigation--fixed');
    }
    return false;
});