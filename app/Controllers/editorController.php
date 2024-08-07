<?php

class editorController extends Controller
{
    public function __construct()
    {
        // Inicia a sessão
        session_start();

        // Verifica se não há uma sessão válida
        if (!isset($_SESSION['name'])) {
            // Redireciona para a página de login
            header("Location: http://localhost/gabi/login");
            exit();
        }
    }

    // Generates the log-in page
    public function index()
    {
        //set template
        $template = 'editor';

        //set page data
        $data['view'] = '';
        $data['title'] = 'Editor | Gabriela Castro Psicóloga ';
        $data['description'] = '';
        $data['styles'] = array('editor');
        $data['scripts_head'] = array('');
        $data['scripts_body'] = array('scroll-invisible', 'fade-img', 'fade-in-slide-up');

        //load view
        $this->loadTemplates($template, $data);
    }

    public function publicar()
    {
        // Verifica se os dados foram enviados via POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se o título, o conteúdo e a capa não estão vazios
            if (!empty($_POST["titulo"]) && !empty($_POST["conteudo"]) && isset($_FILES['capa']) && $_FILES['capa']['error'] === UPLOAD_ERR_OK) {
                // Sanitize dos dados recebidos
                $titulo = htmlspecialchars($_POST["titulo"]);
                $conteudo = htmlspecialchars($_POST["conteudo"]);

                // Caminho temporário do arquivo
                $arquivo_temporario = $_FILES['capa']['tmp_name'];
                // Nome original do arquivo
                $nome_arquivo = $_FILES['capa']['name'];
                // Move o arquivo para o diretório desejado (por exemplo, uploads/)
                $caminho_arquivo = "./public/uploads/" . $nome_arquivo;
                move_uploaded_file($arquivo_temporario, $caminho_arquivo);
                // URL da imagem de capa para salvar no banco de dados
                $url_capa = "http://localhost/gabi/public/uploads/" . $nome_arquivo;

                // Encontra todas as URLs das imagens no conteúdo do post
                preg_match_all('/<img[^>]+src="([^">]+)"/', $conteudo, $matches);
                $imagens = $matches[1]; // Obtém todas as URLs das imagens

                // Itera sobre as imagens encontradas e faz upload delas
                foreach ($imagens as $imagem) {
                    // Obtém o novo nome do arquivo
                    $novo_nome_arquivo = formatarNomeArquivo($imagem, $titulo);

                    // Define o caminho de destino para fazer upload (./uploads/nome_do_arquivo-nome_do_post.extensao)
                    $caminho_destino = "./uploads/" . $novo_nome_arquivo;

                    // Faz o download da imagem e salva no destino
                    file_put_contents($caminho_destino, file_get_contents($imagem));
                }

                // Instancia o modelo Posts
                $posts_model = new Posts();

                // Chama o método salvarPost do modelo para salvar o título no banco de dados e obter o ID
                $post_id = $posts_model->salvarPost($titulo, $url_capa);

                // Chama o método salvarPost do modelo para salvar o título no banco de dados
                if ($post_id) {
                    // Define o nome do arquivo referente ao conteúdo do post com base no ID
                    $file_name = 'post' . $post_id . '.html';

                    // Caminho completo para salvar o arquivo
                    $file_path = './posts/' . $file_name;

                    // Salva o conteúdo no arquivo
                    if (file_put_contents($file_path, htmlspecialchars_decode($conteudo))) {
                        // Redireciona de volta para index.php após a inserção
                        header("Location: http://localhost/gabi/editor");
                        exit();
                    } else {
                        echo "Erro ao salvar o conteúdo do Post.";
                    }
                } else {
                    echo "Erro ao salvar o título no banco de dados.";
                }
            } else {
                echo "Título, conteúdo ou capa não foram enviados corretamente.";
            }
        }
    }
}
