<?php 

require 'autoload.php';

//Inclui funções (Helpers)
include "./app/Helpers/formataNome.php"; 
include "./app/Helpers/ImgPostsPath.php";   
include "./app/Helpers/embedYoutube.php"; 

//Inclui a configuração de IP/domínio
require_once "./app/Core/Config.php";  

$core = new Core();