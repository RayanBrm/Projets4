<?php
$data['title'] = 'Gestion des themes de l\'application';
$data['env'] = 'log';

$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav',$data);
?>

    <div class="container">

        <div class="col s8 dd" id="nestable">
            <ol class="dd-list rootList">

                <li class="dd-item" data-id="class_1">
                    <div class="dd-handle">Thème 1</div>
                    <ol class="dd-list">
                        <li class="dd-item" data-id="child_4"><div class="dd-handle">livre 1</div></li>
                    </ol>
                    <ol class="dd-list">
                        <li class="dd-item" data-id="child_4"><div class="dd-handle">livre 2</div></li>
                    </ol>
                    <ol class="dd-list">
                        <li class="dd-item" data-id="child_4"><div class="dd-handle">livre 3</div></li>
                    </ol>
                </li>

                <li class="dd-item" data-id="class_2">
                    <div class="dd-handle">Thème 2</div>
                    <ol>
                        <li class="dd-item" data-id="child_3"><div class="dd-handle">livre 1</div></li>
                    </ol>
                    <ol>
                        <li class="dd-item" data-id="child_3"><div class="dd-handle">livre 2</div></li>
                    </ol>
                    <ol>
                        <li class="dd-item" data-id="child_3"><div class="dd-handle">livre 3</div></li>
                    </ol>
                </li>
            </ol>
        </div>

        <div class="col s8 dd" id="nestable2">
            <ol class="dd-list">
                Livres disponibles
                <li class="dd-item" data-id="child_5"><div class="dd-handle">Eleve 3</div></li>
                <li class="dd-item" data-id="child_3434"><div class="dd-handle">Eleve 4</div></li>
            </ol>
        </div>

        <div class="col">
            <button class="btn waves-effect waves-light red lighten-3 " onclick="verifier()" type="button" name="action">Verifier
                <!--        <i class="material-icons rigth ">send</i>-->
            </button>
        </div>

    </div>

<?php
$data['books'] = $books;
$data['currentPage'] = $currentPage;
$data['maxPage'] = $maxPage;

$this->load->view('utilities/catalog_module',$data);

$data['load'] = array('ajax','jquery.min','materialize.min','nestable','chips','catalogue');
$this->load->view('utilities/page_footer',$data);
?>