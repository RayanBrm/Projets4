<?php

$data['title'] = 'apitest';
$data['env'] = 'test';
$this->load->view('utilities/page_head',$data);

?>

<div class="row s4">
    <h1>Test de l'api google</h1>
    <input type="text" id="isbn" placeholder="isbn 10/13">
    <button type="button" onclick="test()">Rechercher</button>
    <div id="dump"></div>
</div>

<?php
 $data['load'] = array('jquery.min','ajax','test/test');
 $this->load->view('utilities/page_footer',$data);

