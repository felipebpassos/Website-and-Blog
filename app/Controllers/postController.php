<?php

Class postController extends Controller {

    public function index() {

        //set template
        $template = 'post';

        //set page data
        $data['view'] = '';
        $data['title'] = 'Post';
        $data['description'] = '';
        $data['styles'] = array('');
        $data['scripts_head'] = array('');
        $data['scripts_body'] = array('scroll-invisible', 'fade-img', 'fade-in-slide-up');

        //load view
        $this->loadTemplates($template, $data);

    }

}