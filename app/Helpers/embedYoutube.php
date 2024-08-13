<?php

function replaceYoutubeEmbed($content)
{
    // Regex para encontrar o trecho gerado pelo CKEditor
    $pattern = '/<figure class="media">\s*<oembed url="https:\/\/www\.youtube\.com\/watch\?v=([a-zA-Z0-9_\-]+)"><\/oembed>\s*<\/figure>/';

    // Substitui pelo iframe correto
    $replacement = '<iframe width="560" height="315" src="https://www.youtube.com/embed/$1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

    // Realiza a substituição
    return preg_replace($pattern, $replacement, $content);
}
