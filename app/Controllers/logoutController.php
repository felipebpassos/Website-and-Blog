<?php

class logoutController extends Controller
{

    public function __construct()
    {
        session_name('gabi');
        session_start();
    }

    public function index()
    {
        // Limpa os dados da sessão
        session_destroy();

        // Redireciona para a página de login ou outra página de sua escolha
        header('Location: http://localhost/gabi/');
        exit;
    }

}

