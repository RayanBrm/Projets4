        <footer>Copyright (c) 2018 Copyright Holder All Rights Reserved. Axelle Delomez, Guillaume Marmorat, Rayan Barama, Emile Canac. Projet de DUT <!-- <a class="ml" href="">Mentions légales</a> --></footer>
        <?php

            if (isset($jquery)){
                echo $jquery;
            }

            echo "<script type=\"text/javascript\" src=\"".base_url().'assets/js/materialize.min.js'."\"></script>";

            if (isset($chips)){
                echo $chips;
            }

        ?>

    </body>
</html>

