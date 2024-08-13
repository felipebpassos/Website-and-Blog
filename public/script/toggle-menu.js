$(document).ready(function(){

    const menuSpans = $("menu").find('span');

    $("#toggle-menu").click(function(){

        menuSpans.each(function() {
            $(this).addClass('animate');
        });
        
        if ($("menu").hasClass("opened")) {
            $("body").css("overflow", ""); // Redefine o overflow do body para o padrão
            $("menu").removeClass("opened"); // Remove a classe .opened quando o menu está fechado
        } else {
            $("body").css("overflow", "hidden"); // Oculta o overflow do body
            $("menu").addClass("opened"); // Adiciona a classe .opened quando o menu está aberto
        }
    });

    $("menu .close-popup").click(function(){

        menuSpans.each(function() {
            $(this).removeClass('animate');
        });
        
        $("body").css("overflow", ""); // Redefine o overflow do body para o padrão
        $("menu").removeClass("opened"); // Remove a classe .opened quando o menu está fechado
    });

    $("menu li a").click(function(){

        menuSpans.each(function() {
            $(this).removeClass('animate');
        });

        $("body").css("overflow", ""); // Redefine o overflow do body para o padrão
        $("menu").removeClass("opened"); // Remove a classe .opened quando o menu está fechado
    });
});
