function open() {
    $('.Menu_nav').addClass('open');
}

function close() {
    $('.Menu_nav').removeClass('open');
}

$(function() {
    $('.js-open').click(function(e) {
        e.stopPropagation();
        console.log('open')
        open();
    });

    $('.js-close').click(function(e) {
        e.stopPropagation();
        close();
    });
})