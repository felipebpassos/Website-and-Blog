<?php

Class loginController extends Controller {

    
    // Generates the log-in page
    public function index() {

        //set template
        $template = 'login-temp';

        //set page data
        $pageData = [
            'view' => 'login',
            'title' => 'Login',
            'description' => 'Faça login e comece agora mesmo seu curso.',
            'styles' => 'login'
        ];

        //load view
        $this->loadTemplates($template, $pageData);

    }

}

?>