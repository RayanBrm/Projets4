<?php
$data['title'] = 'Administration';
$data['env'] = 'log';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);

$data['classList'] = $classList;
$data['classeLiList'] = $classeLiList;
$data['childCardList'] = $childCardList;

echo '<script>const ACCESS = "'.$lock.'"</script>';
$access = ($lock == "all")? '' : 'disabled';
$lock_icon = ($lock == "all")? '' : '<i class="material-icons lock_icon">lock</i>';
?>
<!-- Materialize modal for important dialog : before deleting datas,... -->
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
                <li class="tab col"><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ajouter/ Modifier un membre du personnel" href="#util_menu">Personnels</a></li>
                <li class="tab col"><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ajouter/ Modifier un élève" href="#eleve_menu">Élèves</a></li>
                <li class="tab col <?= $access ?>"><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ajouter/ Modifier une classe" href="#classe_menu">Classes<?= $lock_icon ?></a></li>
                <li class="tab col"><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ajouter/ Modifier un livre" href="#livre_menu">Livres</a></li>
                <li class="tab col <?= $access ?>"><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ajouter/ Modifier un thème" href="#theme_menu">Thèmes<?= $lock_icon ?></a></li>
            </ul>
        </div>
<?php
//  Gestion livres
    $this->load->view('modules/gestionlivre',$data);
//  Gestion utilisateurs
    $this->load->view('modules/gestionutil',$data);
//  Gestion eleves
    $this->load->view('modules/gestioneleve',$data);
//  Gestion classe
    $this->load->view('modules/gestionclasse',$data);
//  Gestion theme
    $this->load->view('modules/gestiontheme',$data);
?>
    </div>
</div>
<?php
$data['load'] = array('jquery.min','materialize.min','ajax','autocomplete','administration','gestionbu','gestionutil','gestionglobal','gestiontheme');
$this->load->view('utilities/page_footer',$data);
