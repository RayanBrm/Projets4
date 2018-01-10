<?php

$data['title'] = 'connexionEleve';
$data['env'] = 'child';
$this->load->view('utilities/page_head',$data);
$this->load->view('utilities/page_nav', $data);

?>


<div class="container">


    <div class="row">
        <div class="col s3">
            <br>
            <br>
            <br>
            <br>

            <div class="input-field col s12">
                <i class="material-icons prefix red-text">grade</i>
                <select>
                    <option value="" disabled selected>Classe</option>
                    <option value="1">CM2A</option>
                    <option value="2">CPE(lol)</option>
                    <option value="3">CM11</option>
                </select>
            </div>

        </div>

        <div class="col s9">
            <br>
            <br>
            <br>
            <br>
        <?= $childs ?>
    </div>
</div>

<?php
            $data['jquery']=includeJQUERY();
            $this->load->view('utilities/page_footer',$data); ?>


