<?php

$data['env'] = 'nonlog';
$data['title'] = 'Connexion';

$this->load->view('utilities/page_head', $data);
$this->load->view('utilities/page_nav', $data);
?>

<form method="post" action="connect">
    <h2>Connectez vous !</h2>
    <input type="text"  name="login" placeholder="Identifiant" required>
    <br>
    <input type="password" name="pwd" placeholder="Mot de passe" required>
    <br>
    <button type="submit" name="login_btn">Connexion</button>
</form>

<?php $this->load->view('utilities/page_footer'); ?>
