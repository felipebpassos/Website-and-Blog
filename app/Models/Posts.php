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

    public function salvarTags($post_id, $tags)
    {
        foreach ($tags as $tag) {
            // Verifica se a tag já existe
            $stmt = $this->con->prepare("SELECT id FROM tags WHERE nome = ?");
            $stmt->bindParam(1, $tag);
            $stmt->execute();
            $tag_id = $stmt->fetchColumn();

            // Se a tag não existir, insere uma nova tag
            if (!$tag_id) {
                $stmt = $this->con->prepare("INSERT INTO tags (nome) VALUES (?)");
                $stmt->bindParam(1, $tag);
                $stmt->execute();
                $tag_id = $this->con->lastInsertId();
            }

            // Associa a tag ao post
            $stmt = $this->con->prepare("INSERT INTO posts_tags (post_id, tag_id) VALUES (?, ?)");
            $stmt->bindParam(1, $post_id, PDO::PARAM_INT);
            $stmt->bindParam(2, $tag_id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function getAllTags()
    {
        // Prepara a consulta SQL para obter todas as tags
        $stmt = $this->con->prepare("SELECT nome FROM tags ORDER BY nome ASC");
        $stmt->execute();

        // Retorna as tags como um array de strings
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getTagsPost($post_id)
    {
        // Prepara a consulta SQL para obter as tags associadas ao post
        $stmt = $this->con->prepare("SELECT t.nome FROM tags t
                                     INNER JOIN posts_tags pt ON t.id = pt.tag_id
                                     WHERE pt.post_id = ?");
        $stmt->bindParam(1, $post_id, PDO::PARAM_INT);
        $stmt->execute();

        // Retorna as tags como um array de strings
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
