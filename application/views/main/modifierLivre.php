<?php
$data['title'] = 'Modifier - '.$book['titre'];
$data['env'] = 'log';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);
?>

    <div class="container">
        <h1>Modifier <?= $book['titre'] ?></h1>
    </div>

<?php

$data['load'] = array('jquery.min','materialize.min');
$this->load->view('utilities/page_footer',$data);