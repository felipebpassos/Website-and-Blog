USE gabi;

DROP TABLE posts;

DROP TABLE tags;

select *from posts;

-- Tabela para armazenar os posts
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data_publicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    url_capa VARCHAR(255)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Tabela para armazenar as tags
CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Tabela associativa entre posts e tags
CREATE TABLE posts_tags (
    post_id INT,
    tag_id INT,
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id),
    PRIMARY KEY (post_id, tag_id)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
