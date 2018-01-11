<?php
    $data['title'] = $_SESSION['child']['prenom'].' '.$_SESSION['child']['nom'];
    $data['env'] = 'childlog';
    $this->load->view('utilities/page_head',$data);
    $this->load->view('utilities/page_nav');

    $data['books'] = $books;
    $this->load->view('utilities/catalog_module',$data);

    $data['load'] = array('ajax','jquery.min','materialize.min','chips','catalogue');
    $this->load->view('utilities/page_footer',$data);