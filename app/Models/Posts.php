<?php

require_once 'Conexao.php';

class Posts
{

    private $con;

    public function __construct()
    {

        $this->con = Conexao::getConexao();

    }

    public function salvarPost($titulo, $conteudo, $imagens, $url_capa)
    {
        // Verifica se o título, o conteúdo e a URL da capa não estão vazios
        if (!empty($titulo) && !empty($conteudo) && !empty($url_capa)) {
            // Prepara a consulta SQL para inserir o post
            $stmt = $this->con->prepare("INSERT INTO posts (titulo, conteudo, url_capa) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $conteudo);
            $stmt->bindParam(3, $url_capa);

            // Executa a consulta para inserir o post
            if ($stmt->execute()) {
                // Obtém o ID do post recém-inserido
                $post_id = $this->con->lastInsertId();

                // Itera sobre as imagens encontradas e faz upload delas
                foreach ($imagens as $imagem) {
                    // Obtém o novo nome do arquivo
                    $novo_nome_arquivo = formatarNomeArquivo($imagem, $titulo);

                    // Define o caminho de destino para fazer upload (./uploads/nome_do_arquivo-nome_do_post.extensao)
                    $caminho_destino = "./uploads/" . $novo_nome_arquivo;

                    // Faz o download da imagem e salva no destino
                    file_put_contents($caminho_destino, file_get_contents($imagem));

                    // Insere a URL da imagem no banco de dados associada ao post ID
                    $stmtImagens = $this->con->prepare("INSERT INTO imagens (post_id, url) VALUES (?, ?)");
                    $stmtImagens->bindParam(1, $post_id);
                    $stmtImagens->bindParam(2, $caminho_destino);
                    $stmtImagens->execute();
                }
                return true;
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