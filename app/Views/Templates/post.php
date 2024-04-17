<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <!-- Definições default -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ... meta tags, título e icone ... -->
    <?php echo isset($description) && !empty($description) ? '<meta name="description" content="' . $description . '">' : ''; ?>
    <title>
        <?php echo $title; ?>
    </title>
    <link rel="icon" href="http://localhost/gabi/public/img/logo2-ico.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- ... estilos ... -->
    <link rel="stylesheet" href="http://localhost/gabi/public/styles/footer.css">
    <?php
    foreach ($styles as $style) {
        echo '<link rel="stylesheet" href="http://localhost/gabi/public/styles/' . $style . '.css">' . PHP_EOL;
    }
    ?>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts (head) -->
    <?php
    foreach ($scripts_head as $script) {
        echo '<script src="http://localhost/gabi/public/script/' . $script . '.js"></script>';
    }
    ?>
</head>

<body>

    <!-- Cabeçalho -->
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
            <?php if (!empty($post)) : ?>
                <!-- Verifica se o post existe -->
                <h1 class="titulo">
                    <?php echo $post['titulo']; ?>
                </h1>
                <!-- Exibe o título do post -->

                <!-- Opções de compartilhamento -->
                <div class="compartilhar">
                    <p>Compartilhe:</p>

                    <!-- Ícone do Facebook -->
                    <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <!-- Ícone do Twitter -->
                    <a class="x" href="https://twitter.com/intent/tweet?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                    <!-- Ícone do LinkedIn -->
                    <a class="linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>

                    <!-- Ícone do WhatsApp -->
                    <a class="whatsapp" href="whatsapp://send?text=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>

                    <!-- Ícone do Telegram -->
                    <a class="telegram" href="https://t.me/share/url?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                        <i class="fab fa-telegram"></i>
                    </a>

                </div>

                <div class="opcoes">

                    <div class="info">
                        <div class="data-publicacao">
                            <i class="fa-solid fa-calendar"></i>
                            <span>
                                <?php echo date('d/m/Y', strtotime($post['data_publicacao'])); ?>
                            </span>
                        </div>

                        <div class="tags">
                            <i class="fa-solid fa-tags"></i>
                            <span></span>
                        </div>
                    </div>

                    <!-- Componente de leitura em áudio -->
                    <div id="audio-component">
                        <!-- Botão de ativar/desativar a leitura em áudio -->
                        <button id="audio-toggle" class="btn btn-primary">
                            <i class="fas fa-volume-up"></i> Ouvir
                        </button>
                        <!-- Botão de play/pause -->
                        <button id="play-pause-button" class="btn btn-primary">
                            <i id="play-pause-icon" class="fas fa-play"></i>
                        </button>
                        <!-- Áudio -->
                        <audio id="audio-player" controls style="display: none;">
                            Seu navegador não suporta a reprodução de áudio.
                        </audio>
                    </div>

                </div>

                <?php if (!empty($post['url_capa'])) : ?>
                    <!-- Verifica se a capa do post existe -->
                    <img src="<?php echo $post['url_capa']; ?>" alt="Capa do Post">
                    <!-- Exibe a capa do post -->
                <?php endif; ?>

                <div class="conteudo">
                    <?php echo replaceOembedWithIframe(htmlspecialchars_decode($post['conteudo'])); ?>
                    <!-- Exibe o conteúdo do post -->
                </div>

                <!-- Opções de compartilhamento -->
                <div class="compartilhar">
                    <p>Compartilhe:</p>

                    <!-- Ícone do Facebook -->
                    <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <!-- Ícone do Twitter -->
                    <a class="x" href="https://twitter.com/intent/tweet?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                    <!-- Ícone do LinkedIn -->
                    <a class="linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>

                    <!-- Ícone do WhatsApp -->
                    <a class="whatsapp" href="whatsapp://send?text=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>

                    <!-- Ícone do Telegram -->
                    <a class="telegram" href="https://t.me/share/url?url=<?php echo urlencode('URL_DO_SEU_POST_AQUI'); ?>" target="_blank">
                        <i class="fab fa-telegram"></i>
                    </a>

                </div>

            <?php else : ?>
                <p>Post não encontrado.</p>
                <!-- Exibe uma mensagem se o post não for encontrado -->
            <?php endif; ?>
        </div>

    </main>

    <!-- Rodapé -->
    <footer>
        <div class="copyright">
            &copy; 2024, Desenvolvido por <a href="https://www.instagram.com/simplifyweb/" target="_blank">Simplify
                Web</a>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var audioToggle = document.getElementById("audio-toggle");
            var playPauseButton = document.getElementById("play-pause-button");
            var playPauseIcon = document.getElementById("play-pause-icon");
            var audioPlayer = document.getElementById("audio-player");
            var isPlaying = false;

            // Função para iniciar ou parar a leitura em áudio
            function toggleAudio() {
                var titulo = document.querySelector('.titulo').innerText; // Extrai o texto do elemento com a classe .titulo
                var conteudo = document.querySelector('.conteudo').innerText; // Extrai o texto do elemento com a classe .conteudo
                var texto = titulo + ' ' + conteudo; // Concatena o texto do título e do conteúdo
                var utterance = new SpeechSynthesisUtterance(texto); // Cria um objeto SpeechSynthesisUtterance com o texto
                window.speechSynthesis.cancel(); // Cancela qualquer leitura de áudio em andamento
                window.speechSynthesis.speak(utterance); // Reproduz o áudio
            }

            // Evento de clique no botão de ativar/desativar a leitura em áudio
            audioToggle.addEventListener("click", function() {
                if (!isPlaying) {
                    toggleAudio(); // Inicia a leitura em áudio
                    isPlaying = true;
                    playPauseIcon.classList.remove("fa-play");
                    playPauseIcon.classList.add("fa-pause");
                } else {
                    window.speechSynthesis.cancel(); // Interrompe a leitura em áudio
                    isPlaying = false;
                    playPauseIcon.classList.remove("fa-pause");
                    playPauseIcon.classList.add("fa-play");
                }
            });

            // Evento de clique no botão de play/pause
            playPauseButton.addEventListener("click", function() {
                if (isPlaying) {
                    window.speechSynthesis.cancel(); // Interrompe a leitura em áudio
                    isPlaying = false;
                    playPauseIcon.classList.remove("fa-pause");
                    playPauseIcon.classList.add("fa-play");
                } else {
                    toggleAudio(); // Inicia a leitura em áudio
                    isPlaying = true;
                    playPauseIcon.classList.remove("fa-play");
                    playPauseIcon.classList.add("fa-pause");
                }
            });
        });
    </script>

</body>

</html>