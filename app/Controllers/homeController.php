<?php

Class homeController extends Controller {

    public function index() {

        //set template
        $template = 'home';

        //set page data
        $data['view'] = '';
        $data['title'] = 'Gabriela Castro | Psicóloga';
        $data['description'] = '';
        $data['styles'] = array('');
        $data['scripts_head'] = array('accordion-pre-set');
        $data['scripts_body'] = array('message-button', 'scroll-invisible', 'scroll-to-section' ,'fade-img', 'fade-in-slide-up', 'accordion');

        //load view
        $this->loadTemplates($template, $data);

    }

}