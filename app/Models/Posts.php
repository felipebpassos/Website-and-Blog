<?php

require_once 'Conexao.php';

class Posts
{
    private $con;

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function salvarPost($titulo, $url_capa)
    {
        // Verifica se o título e a URL da capa não estão vazios
        if (!empty($titulo) && !empty($url_capa)) {
            // Prepara a consulta SQL para inserir o post
            $stmt = $this->con->prepare("INSERT INTO posts (titulo, url_capa) VALUES (?, ?)");
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $url_capa);

            // Executa a consulta para inserir o post
            if ($stmt->execute()) {
                // Retorna o ID do post recém-inserido
                return $this->con->lastInsertId();
            } else {
                return false;
            }
        } else {
            return false; // Retorna false se algum dos campos estiver vazio
        }
    }

    public function getPosts($pagina)
    {
        // Calcula o offset para a consulta
        $por_pagina = 12;
        $offset = ($pagina - 1) * $por_pagina;

        // Prepara a consulta SQL para obter posts com paginação
        $stmt = $this->con->prepare("SELECT id, titulo, url_capa, data_publicacao FROM posts ORDER BY data_publicacao DESC LIMIT ?, ?");
        $stmt->bindValue(1, $offset, PDO::PARAM_INT);
        $stmt->bindValue(2, $por_pagina, PDO::PARAM_INT);
        $stmt->execute();

        // Retorna os resultados da consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPost($id)
    {
        // Prepara a consulta SQL para obter o post pelo ID
        $stmt = $this->con->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        // Retorna o resultado da consulta
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
