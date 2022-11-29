// preloader js
$(window).load(function(){
    $('.preloader').delay(250).fadeOut("slow");
});

function mostraLoader(){
    $('.preloader').delay(250).fadeIn("slow");
}