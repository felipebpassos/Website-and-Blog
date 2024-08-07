<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="icon" href="http://localhost/gabi/public/img/logo2-ico.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/gabi/public/styles/footer.css">
    <link rel="stylesheet" href="http://localhost/gabi/public/styles/blog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="background">
            <img src="http://localhost/gabi/public/img/banner.png" alt="Banner de fundo">
        </div>
        <div class="content">
            <img src="http://localhost/gabi/public/img/logo_blog.png" alt="Gabriela Castro Psicóloga | Logo (blog)">
            <nav>
                <ul>
                    <li><a href="http://localhost/gabi/">Home</a></li>
                    <li><span></span></li>
                    <li><a href="http://localhost/gabi/blog">Blog</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main style="background-color:#eeeeee;">
        <div class="post">
            <h1 class="titulo"><?php echo htmlspecialchars($post['titulo']); ?></h1>
            <div class="compartilhar">
                <p>Compartilhe:</p>
                <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="x" href="https://twitter.com/intent/tweet?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a class="linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a class="whatsapp" href="whatsapp://send?text=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a class="telegram" href="https://t.me/share/url?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                    <i class="fab fa-telegram"></i>
                </a>
            </div>
            <div class="opcoes">
                <div class="info">
                    <div class="data-publicacao">
                        <i class="fa-solid fa-calendar"></i>
                        <span><?php echo date('d/m/Y', strtotime($post['data_publicacao'])); ?></span>
                    </div>
                    <div class="tags">
                        <i class="fa-solid fa-tags"></i>
                        <span><?php echo htmlspecialchars($post['tags']); ?></span>
                    </div>
                </div>
                <div id="audio-component">
                    <button id="audio-toggle" class="btn btn-primary">
                        <i class="fas fa-volume-up"></i> Ouvir
                    </button>
                    <button id="play-pause-button" class="btn btn-primary">
                        <i id="play-pause-icon" class="fas fa-play"></i>
                    </button>
                    <audio id="audio-player" controls style="display: none;">
                        Seu navegador não suporta a reprodução de áudio.
                    </audio>
                </div>
            </div>
            <?php if (!empty($post['url_capa'])) : ?>
                <img id="capa" src="<?php echo htmlspecialchars($post['url_capa']); ?>" alt="Capa do Post">
            <?php endif; ?>
            <div class="conteudo">
                <?php
                // Inclui o conteúdo do arquivo HTML
                if (file_exists($conteudo_html)) {
                    echo file_get_contents(replaceOembedWithIframe(htmlspecialchars_decode($conteudo_html)));
                } else {
                    echo '<p>Conteúdo não disponível.</p>';
                }
                ?>
            </div>
            <div class="compartilhar">
                <p>Compartilhe:</p>
                <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="x" href="https://twitter.com/intent/tweet?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a class="linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a class="whatsapp" href="whatsapp://send?text=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a class="telegram" href="https://t.me/share/url?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                    <i class="fab fa-telegram"></i>
                </a>
            </div>
        </div>
    </main>
    <footer>
        <div class="copyright">
            &copy; <?php echo date('Y', strtotime($post['data_publicacao'])); ?> Gabriela Castro, Desenvolvido por <a href="https://www.instagram.com/simplifyweb/" target="_blank">Simplify Web</a>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="http://localhost/gabi/public/script/audio-script.js"></script>
</body>

</html>