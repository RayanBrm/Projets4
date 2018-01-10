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
                <select>
                    <option value="" disabled selected>Classe</option>
                    <option value="1">CM2A</option>
                    <option value="2">CPE(lol)</option>
                    <option value="3">CM11</option>
                </select>
            </div>
            <br>
            <br>
            <div class="input-field col s12">
                <i class="material-icons prefix red-text">face</i>
                <select>
                    <option value="" disabled selected>Elève</option>
                    <option value="1">Jillome</option>
                    <option value="2">J L'homme</option>
                    <option value="3">Ji Ohm</option>
                </select>
            </div>
    </div>
    <div class="col s9">
        <div  <class="container">
            <div class="row">
                <h1 class="center red-text">Historique</h1>
                <br>
                <ul class="collapsible" data-collapsible="accordion">
                   <li class="collection-header center"><h4>Emprunt de Bernard Tupion</h4></li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">book</i>Bidule Tome 1</div>
                        <div class="collapsible-body">
                            <span>
                                Détail de l'emprunt
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">book</i>Truc Tome 2</div>
                        <div class="collapsible-body"><span>Détail de l'emprunt</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">book</i>Putput Tome 3 </div>
                        <div class="collapsible-body"><span>Détail de l'emprunt</span></div>
                    </li>
                </ul>
            </div>


            <?php
            $data['jquery']=includeJQUERY();
            $this->load->view('utilities/page_footer',$data); ?>

