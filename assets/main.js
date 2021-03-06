$(document).ready(function(){

    /* Slide in the debug menu */
    setTimeout(function(){
        $('.usrp-fb-2').addClass('slide-in');
    }, 200);

    /* Bind actions to small buttons click */
    $('.usrp-fb-2 .usrp-fb-btn').on('click', function(){

        /* Collapse the debug menu into a regular button */
        $('.usrp-fb-2').removeClass('is-expanded');
        setTimeout(function(){ $('.usrp-fb-2').addClass('is-collapsed'); }, 300)
    });

    /* Bind actions to small buttons click */
    $('.usrp-fb-2 .usrp-fb-title').on('click', function(){

        /* Expand the debug menu on click button */
        $('.usrp-fb-2').removeClass('is-collaped');
        setTimeout(function(){ $('.usrp-fb-2').addClass('is-expanded'); }, 300)
    });
});