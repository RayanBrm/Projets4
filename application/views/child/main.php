<?php


$data['title'] = $_SESSION['child']['prenom'].' '.$_SESSION['child']['nom'];
$data['env'] = 'childlog';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav');

dump($_SESSION);


$this->load->view('utilities/page_footer');