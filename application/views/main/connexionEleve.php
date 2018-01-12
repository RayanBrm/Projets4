<?php

$data['title'] = 'connexionEleve';
$data['env'] = 'log';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav', $data);

echo includeAJAX();
echo "<script type=\"text/javascript\" src=\"".base_url().'assets/js/connexionEleve.js'."\"></script>";
?>


<div class="container">


    <div class="row">
        <div class="col s3">
            <br>
            <br>
            <br>
            <br>

            <div class="input-field col s12">
                <i class="material-icons prefix red-text">grade</i>
                <select id="classe_select" onchange="updateChild()">
                    <option value="0" selected>Tous les élèves</option>
                    <?= $classes ?>
                </select>
            </div>

        </div>

        <div id="classe_container" class="col s9">
        <?= $childs ?>
    </div>
</div>

<?php
    $data['load'] = array('jquery.min','materialize.min','select','connexionEleve');
    $this->load->view('utilities/page_footer',$data);
?>


