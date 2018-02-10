<?php
$data['title'] = 'Gestion global de l\'application';
$data['env'] = 'log';

$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);

$words = array('SCISSOR','PAPER','ROCKS');

?>

<div class="container">
    <h1>IT WORKS, <?= $words[array_rand($words)] ?></h1>

    <div class="col s8 dd" id="nestable">
        <ol class="dd-list rootList">

            <li class="dd-item" data-id="class_1">
                <div class="dd-handle">CP1</div>
                <ol class="dd-list">
                    <li class="dd-item" data-id="child_4"><div class="dd-handle">Eleve 1</div></li>
                </ol>
            </li>

            <li class="dd-item" data-id="class_2">
                <div class="dd-handle">CE1</div>
                <ol>
                    <li class="dd-item" data-id="child_3"><div class="dd-handle">Eleve 2</div></li>
                </ol>
            </li>
        </ol>
    </div>

    <div class="col s8 dd" id="nestable2">
        <ol class="dd-list">
            Eleves non assignées
            <li class="dd-item" data-id="child_5"><div class="dd-handle">Eleve 3</div></li>
            <li class="dd-item" data-id="child_3434"><div class="dd-handle">Eleve 4</div></li>
        </ol>
    </div>

    <div class="col">
        <button class="btn waves-effect waves-light red lighten-3 " onclick="verifier()" type="button" name="action">Verifier
            <!--        <i class="material-icons rigth ">send</i>-->
        </button>
    </div>

</div>


<?php

$data['load'] = array('jquery.min','materialize.min','jquery.ui.min','nestable','gestionglobal');
$this->load->view('utilities/page_footer',$data);
