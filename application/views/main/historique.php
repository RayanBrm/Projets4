<?php
$data['title'] = 'Historique';
$this->load->view('utilities/page_head');
$this->load->view('utilities/page_nav');

?>

<div class="row">
    <div class="col s3">
        <br>
        <bt>
            <br>
            <br>
            <bt>
                <br>
                <br>
                <bt>
                    <br>
            <div class="input-field col s12">
                <i class="material-icons prefix light-blue-text">grade</i>
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
                <i class="material-icons prefix light-blue-text">face</i>
                <select>
                    <option value="" disabled selected>Elève</option>
                    <option value="1">Jillome</option>
                    <option value="2">J L'homme</option>
                    <option value="3">Ji Ohm</option>
                </select>
            </div>
    </div>
    <div class="col s9">
        <div id="container" class="container">
            <div class="row">
                <h1 class="center">Historique</h1>
                <br>
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Emprunts Bernard Trudon</h4></li>
                    <li class="collection-item">
                        <div>Bidule Tome 1<a href="#!" class="secondary-content"><i class="material-icons">send</i></a>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div>Truc Tome 2<a href="#!" class="secondary-content"><i class="material-icons">send</i></a>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div>NinjaGo<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div>
                    </li>
                </ul>
            </div>

            <?php $this->load->view('utilities/page_footer'); ?>
