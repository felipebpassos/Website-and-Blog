<?php 

function adjustImagePaths($content) {
    // Substitui './ckfinder/userfiles/images/' por o caminho correto '/ckfinder/userfiles/images/'
    $content = str_replace('src="./ckfinder/userfiles/images/', 'src="../../ckfinder/userfiles/images/', $content);

    return $content;
}