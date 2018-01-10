        <footer> © 2018 Copyright Holder All Rights Reserved. Axelle Delomez, Guillaume Marmorat, Rayan Barama, Emile Canac. Projet de DUT <!-- <a class="ml" href="">Mentions légales</a> --></footer>
<!--        <footer class="page-footer">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="footer-copyright">-->
<!--                <div class="container">-->
<!--                    Copyright © 2018 Holder All Rights Reserved. Axelle Delomez, Guillaume Marmorat, Rayan Barama, Emile Canac. Projet de DUT Informatique 2018.-->
<!--                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </footer>-->

        <?php

            if (isset($jquery)){
                echo $jquery;
            }

            echo "<script type=\"text/javascript\" src=\"".base_url().'assets/js/materialize.min.js'."\"></script>";

            if (isset($chips)){
                echo $chips;
            }

            echo "<script type=\"text/javascript\" src=\"".base_url().'assets/js/select.js'."\"></script>";

        ?>

    </body>
</html>

