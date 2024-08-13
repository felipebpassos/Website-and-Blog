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
    <link rel="icon" href="<?php echo BASE_URL; ?>/public/img/logo-ico.ico">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="">
    <meta property="og:image" content="<?php echo BASE_URL; ?>/public/img/capa_site.png">
    <meta property="og:url" content="https://www.psigabrielacastro.com.br">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Gabriela Castro ">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="<?php echo BASE_URL; ?>/public/img/capa_site.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- ... estilos ... -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/styles/footer.css">
    <?php
    if (isset($styles)) {
        foreach ($styles as $style) {
            echo '<link rel="stylesheet" href="'. BASE_URL . '/public/styles/' . $style . '.css">' . PHP_EOL;
        }
    }
    ?>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts (head) -->
    <?php
    if (isset($scripts_head)) {
        foreach ($scripts_head as $script) {
            echo '<script src="'. BASE_URL . '/public/script/' . $script . '.js"></script>';
        }
    }
    ?>
</head>

<body>

    <!-- Cabeçalho -->
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

    <main>
        <form action="URL_DO_SEU_CONTROLLER_AQUI" method="get" class="mb-3 pesquisar">
            <div class="input-group" style="width: 80%; margin: auto;">
                <input type="text" class="form-control" placeholder="Pesquisar no blog..." name="q">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <div class="container">
            <?php if (!empty($posts)): ?>
                <?php $chunks = array_chunk($posts, 3); ?>
                <?php foreach ($chunks as $chunk): ?>
                    <div class="row">
                        <?php foreach ($chunk as $post): ?>
                            <div class="col-md-4">
                                <a class="post-link" href="<?php echo BASE_URL; ?>/blog/post/<?php echo $post['id']; ?>">
                                    <div class="card">
                                        <div class="capa">
                                            <?php if (!empty($post['url_capa'])): ?>
                                                <img src="<?php echo $post['url_capa']; ?>" class="card-img-top" alt="Imagem de Capa">
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php echo $post['titulo']; ?>
                                            </h5>
                                            <p class="card-text">
                                                <?php echo date('d/m/Y', strtotime($post['data_publicacao'])); ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Sem publicações ainda.</p>
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

</body>

</html>