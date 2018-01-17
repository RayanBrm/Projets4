<?php
$data['title'] = 'Modifier - '.$user['identifiant'];
$data['env'] = 'log';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);
?>

<div class="container">
    <h1>Modifier <?= $user['identifiant'] ?></h1>
</div>

<?php

$data['load'] = array('jquery.min','materialize.min');
$this->load->view('utilities/page_footer',$data);