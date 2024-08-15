<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="icon" href="<?php echo BASE_URL; ?>/public/img/logo-ico.ico">
    <meta property="og:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta property="og:description" content="">
    <meta property="og:image" content="<?php echo BASE_URL; ?>/public/img/capa_site.png">
    <meta property="og:url" content="https://www.psigabrielacastro.com.br">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Gabriela Castro ">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="<?php echo BASE_URL; ?>/public/img/capa_site.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/styles/footer.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/styles/blog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="background">
            <img src="<?php echo BASE_URL; ?>/public/img/banner.png" alt="Banner de fundo">
        </div>
        <div class="content">
            <img src="<?php echo BASE_URL; ?>/public/img/logo_blog.png" alt="Gabriela Castro Psicóloga | Logo (blog)">
            <nav>
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                    <li><span></span></li>
                    <li><a href="<?php echo BASE_URL; ?>/blog">Blog</a></li>
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
                        <span>
                            <?php
                            if (!empty($tags)) {
                                // Imprime as tags separadas por vírgula e com a primeira letra maiúscula
                                $tags_array = array_map('ucfirst', $tags);
                                echo htmlspecialchars(implode(', ', $tags_array));
                            } else {
                                echo 'Nenhuma tag disponível.';
                            }
                            ?>
                        </span>
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
                    echo file_get_contents((htmlspecialchars_decode($conteudo_html)));
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

    <div class="message-box">
        <span class="texto">Fale comigo<span class="close">x</span></span>
    </div>

    <div class="whatsapp-box">
        <a href="https://api.whatsapp.com/send/?phone=5579981026492&text&type=phone_number&app_absent=0" class="whatsapp-button" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
            <span>Contato</span>
        </a>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/public/script/audio-script.js"></script>
    <script src="<?php echo BASE_URL; ?>/public/script/message-button.js"></script>
</body>

</html>