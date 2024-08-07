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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
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

        <div class="logo">
            <img src="http://localhost/gabi/public/img/logo2.png" alt="">
        </div>

        <nav>
            <ul>
                <li><a href="#sobre">Sobre Mim</a></li>
                <li><a href="https://api.whatsapp.com/send/?phone=5579981026492&text&type=phone_number&app_absent=0" target="_blank">Agendar Horário</a></li>
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
                    <div id="imagem-fade">
                        <img src="http://localhost/gabi/public/img/gabi1.png" alt="">
                        <div class="fade-bottom"></div>
                    </div>
                    <h1 class="fade-in-slide-up">GABRIELA<br>CASTRO</h1>
                    <h3 class="fade-in-slide-up-delay">Psicoterapia | Saúde Mental | Bem-estar</h3>
                    <p class="fade-in-slide-up-long-delay">Ajudo jovens e adultos a viverem uma vida mais saudável e funcional, entendendo melhor seus pensamentos, emoções e comportamentos.</p>
                </div>
            </div>
            <img src="http://localhost/gabi/public/img/flor_decor.png" id="decor" alt="">
        </section>

        <!-- Sobre -->
        <section class="sobre" id="sobre">
            <div class="sobre-mim">
                <h1>Sobre mim</h1>
                <div class="content">
                    <img class="caffe-img" src="http://localhost/gabi/public/img/gabi_caffe.jpg" alt="">
                    <p class="texto fade-in-slide-up">
                        Gostaria primeiramente de dizer que fico feliz em vê-lo(a) disposto(a) a optar pelo autocuidado e bem-estar emocional. Embora a terapia possa ser um processo desafiador, os benefícios que ela traz são recompensadores.
                        <br><br>
                        Com mais de 3 anos de experiência, tenho ajudado jovens e adultos a encontrarem equilíbrio e funcionalidade em suas vidas, oferecendo compreensão e ferramentas essenciais para uma mudança que traga uma melhor qualidade de vida.
                        <br><br>
                        Utilizo como abordagem a Terapia Cognitivo-Comportamental (TCC), que permite identificar e modificar padrões de pensamento e comportamento que causam desconforto emocional. Ajundando o paciente a lidar melhor com a ansiedade, depressão, assim como transtornos alimentares, de personalidade e de humor.
                        <br><br>
                        Estou pronta para te ajudar. Agende agora mesmo uma sessão ou entre em contato para mais informações.
                        <a class="fade-in-slide-up" style="margin:auto; margin-top: 50px; display: block; width:fit-content;" href="https://api.whatsapp.com/send/?phone=5579981026492&text&type=phone_number&app_absent=0" target="_blank"><button class="btn-1">Agende uma sessão</button></a>
                    </p>
                </div>
            </div>

            <!-- Vantagens da Terapia Online -->
            <div class="terapia-online">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 fade-in-slide-up">
                            <i class="fa-solid fa-clock"></i>
                            <h4>Evite dor de cabeça</h4>
                            <div class="card">
                                <span>Evite longos deslocamentos, engarrafamentos e gastos com transporte. Faça a sua terapia no conforto da sua casa.</span>
                            </div>
                        </div>
                        <div class="col-md-4 fade-in-slide-up">
                            <i class="fa-solid fa-circle-check"></i>
                            <h4>Eficiente</h4>
                            <div class="card">
                                <span>A terapia online é comprovadamente tão eficiente quanto a terapia presencial para o tratamento da maioria das demandas.</span>
                            </div>
                        </div>
                        <div class="col-md-4 fade-in-slide-up">
                            <i class="fa-solid fa-globe"></i>
                            <h4>De onde você estiver</h4>
                            <div class="card">
                                <span>A terapia online te permite ter acesso as sessões de qualquer lugar com conexão à internet.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="formacao">
                <img class="titulo-img fade-in-slide-up" src="http://localhost/gabi/public/img/formacao.png" alt="">
                <div class="texto">
                    <p>Após a graduação em Psicologia, continuei ampliando meus conhecimentos através de cursos especializados e experiências na área, aprimorando minhas habilidades no manejo da ansiedade, depressão, transtornos alimentares, de personalidade e de humor.</p>
                    <h3>Especialização</h3>
                    <ul>
                        <li>
                            <h5>Graduação</h5>
                            <span>UNIT - Universidade Tiradentes - 2022</span>
                        </li>
                        <li>
                            <h5>Pós-graduanda em Neuropsicologia</h5>
                            <span>UNIT - Universidade Tiradentes</span>
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

        <!-- FAQ -->
        <section class="FAQ" id="faq">
            <div class="container fade-in-element">
                <h1>Dúvidas frequentes</h1>
                <ul id="lista-perguntas" class="accordion-1">
                    <div class="pergunta">
                        <li>
                            <div class="pergunta-header">
                                <p>A terapia é confidencial?</p>
                                <svg width="15" height="10" viewBox="0 0 42 25">
                                    <path d="M3 3L21 21L39 3" stroke="var(--branco)" stroke-width="7" stroke-linecap="round">
                                    </path>
                                </svg>
                            </div>
                            <div class="resposta">
                                <p>Sim, confidencialidade é fundamental em minha prática. Suas informações são tratadas
                                    com o mais alto grau de privacidade e profissionalismo.</p><br>
                            </div>
                        </li>

                    </div>
                    <div class="pergunta">
                        <li>
                            <div class="pergunta-header">
                                <p>Qual a duração típica de uma sessão?</p>
                                <svg width="15" height="10" viewBox="0 0 42 25">
                                    <path d="M3 3L21 21L39 3" stroke="var(--branco)" stroke-width="7" stroke-linecap="round">
                                    </path>
                                </svg>
                            </div>
                            <div class="resposta">
                                <p>As sessões geralmente têm duração entre 50 (cinquenta) minutos e 1 (uma) hora, mas
                                    isso pode variar a depender das necessidades individuais. Trabalhamos juntos para
                                    garantir que cada sessão seja produtiva e significativa.</p>
                                <br>
                            </div>
                        </li>
                    </div>
                    <div class="pergunta">
                        <li>
                            <div class="pergunta-header">
                                <p>Como sei se a terapia é adequada para mim?</p>
                                <svg width="15" height="10" viewBox="0 0 42 25">
                                    <path d="M3 3L21 21L39 3" stroke="var(--branco)" stroke-width="7" stroke-linecap="round">
                                    </path>
                                </svg>
                            </div>
                            <div class="resposta">
                                <p>A terapia é uma ferramenta poderosa para qualquer pessoa que busque crescimento
                                    pessoal, enfrentamento de desafios emocionais ou melhoria nos relacionamentos. Se
                                    você está enfrentando dúvidas, estou aqui para ajudar a explorar se a terapia é a
                                    escolha certa para você.</p>
                                <br>
                            </div>
                        </li>
                    </div>
                    <div class="pergunta">
                        <li>
                            <div class="pergunta-header">
                                <p>Como são realizadas as sessões online?</p>
                                <svg width="15" height="10" viewBox="0 0 42 25">
                                    <path d="M3 3L21 21L39 3" stroke="var(--branco)" stroke-width="7" stroke-linecap="round">
                                    </path>
                                </svg>
                            </div>
                            <div class="resposta">
                                <p>As sessões online são realizadas por meio de plataformas seguras de videochamada.
                                    Ofereço o mesmo nível de suporte e confidencialidade que em sessões presenciais,
                                    garantindo uma experiência confortável e eficaz.
                                </p>
                                <br>
                            </div>
                        </li>
                    </div>
                </ul>
            </div>
        </section>

    </main>

    <!-- Rodapé -->
    <footer>
        <div class="copyright">
            &copy; Gabriela Castro 2024, Desenvolvido por <a href="https://www.instagram.com/simplifyweb/" target="_blank">Simplify
                Web</a>
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

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- js files (body) -->
    <?php
    foreach ($scripts_body as $script) {
        echo '<script src="http://localhost/gabi/public/script/' . $script . '.js"></script>';
    }
    ?>
</body>

</html>