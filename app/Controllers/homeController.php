<?php

Class homeController extends Controller {

    public function index() {

        //set template
        $template = 'home';

        //set page data
        $data['view'] = '';
        $data['title'] = 'Gabriela Castro | Psicóloga';
        $data['description'] = 'Ajudo jovens e adultos a viverem uma vida mais saudável e funcional, entendendo melhor seus pensamentos, emoções e comportamentos.';
        $data['styles'] = array('');
        $data['scripts_head'] = array('accordion-pre-set');
        $data['scripts_body'] = array('message-button', 'toggle-menu', 'scroll-invisible', 'scroll-to-section' ,'fade-img', 'fade-in-slide-up', 'accordion');

        //load view
        $this->loadTemplates($template, $data);

    }

}