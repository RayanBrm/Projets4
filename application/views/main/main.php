<?php

$data['env'] = 'log';
$data['title'] = 'Accueil';
$data['outdated'] = $outdated;

$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);
?>

<h1 id="identifiant">Bienvenue <?= $_SESSION['user']['prenom'] ?> !</h1>

<?php
    $data['books'] = $books;
    $data['currentPage'] = $currentPage;
    $data['maxPage'] = $maxPage;
    $data['mainThemes'] = $mainThemes;
    $data['secondaryThemes'] = $secondaryThemes;

    $this->load->view('utilities/catalog_module',$data);

    $data['load'] = array('ajax','jquery.min','materialize.min','chips','catalogue');
    $this->load->view('utilities/page_footer',$data);
?>

