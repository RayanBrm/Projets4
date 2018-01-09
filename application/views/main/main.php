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

    $data['jquery'] = includeJQUERY();
    $data['chips'] = '<script src="'.base_url().'assets/js/chips.js" type="text/javascript"></script>';
    $this->load->view('utilities/page_footer',$data);
?>

