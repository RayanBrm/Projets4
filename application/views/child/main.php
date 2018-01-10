<?php


$data['title'] = $_SESSION['child']['prenom'].' '.$_SESSION['child']['nom'];
$this->load->view('utilities/page_head',$data);

dump($_SESSION);

$this->load->view('utilities/page_footer');