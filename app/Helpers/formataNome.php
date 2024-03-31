<?php

function formatarNomeArquivo($url, $titulo)
{
    // Obtém o nome do arquivo da URL da imagem
    $nome_arquivo = basename($url);

    // Remove a extensão do arquivo
    $nome_arquivo_sem_extensao = pathinfo($nome_arquivo, PATHINFO_FILENAME);

    // Remove acentos e transforma em minúsculas
    $nome_arquivo_sem_acentos = mb_strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $nome_arquivo_sem_extensao));

    // Substitui espaços e hífens por underscores no título
    $titulo_sem_espacos = str_replace([' ', '-'], '_', $titulo);

    // Substitui espaços e hífens por underscores no nome do arquivo
    $nome_arquivo_sem_espacos = str_replace([' ', '-'], '_', $nome_arquivo_sem_acentos);

    // Obtém a extensão do arquivo
    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    // Concatena o nome da imagem, título do post e extensão do arquivo
    $novo_nome_arquivo = $nome_arquivo_sem_espacos . '_' . $titulo_sem_espacos . '.' . $extensao;

    return $novo_nome_arquivo;
}