<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Definições default -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ... meta tags, título e icone ... -->
    <?php echo isset($description) && !empty($description) ? '<meta name="description" content="' . $description . '">' : ''; ?>
    <title><?php echo $title; ?></title>
    <link rel="icon" href="<?php echo BASE_URL; ?>/public/img/logo2-ico.ico">

    <!-- ... estilos ... -->
    <?php
    if (isset($styles) && is_array($styles)) {
        foreach ($styles as $style) {
            echo '<link rel="stylesheet" href="' . BASE_URL . '/public/styles/' . $style . '.css">' . PHP_EOL;
        }
    }
    ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

    <!-- Scripts (head) -->
    <?php
    if (isset($scripts_head) && is_array($scripts_head)) {
        foreach ($scripts_head as $script) {
            echo '<script src="' . BASE_URL . '/public/script/' . $script . '.js"></script>';
        }
    }
    ?>
    <script src="<?php echo BASE_URL; ?>/ckeditor5/ckeditor.js"></script>
</head>

<body>

    <a href="<?php echo BASE_URL; ?>/login/logout">Logout</a>

    <div class="container mt-5">
        <div class="titulo">
            <h1>Editor de conteúdo CMS</h1>
            <p>
                Este é um editor de conteúdo html que permite criar e editar publicações em sites, artigos,
                blogs. Apresentando opções de formatação e anexa imagens e vídeos do youtube.
            </p>
        </div>
        <form action="<?php echo BASE_URL; ?>/editor/publicar" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="capa" class="form-label">Capa:</label>
                <input type="file" id="capa" name="capa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags:</label>
                <input type="text" id="tags" name="tags" class="form-control">
            </div>
            <div class="mb-3">
                <label for="editor" class="form-label">Conteúdo:</label>
                <textarea id="editor" name="conteudo" class="form-control" rows="10"></textarea>
                <input type="hidden" id="imageUrls" name="imageUrls">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <!-- Adicionando o Bootstrap JavaScript e o jQuery (opcional, necessário para funcionalidades avançadas do Bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    ckfinder: {
                        uploadUrl: '<?php echo BASE_URL; ?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
                    }
                })
                .then(editor => {
                    editor.editing.view.change(writer => {
                        writer.setStyle('min-height', '200px', editor.editing.view.document.getRoot());
                    });

                    editor.model.document.on('change:data', () => {
                        const data = editor.getData();
                        const regex = /<img[^>]+src="([^">]+)"/g;
                        let match;
                        const imageUrls = [];
                        while ((match = regex.exec(data)) !== null) {
                            imageUrls.push(match[1]);
                        }

                        document.getElementById('imageUrls').value = imageUrls.join(',');
                    });
                })
                .catch(error => {
                    console.error(error);
                });

            function hidePoweredByDivs() {
                const poweredByDivs = document.querySelectorAll('.ck-powered-by');
                poweredByDivs.forEach(div => {
                    div.style.display = 'none !important';
                });
            }

            function hideCKBodyWrapper() {
                $('.ck-body-wrapper').hide();
            }

            const mutationCallback = function(mutationsList, observer) {
                for (const mutation of mutationsList) {
                    if (mutation.type === 'childList') {
                        const addedNodes = Array.from(mutation.addedNodes);
                        const ckBodyWrapper = addedNodes.find(node => $(node).hasClass('ck-body-wrapper'));
                        if (ckBodyWrapper) {
                            hideCKBodyWrapper();
                        }
                    }
                }
            };

            const observer = new MutationObserver(mutationCallback);

            const observerConfig = {
                childList: true,
                subtree: true
            };

            observer.observe(document.body, observerConfig);

            $(document).ready(function() {
                hideCKBodyWrapper();
            });
        </script>

        <!-- Tagify JS -->
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Pegue as tags do PHP e transforme em array de strings
                var availableTags = <?php echo json_encode($tags); ?>;

                // Inicializa o Tagify no input de tags com a whitelist de tags disponíveis
                var input = document.querySelector('#tags');
                new Tagify(input, {
                    whitelist: availableTags,
                    dropdown: {
                        maxItems: 20,           // Número máximo de sugestões a mostrar
                        classname: "tags-look", // Nome da classe CSS para o dropdown
                        enabled: 0,             // Mostrar sugestões ao começar a digitar
                        closeOnSelect: false    // Não fechar o dropdown ao selecionar uma tag
                    }
                });
            });
        </script>

</body>

</html>
