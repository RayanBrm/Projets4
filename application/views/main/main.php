<?php

$data['env'] = 'log';
$data['title'] = 'Accueuil';

$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);

echo $ajax;
echo $script;
?>

<h1>Bienvenue <?= $_SESSION['user']['identifiant'] ?></h1>

<?php
    $this->load->view('utilities/catalog_module',array('books',$books));

    $data['load'] = array('jquery.min','materialize.min','chips','catalogue');
    $this->load->view('utilities/page_footer',$data);
?>

