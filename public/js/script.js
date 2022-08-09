$(function(){
    $('.videos .video a').on('click', function(){
        let link = $(this).attr('href');
        $('.modal .modal-dialog .modal-content .modal-body iframe').attr('src',link)
    });

    // $("#contactForm").on("submit", function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         url: '/auth/contact-us',
    //         type:"POST",
    //         data:new FormData(this),
    //         dataType:'JSON',
    //         contentType:false,
    //         cache:false,
    //         processData:false,
    //         success: function(data){
    //             $("#name").text("");
    //             $("#email").text("");
    //             $("#subject").text("");
    //             $("#the_message").text("");
    //             $("#message").css('display','block');
    //             $("#message").text(data.message);
    //         }
    //     });
    // });
});