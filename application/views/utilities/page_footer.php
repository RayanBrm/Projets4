</main>
<footer class="center red-text lighten-2"> © 2018 Copyright Holder All Rights Reserved. Axelle Delomez, Guillaume Marmorat, Rayan Barama, Emile Canac. Projet de DUT <!-- <a class="ml" href="">Mentions légales</a> --></footer>
        <?php
            if (isset($load)){
                foreach ($load as $module){
                    echo "<script type=\"text/javascript\" src=\"".base_url().'assets/js/'.$module.'.js'."\"></script>";
                }
            }
        ?>

    </body>
</html>

