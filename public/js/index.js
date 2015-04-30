/**
 * Created by Welton on 23/02/2015.
 */

$("#botao").click(function(){
    consolo.log("teste");
    $("dropdown-toggle").switchClass("activo");
});


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})


$("input[name=todos]").click(function(){
    //alert($("#post:checked").length);
    if($("#post:checked").length > 0 )
        $("input#post").prop('checked', false);
    else
        $("input#post").prop('checked', true);
});



$(function() {
    $("#tablesorter-imasters").tablesorter();
    });