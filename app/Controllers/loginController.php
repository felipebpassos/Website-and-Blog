<?php

Class loginController extends Controller {

    
    // Generates the log-in page
    public function index() {

        //set template
        $template = 'login';

        //set page data
        $data['view'] = '';
        $data['title'] = 'Login | Gabriela Castro Psicóloga ';
        $data['description'] = '';
        $data['styles'] = array('login');
        $data['scripts_head'] = array('');
        $data['scripts_body'] = array('scroll-invisible', 'fade-img', 'fade-in-slide-up');

        //load view
        $this->loadTemplates($template, $data);

    }

    public function process() {
        // Verifique se os dados do formulário foram enviados
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtenha os dados do formulário de login
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // Verifique se o nome de usuário e a senha correspondem ao usuário padrão
            if ($username === 'admin' && $password === '1234') {
                // Login bem-sucedido, redirecione para a página inicial do usuário
                session_start();
                
                $_SESSION['name'] = 'Gabi';
                header('Location: http://localhost/gabi/editor');
                exit;
            } else {
                // Login falhou, redirecione de volta para a página de login com uma mensagem de erro
                header('Location: http://localhost/gabi/login?error=1');
                exit;
            }
        } else {
            // Se os dados do formulário não foram enviados via POST, redirecione de volta para a página de login
            header('Location: http://localhost/gabi/login');
            exit;
        }
    }

    public function logout() {
        // Inicia a sessão se ainda não estiver iniciada
        session_start();
    
        // Se você deseja destruir completamente a sessão, descomente a linha abaixo
        session_destroy();
    
        // Redireciona o usuário para a página de login
        header('Location: http://localhost/gabi/login');
        exit;
    }
    

}
