$(function(){
    $('.videos .video a').on('click', function(){
        let link = $(this).attr('href');
        $('.modal .modal-dialog .modal-content .modal-body iframe').attr('src',link)
    });
})