$(document).ready(function(){
//---Menu method -------------
    $('.sidenav').sidenav();

//--HIDDENS-------------

$(".next").on("click", function(){

    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var telefono = $("#telefono").val();
    var email = $("#email").val();
    var compania = $("#compania").val();

    if (nombre !="" && apellido !="" && telefono !="" && email !="" && compania !="") {
            $("#consumer_information").hide();
            $("#card_information").show();
            //$(".breadcrumb").find("span").replaceWith("<span id='active'>Costumer Information</span>")
            $(".breadcrumb").find(".Noactive").replaceWith('<a class="Noactive" style="background:#9EEB62">Payment Method</a>');
    }

})
$(".pay").on("click", function () {
    var tarjeta = $("#tarjeta").val();
    var exprTarjeta = /^[0-9]{16}$/;
    if (tarjeta == "" || !exprTarjeta.test(tarjeta)) {
        return false;
    }
})

$(".btn-flat").on("click", function(){
    $("#card_information").hide();
    $("#consumer_information").show();
    //$(".breadcrumb").find("#active").replaceWith("<a class='breadcrumb'><span id='active'>Costumer Information</span></a><a class='breadcrumb'><span>Pay Method</span></a>")
    $(".breadcrumb").find(".Noactive").replaceWith('<a class="Noactive" style="background:white">Payment Method</a>');
})

$("#calculate").on("click", function(){
    var n_productos=0, total=0, precioMax=70, precioMed=60, precioMin=50;
    n_productos = $('#n_productos').val();

    if (n_productos <= 10) {
        total = n_productos*precioMax;
        $("#info_productos").find("span").replaceWith("<span>70</span>")
        $("#detail").find("#calculateTotal").replaceWith(`<h4 class="flow-text" id="calculateTotal">${total} USD</h4>`)
        console.log(total);  
    } else if (n_productos <= 20) {
        total = n_productos*precioMed;
        $("#info_productos").find("span").replaceWith("<span>60</span>");
        $("#detail").find("#calculateTotal").replaceWith(`<h4 class="flow-text" id="calculateTotal">${total} USD</h4>`)
        console.log(total); 
    } else if (n_productos >= 21) {
        total = n_productos*precioMin;
        $("#info_productos").find("span").replaceWith("<span>50</span>")
        $("#detail").find("#calculateTotal").replaceWith(`<h4 class="flow-text" id="calculateTotal">${total} USD</h4>`)
        console.log(total); 
    }
})

});