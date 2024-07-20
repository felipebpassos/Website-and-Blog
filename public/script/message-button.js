$(document).ready(function() {
    // Mostrar whatsapp-box após 5 segundos
    setTimeout(function() {
        $('.whatsapp-box').addClass('show');
    }, 3000);

    // Mostrar message-box após 6 segundos
    setTimeout(function() {
        $('.message-box').addClass('show');
    }, 4000);

    // Adicionar manipulador de evento de clique ao .close do .message-box
    $('.message-box .texto .close').click(function() {
        $('.message-box').hide();
    });
});