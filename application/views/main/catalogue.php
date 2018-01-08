<?php
$data["title"]="catalogue";
$this->load->view('utilities/page_head',$data);
?>


<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">
                <li><a href="sass.html"><i class="material-icons left">people</i>Connexion</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">

        <div class="col s3">
            <br>
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">search</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Titre</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">people</i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Auteur</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="col s9">
            <div class="row">
            <div class="card col s3">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="assets/img/p1.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Harry Potter</span>
                    <p><a href="#">Détails</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>
    </div>
</div>



<?php

$this->load->view('utilities/page_footer');
?>
