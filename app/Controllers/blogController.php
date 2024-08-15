<?php

class blogController extends Controller
{

    public function index($pagina = 1)
    {
        // Instancie o modelo Posts
        $posts_model = new Posts();

        // Chame o método getPostsPaginados para obter os posts da página atual
        $posts = $posts_model->getPosts($pagina);

        // Agora você pode manipular os resultados dos posts como desejar

        //set template
        $template = 'blog';

        //set page data
        $data['view'] = '';
        $data['title'] = 'Blog | Gabriela Castro Psicóloga ';
        $data['description'] = '';
        $data['styles'] = array('blog');
        $data['scripts_head'] = array('');
        $data['scripts_body'] = array('message-button', 'scroll-invisible', 'fade-img', 'fade-in-slide-up');

        // Adicione os posts recuperados aos dados da página
        $data['posts'] = $posts;

        //load view
        $this->loadTemplates($template, $data);
    }

    public function post($id)
    {
        // Instancie o modelo Posts
        $posts_model = new Posts();

        // Chame o método getPost para obter o post pelo ID
        $post = $posts_model->getPost($id);

        // Verifica se o post foi encontrado
        if ($post) {

            // Chame o método getTagsPost para obter as tags associadas ao post
            $tags = $posts_model->getTagsPost($id);

            //set template
            $template = 'post';

            //set page data
            $data['view'] = '';
            $data['title'] = $post['titulo'] . ' | Gabriela Castro Psicóloga';
            $data['description'] = '';
            $data['styles'] = array('blog');
            $data['scripts_head'] = array('');
            $data['scripts_body'] = array('message-button', 'scroll-invisible', 'fade-img', 'fade-in-slide-up');

            // Adicione o post recuperado aos dados da página
            $data['post'] = $post;

            // Adicione o caminho do arquivo de conteúdo HTML aos dados da página
            $data['conteudo_html'] = "./posts/post{$id}.html";

            // Adicione as tags recuperadas aos dados da página
            $data['tags'] = !empty($tags) ? $tags : [];

            //load view
            $this->loadTemplates($template, $data);
        } else {
            // Se o post não for encontrado, redirecione ou exiba uma mensagem de erro
            // Por exemplo:
            // header("Location: URL_DE_REDIRECIONAMENTO");
            echo "Post não encontrado.";
        }
    }
}
