<?php
    $data["title"] = "Catalogue";
    $data['env'] = 'nonlog';
    $this->load->view('utilities/page_head', $data);
    $this->load->view('utilities/page_nav');

    echo $ajax;
    echo $script;

    $data['books'] = $books;
    $this->load->view('utilities/catalog_module',$data);

    $data['load'] = array('jquery.min','materialize.min','chips','catalogue');
    $this->load->view('utilities/page_footer',$data);
?>
