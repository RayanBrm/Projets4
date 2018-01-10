<?php
$data['title'] = 'Historique';
$data['env'] = 'log';
$this->load->view('utilities/page_head', $data);
$this->load->view('utilities/page_nav', $data);

?>

<div class="row">

    <div class="col s3">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
            <div class="input-field col s12">
                <i class="material-icons prefix red-text">grade</i>
                <select id="classe_select" onchange="multiLoad()">
                    <option value="" disabled selected>Classe</option>
                    <?= $classes ?>
                </select>
            </div>
            <br>
            <br>
            <div class="input-field col s12">
                <i class="material-icons prefix red-text">face</i>
                <select id="child_select" onchange="loadEmprunt()">
                    <option value="" disabled selected>Elève</option>
                </select>
            </div>
    </div>
    <div class="col s9">
        <div class="container">
            <div class="row">
                <h1 class="center red-text">Historique</h1>
                <br>
                <ul id="emprunt_container" class="collapsible" data-collapsible="accordion">
                   <li class="collection-header center"><h4>Emprunt de Bernard Tupion</h4></li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">book</i>Bidule Tome 1</div>
                        <div class="collapsible-body"><span>Détail de l'emprunt</span>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header green lighten-1"><i class="material-icons">book</i>Truc Tome 2</div>
                        <div class="collapsible-body">
                            <span>
                                Détail de l'emprunt
                                <p>
                                     <input type="checkbox" id="test5" />
                                    <label for="test5">Red</label>
                                </p>
                            </span>
                            </div>
                    </li>
                    <li>
                        <div class="collapsible-header green lighten-1"><i class="material-icons">book</i>Putput Tome 3 </div>
                        <div class="collapsible-body"><span>Détail de l'emprunt</span></div>
                    </li>
                </ul>
            </div>


            <?php
            echo includeJQUERY();
            echo includeAJAX();
            echo "<script type=\"text/javascript\" src=\"".base_url().'assets/js/historique.js'."\"></script>";
            $this->load->view('utilities/page_footer',$data); ?>

