<?php
$data['title'] = 'Administration';
$data['env'] = 'log';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);
?>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Attention!</h4>
            <blockquote id="modal_container_1"></blockquote>
        </div>
        <div class="modal-footer">
            <a href="#" onclick="agreeLivre()"
               class="modal-action modal-close waves-effect waves-green btn-flat">Continuer</a>
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4>Attention!</h4>
            <blockquote id="modal_container_2"></blockquote>
        </div>
        <div class="modal-footer">
            <a href="#" onclick="agreeUtil()"
               class="modal-action modal-close waves-effect waves-green btn-flat">Continuer</a>
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div>

    <div id="modal3" class="modal">
        <div class="modal-content">
            <h4>Attention!</h4>
            <blockquote id="modal_container_3"></blockquote>
        </div>
        <div class="modal-footer">
            <a href="#" onclick="agreeClasse()"
               class="modal-action modal-close waves-effect waves-green btn-flat">Continuer</a>
            <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
        </div>
    </div>

<div class="container">
    <h2>Administration globale de la bibliothèque</h2>
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col"><a href="#livre_menu">Gestion des livres</a></li>
                <li class="tab col"><a href="#util_menu">Gestion utilisateur</a></li>
                <li class="tab col"><a href="#eleve_menu">Gestion élève</a></li>
                <li class="tab col"><a href="#classe_menu">Gestion des classes</a></li>
                <li class="tab col"><a href="#theme_menu">Gestion des thèmes</a></li>
            </ul>
        </div>
<?php
//  Gestion livres
    $this->load->view('modules/gestionlivre');
//  Gestion utilisateurs
    $this->load->view('modules/gestionutil');
//  Gestion eleves
    $this->load->view('modules/gestioneleve');
//  Gestion classe
    $this->load->view('modules/gestionclasse');
//  Gestion theme
    $this->load->view('modules/gestiontheme');
?>
    </div>
</div>
<?php
$data['load'] = array('jquery.min','materialize.min','ajax','autocomplete','administration','gestionbu','gestionutil','gestionglobal','gestiontheme');
$this->load->view('utilities/page_footer',$data);
