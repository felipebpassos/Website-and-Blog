<?php

function replaceOembedWithIframe($content) {
    // Expressão regular para encontrar <oembed> com um URL do YouTube
    $pattern = '/<oembed[^>]*url="(https?:\/\/(?:www\.)?youtube\.com\/watch\?v=([^"]+))"[^>]*><\/oembed>/';
    
    // Substitui <oembed> por <iframe> com o link de incorporação do vídeo do YouTube
    $replacement = '<iframe width="560" height="315" src="https://www.youtube.com/embed/$2" frameborder="0" allowfullscreen></iframe>';
    
    // Retorna o conteúdo com a substituição feita
    return preg_replace($pattern, $replacement, $content);
}