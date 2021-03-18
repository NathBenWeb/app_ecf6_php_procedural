$(document).ready(function(){
    $("[type='search']").focus(function(){
        $(this).attr("class", "form-control text-center");
    });
    $("[type='search']").blur(function(){
        $(this).attr("class", "form-control offset-9 col-3 text-center");
    });
});