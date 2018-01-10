<div class="row">
    <div class="col s3">
        <br>
        <br>
        <br>
        <br>
        <br>
        <form class="col s12">
            <div class="row">
                <div id="catalogue_container" class="input-field col s12">
                    <i id="search" class="material-icons prefix">search</i>
                    <div class="chips-placeholder" onchange="rechercher()"></div>
                </div>
            </div>
        </form>
    </div>
    <div class="col s9">
        <div id="containerX" class="container">
            <?= $books ?>

            <!--            <div class="card col s3">-->
            <!--                <div class="card-image waves-effect waves-block waves-light">-->
            <!--                    <img class="activator" src="assets/img/p1.jpg">-->
            <!--                </div>-->
            <!--                <div class="card-content">-->
            <!--                    <span class="card-title activator grey-text text-darken-4">Harry Potter</span>-->
            <!--                    <p><a href="#">Détails</a></p>-->
            <!--                </div>-->
            <!--                <div class="card-reveal">-->
            <!--                    <span class="card-title grey-text text-darken-4">Harry Potter<i class="material-icons right">close</i></span>-->
            <!--                    <p><ul class="pink-text">-->
            <!--                        <li>Auteur : blabla</li>-->
            <!--                        <li>Genre : blablablabla</li>-->
            <!--                    </ul></p>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </div>
</div>
