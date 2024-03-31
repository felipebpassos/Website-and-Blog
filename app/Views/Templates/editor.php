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

    <!-- ... estilos ... -->
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
    <script src="http://localhost/gabi/ckeditor5/ckeditor.js"></script>
</head>

<body>

    <a href="http://localhost/gabi/login/logout">Logout</a>

    <div class="container mt-5">
        <div class="titulo">
            <h1>Editor de conteúdo CMS</h1>
            <p>
                Este é um editor de conteúdo html que permite criar e editar publicações em sites, artigos,
                blogs. Apresentando opções de formatação e anexa imagens e vídeos do youtube.
            </p>
        </div>
        <form action="http://localhost/gabi/editor/publicar" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="capa" class="form-label">Capa:</label>
                <input type="file" id="capa" name="capa" class="form-control" required>
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
                        uploadUrl: 'http://localhost/gabi/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
                    }
                })
                .then(editor => {
                    editor.editing.view.change(writer => {
                        writer.setStyle('min-height', '200px', editor.editing.view.document.getRoot());
                    });

                    // Adiciona um evento para atualizar o campo oculto quando o conteúdo do editor muda
                    editor.model.document.on('change:data', () => {
                        const data = editor.getData();

                        // Regex para encontrar todas as tags de imagem e extrair suas URLs
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

            // Função para ocultar as divs com a classe "ck-powered-by"
            function hidePoweredByDivs() {
                // Seletor para as divs com a classe "ck-powered-by"
                const poweredByDivs = document.querySelectorAll('.ck-powered-by');

                // Iterar sobre as divs encontradas e ocultá-las
                poweredByDivs.forEach(div => {
                    div.style.display = 'none !important';
                });
            }

            // Função para ocultar a div com a classe "ck-body-wrapper"
            function hideCKBodyWrapper() {
                $('.ck-body-wrapper').hide();
            }

            // Callback a ser chamado quando ocorrerem mudanças no DOM
            const mutationCallback = function (mutationsList, observer) {
                for (const mutation of mutationsList) {
                    // Verificar se nodes foram adicionados
                    if (mutation.type === 'childList') {
                        // Verificar se algum node adicionado possui a classe "ck-body-wrapper"
                        const addedNodes = Array.from(mutation.addedNodes);
                        const ckBodyWrapper = addedNodes.find(node => $(node).hasClass('ck-body-wrapper'));

                        // Ocultar a div "ck-body-wrapper" se encontrada
                        if (ckBodyWrapper) {
                            hideCKBodyWrapper();
                        }
                    }
                }
            };

            // Criar um MutationObserver com o callback
            const observer = new MutationObserver(mutationCallback);

            // Configurações do MutationObserver (observar adições/remoções de nodes no DOM)
            const observerConfig = { childList: true, subtree: true };

            // Observar mudanças no DOM
            observer.observe(document.body, observerConfig);

            // Ocultar a div "ck-body-wrapper" se já estiver presente no DOM
            $(document).ready(function () {
                hideCKBodyWrapper();
            });

        </script>

</body>

</html>