<?php
$data['title'] = 'Gestion des themes de l\'application';
$data['env'] = 'log';

$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);
?>

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header">
                <i class="material-icons">add</i>
                Ajouter un thème
            </div>
            <div class="collapsible-body">
                <form id="book_form">
                    <!--        Theme-->
                    <div class="row">
                        <div class="input-field col s6">
                            <label class="red-text ligthen-2" for="theme">Nom du thème</label>
                            <input type="text" id="theme">
                        </div>
                        <div class="input-field col s6">
                            <select id="themeType">
                                <option value="main_">Theme principal</option>
                                <option value="" selected>Theme secondaire</option>
                            </select>
                            <label for="themeType">Type de theme</label>
                        </div>
                    </div>
                    <!--        Save button-->
                    <button class="btn waves-effect waves-light red lighten-3 " type="button" id="themeBtnAdd" name="save">Enregistrer
                        <i class="material-icons rigth ">save</i>
                    </button>
                </form>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <i class="material-icons">library_books</i>
                Modifier les affectations
            </div>
            <div class="collapsible-body">

            </div>
        </li>
    </ul>
</div>

<?php

$data['load'] = array('ajax','jquery.min','materialize.min', 'gestiontheme');
$this->load->view('utilities/page_footer',$data);

?>