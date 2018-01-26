<?php
/**
 * Created by PhpStorm.
 * User: Axelle
 * Date: 25/01/2018
 * Time: 17:24
 */
?>
<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="title" content="404" />
        <style>

            @font-face {
                font-family: "bold";
                src: url('assets/fonts/bold.otf');
            }

            @font-face {
                font-family: "font";
                src: url('assets/fonts/BL.ttf');
            }

            body {
                color:black;
                background-color:white;
                background-image:url(assets/img/projets4_404R.png);
                background-size: 100%;
                background-attachment: fixed;
                background-position: center;
            }

            .text{
                width: 100%;
                text-align:center;
                color:#FFFFFF;

            }

            .title{
                margin-top: 5%;
                font-family: 'bold', sans-serif;
                letter-spacing: 3px;

            }

            p{
                font-size: xx-large;
                margin-top: 2%;
                font-family: 'font', sans-serif;

            }

            .btn {
                margin-top: 10%;
                border-radius: 2em;
                font-family: 'bold';
                letter-spacing: 2px;
                display:block;
                width:12%;
                height: 30px;
                background-color:#B175D9;
                border-color:#B175D9;
                color:#FFFFFF;

            }

        </style>
    </head>

    <body>

        <h1 class="title text"> OOPS </h1>

        <span class="text">
            <p>Vous vous êtes égarés dans l'espace ?</p>
        </span>

        <center><button type="button" class="btn">Rentrez vite !</button></center>

    </body>
</html>