<?php

$data['env'] = 'nonlog';
$data['title'] = 'Connexion';

$this->load->view('utilities/page_head', $data);
$this->load->view('utilities/page_nav', $data);
?>

<div class="container">
    <div class="row">
        <br><br><br><br><br>

        <form method="post" action="connect">

            <div class="col s12 center red-text"><h2>Connectez vous !</h2></div>
            <div class="col s6"><input class="red-text lighten-2" type="text" name="login" placeholder="Identifiant" required></div>
            <div class="col s6"><input class="red-text lighten-2" type="password" name="pwd" placeholder="Mot de passe" required></div>
    </div>
            <div class="row">
            <div class="col offset-s5">
                <button class="btn waves-effect waves-light red lighten-3 " type="submit" name="login_btn">Connexion<i class="material-icons right">send</i></button>
            </div>
        </form>
    </div>


<?php $this->load->view('utilities/page_footer'); ?>
