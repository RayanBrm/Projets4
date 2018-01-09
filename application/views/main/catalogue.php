<?php
    $data["title"] = "Catalogue";
    $data['env'] = 'nonlog';
    $this->load->view('utilities/page_head', $data);
    $this->load->view('utilities/page_nav');

    echo $ajax;
    echo $script;

    $data['books'] = $books;
    $this->load->view('utilities/catalog_module',$data);


    $data['jquery'] = includeJQUERY();
    $data['chips'] = '<script src="'.base_url().'assets/js/chips.js" type="text/javascript"></script>';
    $this->load->view('utilities/page_footer',$data);
?>
