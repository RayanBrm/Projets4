<?php

class Test extends CI_Controller
{

    private $testNB;
    private $testPassed;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Unit_test');
        $this->testNB = 0;
        $this->testPassed = 0;
    }

    public function index()
    {
        $data = array();
        dump($this->emprunt->getRunning(array('id_eleve'=>'5')));
        //$data['report']['livre'] = $this->livreTest();

        $data['PassedTest'] = $this->testPassed;
        $data['NumberOfTest'] = $this->testNB;

        $this->load->view('test/display',$data);
    }

    private function livreTest()
    {
        $result = array();

        $livre_id = '1';

        $expected_get[0] = array(
            'id'=>'1',
            'isbn'=>null,
            'titre'=>'Harry Potter et la chambre des secrets',
            'auteur'=>'J.K. Rowling',
            'edition'=>'Folio Junior',
            'parution'=>'2017-10-12',
            'couverture'=>'assets/img/livres/1.jpg',
            'description'=>''
        );

        $expected_add = array(
            'isbn'=>null,
            'titre'=>'Harry Potter',
            'auteur'=>'J.K. Rowling',
            'edition'=>'Folio Junior',
            'parution'=>'2017-10-12',
            'couverture'=>'assets/img/livres/2.jpg',
            'description'=>''
        );

        $expected_set = array(
            'isbn'=>null,
            'titre'=>'Harry Petteur',
            'auteur'=>'J.K. Rowling',
            'edition'=>'Folio Junior',
            'parution'=>'2017-10-12',
            'couverture'=>'assets/img/livres/2.jpg',
            'description'=>''
        );

        $expected_del = null;

        $obtained = $this->livre->get(array('id'=>$livre_id));
        $result['livre']['get'] = $this->unit->run($obtained,$expected_get,'livre->get');

        $this->livre->add($expected_add);
        $obtained = $this->livre->get(array('titre'=>$expected_add['titre']))[0];
        $expected_add['id'] = $obtained['id'];
        $result['livre']['add'] = $this->unit->run($obtained,$expected_add, 'livre->add');

        $expected_set['id'] = $obtained['id'];
        $this->livre->set($expected_set);
        $obtained = $this->livre->get(array('id'=>$expected_set['id']))[0];
        $result['livre']['set'] = $this->unit->run($obtained,$expected_set,'livre->set');

        $this->livre->del(array('id'=>$expected_set['id']));
        $obtained = $this->livre->get(array('id'=>$expected_set['id']));
        $result['livre']['del'] = $this->unit->run($obtained,$expected_del,'livre->del');

        foreach ($result['livre'] as $test){
            if (strpos($test,"Passed")){
                $this->testPassed++;
            }
            $this->testNB++;
        }

        return $result;
    }
}