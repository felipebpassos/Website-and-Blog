<?php

Class homeController extends Controller {

    public function index() {

        //set template
        $template = 'home';

        //set page data
        $data['view'] = '';
        $data['title'] = 'Home';
        $data['description'] = '';
        $data['styles'] = array('');
        $data['scripts_head'] = array('');
        $data['scripts_body'] = array('scroll-invisible', 'fade-img', 'fade-in-slide-up');

        //load view
        $this->loadTemplates($template, $data);

    }

}

?>