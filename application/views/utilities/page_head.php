<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Base Tags -->
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="author" content="Axelle Delomez, Guillaume Marmorat, Rayan Barama, Emile Canac">
    <meta name="description" content="Application de gestion de bibliotheque." />
    <link rel="icon" type="image/png" href="<?= base_url().'assets/img/icon.png' ?>">

    <!-- Media -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--Import Materialize Icon Font-->
    <link rel="stylesheet" href="<?= base_url().'assets/css/materialIcon.css' ?>" >
    <!-- Stylesheet -->
    <?php
        if(isset($env) && $env !== 'test'){
            echo '<link rel="stylesheet" type="text/css" href="'.base_url().'assets/css/materialize.min.css">';
            echo '<link rel="stylesheet" type="text/css" href="'.base_url().'assets/css/main.css">';
            echo '<script src="../../../assets/js/constants.js" async></script>';
        }
    ?>
</head>
  <main>
    <body>
