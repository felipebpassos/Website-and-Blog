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
    <link rel="icon" href="http://localhost/gabi/public/img/logo-ico.ico">

    <!-- ... estilos ... -->
    <link rel="stylesheet" href="http://localhost/gabi/public/styles/styles.css">
    <link rel="stylesheet" href="http://localhost/gabi/public/styles/footer.css">
    <?php
    foreach ($styles as $style) {
        echo '<link rel="stylesheet" href="http://localhost/gabi/public/styles/' . $style . '.css">' . PHP_EOL;
    }
    ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

<body class="hide-scroll">

    <!-- Cabeçalho -->
    <header>

        <span class="crp">
            CRP 19/4873
        </span>

        <nav>
            <ul>
                <li>Sobre Mim</li>
                <li>Agendar Horário</li>
                <li><a href="http://localhost/gabi/blog">Blog</a></li>
            </ul>
        </nav>

    </header>

    <nav class="redes-sociais">
        <ul>
            <li><a href="https://www.instagram.com/psigabrielacastrocm/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="https://www.linkedin.com/in/gabriela-castro-b77848226/?originalSubdomain=br" target="_blank"><i class="fa-brands fa-linkedin"></i></a></li>
        </ul>
    </nav>

    <div class="foto-fundo">
        <img width="100%" src="http://localhost/gabi/public/img/gabi_fundo.jpg" alt="">
    </div>

    <main>

        <!-- Apresentação Principal -->
        <section class="apresentacao-principal">
            <div class="texto">
                <div>
                    <h1 class="fade-in-slide-up">GABRIELA<br>CASTRO</h1>
                    <h3 class="fade-in-slide-up-delay">Psicoterapia | Saúde Mental | Bem-estar</h3>
                    <p class="fade-in-slide-up-long-delay">Ajudo jovens e adultos a viverem uma vida mais saudável e funcional, entendendo melhor seus pensamentos, emoções e comportamentos.</p>
                </div>
            </div>
            <img src="http://localhost/gabi/public/img/gabi1.png" id="imagem-fade" alt="">
            <img src="http://localhost/gabi/public/img/flor_decor.png" id="decor" alt="">
            <div class="fade-bottom"></div>
        </section>

        <!-- Sobre -->
        <section class="sobre">
            <div class="sobre-mim">
                <div class="container">
                    <div class="row">
                        <!-- Coluna 1 -->
                        <div class="col-md-5">
                            <img class="titulo-img fade-in-slide-up" src="http://localhost/gabi/public/img/sobre.png" alt="">
                            <img class="caffe-img fade-in-slide-up" src="http://localhost/gabi/public/img/gabi_caffe.jpg" alt="">
                        </div>
                        <!-- Coluna 2 -->
                        <div class="col-md-7">
                            <p class="texto fade-in-slide-up">
                                Gostaria primeiramente de dizer que fico feliz em vê-lo(a) disposto(a) a optar pelo autocuidado e bem-estar emocional. Embora a terapia possa ser um processo desafiador, os benefícios que ela traz são recompensadores.
                                <br><br>
                                Com mais de 2 anos de experiência, tenho ajudado adultos a encontrar equilíbrio e funcionalidade em suas vidas, oferecendo compreensão e ferramentas essenciais para uma mudança que traga melhor qualidade de vida.
                                <br><br>
                                Utilizo a abordagem da Terapia Cognitivo-Comportamental (TCC), para identificar e modificar padrões de pensamento e comportamento que causam desconforto emocional. Ajundando a lidar melhor com a ansiedade, depressão e transtornos de humor, de personalidade e alimentares.
                                <br><br>
                                Estou pronta para te ajudar. Agende agora mesmo uma sessão.
                            </p>
                            <button class="btn-1 fade-in-slide-up">Agende uma sessão</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="formacao">
                <img class="titulo-img fade-in-slide-up" src="http://localhost/gabi/public/img/formacao.png" alt="">
                <div class="texto">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum urna id ligula
                        consequat, eget dapibus magna fermentum. Integer id sagittis sapien, sit amet volutpat
                        justo. Mauris sed dapibus elit.</p>
                    <h3>Especialização</h3>
                    <ul>
                        <li>
                            <h5>Graduação</h5>
                            <span>UNIT - Universidade Tiradentes - 2022</span>
                        </li>
                        <li>
                            <h5>Formação em Terapia Cognitivo-Comportamental</h5>
                            <span>FLNC Cursos Digitais - 2023</span>
                        </li>
                        <li>
                            <h5>Análise do Comportamento Aplicada (ABA)</h5>
                            <span>Unova Cursos - 2023</span>
                        </li>
                        <li>
                            <h5>Avaliação Psicológica</h5>
                            <span>Unova Cursos - 2024</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Tratamentos -->
        <section class="tratamentos">

        </section>

        <!-- Agendamento de consulta e contato -->
        <section class="agendamento">
            <img class="titulo-img fade-in-slide-up" src="http://localhost/gabi/public/img/agendar.png" alt="">
            <button class="btn-1 fade-in-slide-up" style="margin-top: 60px;">Agende agora</button>
        </section>

    </main>

    <!-- Rodapé -->
    <footer>
        <div class="copyright">
            &copy; 2024, Desenvolvido por <a href="https://www.instagram.com/simplifyweb/" target="_blank">Simplify
                Web</a>
        </div>
    </footer>

    <a href="https://api.whatsapp.com/send?phone=5579981026492" class="whatsapp-button" target="_blank">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- js files (body) -->
    <?php
    foreach ($scripts_body as $script) {
        echo '<script src="http://localhost/gabi/public/script/' . $script . '.js"></script>';
    }
    ?>
</body>

</html>