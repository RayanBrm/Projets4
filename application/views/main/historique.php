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
            <div class="col s12">

            </div>
    </div>
    <div class="col s9">
        <div class="container">
            <div class="row">
                <h1 class="center red-text">Historique</h1>
                <br>
                <ul id="emprunt_container" class="collapsible" data-collapsible="accordion">
                   <?= $emprunts ?>
                </ul>
            </div>

<?php
    $data['load'] = array('jquery.min','materialize.min','ajax','historique','select');
    $this->load->view('utilities/page_footer',$data);
?>

