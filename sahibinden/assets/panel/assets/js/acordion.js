$(document).ready(function() {
    $(".dropdown a").click(function() {
        if($(this).next('ul').is(':visible')) {
            $(this).next('ul').slideUp("slow");
            $(this).css({
                background:'none '
            })
        }else {
            $(".dropdown ul").slideUp("slow");
            $(".dropdown a").css({
                background:'none '
            })
            $(this).next('ul').slideDown("slow");
            $(this).css({
                background:'#1b1b1b'
            })
        }
    })


});