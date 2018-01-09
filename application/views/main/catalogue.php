<?php
$data["title"] = "catalogue";
$this->load->view('utilities/page_head', $data);
$this->load->view('utilities/page_nav');

echo $ajax;
echo $script;
?>


<div class="row">
    <div class="col s3">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">search</i>
                    <input name="search" id="search" type="text" class="validate pink-text" onchange="rechercher()">
                    <label for="search">Rechercher</label>
                </div>
            </div>
        </form>
    </div>
    <div class="col s9">
        <div id="container" class="container">
            <div class="row">
                <h1 class="center">Catalogue</h1>
                <br>
                <div class="card col s3">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/img/p1.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Harry Potter</span>
                        <p><a href="#">Détails</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Harry Potter<i class="material-icons right">close</i></span>
                        <p><ul class="pink-text">
                            <li>Auteur : blabla</li>
                            <li>Genre : blablablabla</li>
                        </ul></p>
                    </div>
                </div>
                <div class="card col s3">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/img/b1.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Babar</span>
                        <p><a href="#">Détails</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Babar<i class="material-icons right">close</i></span>
                        <p><ul class="pink-text">
                            <li>Auteur : blabla</li>
                            <li>Genre : blablablabla</li>
                        </ul></p>
                    </div>
                </div>
                <div class="card col s3">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/img/o1.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Oui-Oui</span>
                        <p><a href="#">Détails</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Oui-Oui<i
                                    class="material-icons right">close</i></span>
                        <p><ul class="pink-text">
                            <li>Auteur : blabla</li>
                            <li>Genre : blablablabla</li>
                        </ul></p>
                    </div>
                </div>
                <div class="card col s3">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/img/o1.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Oui-Oui</span>
                        <p><a href="#">Détails</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Oui-Oui<i
                                    class="material-icons right">close</i></span>
                        <p><ul class="pink-text">
                            <li>Auteur : blabla</li>
                            <li>Genre : blablablabla</li>
                        </ul></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="container">
    <br>
    <div class="row">

        <div class="col s3 " >
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
            <br>

            <div class="row">
                <h1 class="center">Catalogue</h1>
                <br>
                <div class="card col s3">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/img/p1.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Harry Potter</span>
                        <p><a href="#">Détails</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Harry Potter<i class="material-icons right">close</i></span>
                        <p><ul class="pink-text">
                            <li>Auteur : blabla</li>
                            <li>Genre : blablablabla</li>
                        </ul></p>
                    </div>
                </div>
                <div class="card col s3">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/img/b1.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Babar</span>
                        <p><a href="#">Détails</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Babar<i class="material-icons right">close</i></span>
                        <p><ul class="pink-text">
                            <li>Auteur : blabla</li>
                            <li>Genre : blablablabla</li>
                        </ul></p>
                    </div>
                </div>
                <div class="card col s3">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/img/o1.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Oui-Oui</span>
                        <p><a href="#">Détails</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Oui-Oui<i
                                    class="material-icons right">close</i></span>
                        <p><ul class="pink-text">
                            <li>Auteur : blabla</li>
                            <li>Genre : blablablabla</li>
                        </ul></p>
                    </div>
                </div>
                <div class="card col s3">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/img/t1.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Titeuf</span>
                        <p><a href="#">Détails</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Titeuf<i class="material-icons right">close</i></span>
                        <p><ul class="pink-text">
                            <li>Auteur : blabla</li>
                            <li>Genre : blablablabla</li>
                        </ul></p>
                    </div>
                </div>
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
                            <span class="card-title grey-text text-darken-4">Harry Potter<i
                                        class="material-icons right">close</i></span>
                            <p><ul class="pink-text">
                                <li>Auteur : blabla</li>
                                <li>Genre : blablablabla</li>
                            </ul></p>
                        </div>
                    </div>
                    <div class="card col s3">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="assets/img/b1.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Babar</span>
                            <p><a href="#">Détails</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Babar<i
                                        class="material-icons right">close</i></span>
                            <p><ul class="pink-text">
                                <li>Auteur : blabla</li>
                                <li>Genre : blablablabla</li>
                            </ul></p>
                        </div>
                    </div>
                    <div class="card col s3">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="assets/img/o1.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Oui-Oui</span>
                            <p><a href="#">Détails</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Oui-Oui<i class="material-icons right">close</i></span>
                            <p><ul class="pink-text">
                                <li>Auteur : blabla</li>
                                <li>Genre : blablablabla</li>
                            </ul></p>
                        </div>
                    </div>
                    <div class="card col s3">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="assets/img/t1.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Titeuf</span>
                            <p><a href="#">Détails</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Titeuf<i
                                        class="material-icons right">close</i></span>
                            <p><ul class="pink-text">
                                <li>Auteur : blabla</li>
                                <li>Genre : blablablabla</li>
                            </ul></p>
                        </div>
                    </div>
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
                                <span class="card-title grey-text text-darken-4">Harry Potter<i
                                            class="material-icons right">close</i></span>
                                <p><ul class="pink-text">
                                    <li>Auteur : blabla</li>
                                    <li>Genre : blablablabla</li>
                                </ul></p>
                            </div>
                        </div>
                        <div class="card col s3">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="assets/img/b1.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Babar</span>
                                <p><a href="#">Détails</a></p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Babar<i class="material-icons right">close</i></span>
                                <p><ul class="pink-text">
                                    <li>Auteur : blabla</li>
                                    <li>Genre : blablablabla</li>
                                </ul></p>
                            </div>
                        </div>
                        <div class="card col s3">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="assets/img/o1.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Oui-Oui</span>
                                <p><a href="#">Détails</a></p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Oui-Oui<i class="material-icons right">close</i></span>
                                <p><ul class="pink-text">
                                    <li>Auteur : blabla</li>
                                    <li>Genre : blablablabla</li>
                                </ul></p>
                            </div>
                        </div>
                        <div class="card col s3">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="assets/img/t1.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Titeuf</span>
                                <p><a href="#">Détails</a></p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Titeuf<i class="material-icons right">close</i></span>
                                <p><ul class="pink-text">
                                    <li>Auteur : blabla</li>
                                    <li>Genre : blablablabla</li>
                                </ul></p>
                            </div>
                        </div>

                    </div>
                </div> -->


                <?php

                $this->load->view('utilities/page_footer');
                ?>
