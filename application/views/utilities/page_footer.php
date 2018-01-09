        <footer>Copyright (c) 2018 Copyright Holder All Rights Reserved. Axelle Delomez, Guillaume Marmorat, Rayan Barama, Emile Canac. Projet de DUT <!-- <a class="ml" href="">Mentions légales</a> --></footer>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?= base_url().'assets/js/materialize.min.js' ?>"></script>
        <script>
            $(document).ready(function() {
                $('select').material_select();
            });

            $('.chips').material_chip();

            $('.chips-placeholder').material_chip({
                placeholder: 'Mot-clé',
                secondaryPlaceholder: '+Un autre ?',
            });
        </script>
    </body>
</html>

