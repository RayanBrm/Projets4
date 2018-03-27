<?php
$data['title'] = 'Historique';
$data['env'] = 'log';
$data['outdated'] = $outdated;
$this->load->view('utilities/page_head', $data);
$this->load->view('utilities/page_nav', $data);

if ($outdated){
    echo '<script>var outdated = true</script>';
} else{
    echo '<script>var outdated = false</script>';
}
?>

<div class="row">

    <div class="col s3">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a class="waves-effect waves-light btn-large tooltipped buttonA " href="historique" data-position="bottom" data-delay="50" data-tooltip="Acceder a mon historique">Mon historique</a>
        <a id="retard" class="waves-effect waves-light btn-large tooltipped" href="#" data-position="bottom" data-delay="50" data-tooltip="Voir les emprunts en retard">Emprunt en retard</a>
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
                <a class="waves-effect waves-light btn tooltipped buttonA" onclick="returnAllCurrent()" data-position="bottom" data-delay="50" data-tooltip="Rendre tous les livres selectionner">rendre tout</a>
                <a class="waves-effect waves-light btn tooltipped buttonA" onclick="returnAllChecked()" data-position="bottom" data-delay="50" data-tooltip="Rendre tous les livres en cours d'emprunt ici">rendre la selection</a>
            </div>
    </div>
    <div class="col s9">
        <div class="container">
            <div class="row">
                <h2 class="center titleA">Historique</h2>
                <br>
                <ul id="emprunt_container" class="collapsible" data-collapsible="accordion">
                   <?= $emprunts ?>
                </ul>
            </div>

<?php
    $data['load'] = array('jquery.min','materialize.min','ajax','historique','select');
    $this->load->view('utilities/page_footer',$data);
?>

