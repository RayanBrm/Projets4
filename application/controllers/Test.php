<?php

class Test extends CI_Controller
{

    private $testNB;
    private $testPassed;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Unit_test');
        $this->load->library('Formatter',null,'format');

        $this->testNB = 0;
        $this->testPassed = 0;
    }

    public function index()
    {
        $data = array();

        // Bug on add or set ?
        //$data['report']['user'] = $this->userTest();
        //$data['report']['livre'] = $this->livreTest();

        $data['PassedTest'] = $this->testPassed;
        $data['NumberOfTest'] = $this->testNB;

        $this->load->view('test/display',$data);
    }

    public function gapi()
    {
        $this->load->view('test/gapi');
    }

    public function aapi()
    {
        $this->load->view('test/gapi');
    }

    public function wapi()
    {
        $this->load->view('test/gapi');
    }

    public function resize()
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = '/home/guillaume/Projets4/assets/img/livres/test.jpeg';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = FALSE;
        $config['width']     = BOOK_PIC_WIDTH;
        $config['height']   = BOOK_PIC_HEIGHT;
        $this->load->library('image_lib',$config);

//        $this->image_lib->clear();
//        $this->image_lib->initialize($config);

        if(!$this->image_lib->resize()){
            dump($this->image_lib);
            $this->image_lib->display_errors('<p>', '</p>');
        }
    }

    public function getImage()
    {
        if (isset($_GET['url'])){
            $img=file_get_contents($_GET['url']);
            file_put_contents(__DIR__.'/../../'.BOOK_PATH.'image',$img);
        }
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
            'description'=>'',
            'disponible'=>null
        );

        $expected_add = array(
            'isbn'=>null,
            'titre'=>'Harry Potter',
            'auteur'=>'J.K. Rowling',
            'edition'=>'Folio Junior',
            'parution'=>'2017-10-12',
            'couverture'=>'assets/img/livres/2.jpg',
            'description'=>'',
            'disponible'=>null
        );

        $expected_set = array(
            'isbn'=>null,
            'titre'=>'Harry Petteur',
            'auteur'=>'J.K. Rowling',
            'edition'=>'Folio Junior',
            'parution'=>'2017-10-12',
            'couverture'=>'assets/img/livres/2.jpg',
            'description'=>'',
            'disponible'=>null
        );

        $expected_del = null;

        $expected_search = array(
            array(
                'id'=>'2',
                'isbn'=>null,
                'titre'=>'Le petit prince',
                'auteur'=>'Antoine de Saint-Exupéry',
                'edition'=>'Gallimard',
                'parution'=>'2017-10-12',
                'couverture'=>'assets/img/livres/2.jpeg',
                'description'=>'',
                'disponible'=>null
            ),
            array(
                'id'=>'8',
                'isbn'=>null,
                'titre'=>'Le petit Nicolas s amuse',
                'auteur'=>'Sempé / Goscinny',
                'edition'=>'Gallimard',
                'parution'=>'2017-10-12',
                'couverture'=>'assets/img/livres/8.jpg',
                'description'=>'',
                'disponible'=>null
            )
        );

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

        $obtained = $this->livre->search('le petit');
        $result['livre']['search'] = $this->unit->run($obtained,$expected_search,'livre->search');


        foreach ($result['livre'] as $test){
            if (strpos($test,"Passed")){
                $this->testPassed++;
            }
            $this->testNB++;
        }

        return $result;
    }

    private function userTest()
    {
        $result = array();

        $userID = '52';

        $expected_get[0] = array(
            'id'=>'52',
            'identifiant'=>'admin',
            'nom'=>'Jean-Gui',
            'prenom'=>'Ladmin',
            'role'=>'1',
            'motdepasse'=>'$2y$10$yz4DX9ZFBOO.MyCLYdiHp.ctKB8W94vXvz1U7mjVHP4RNSxUNrvoq'
        );

        $expected_stock_user[0] = array(
            'identifiant'=>'jdstock',
            'nom'=>'John',
            'prenom'=>'Doe',
            'role'=>'4'
        );

        $expected_prof_user[0] = array(
            'identifiant'=>'jsprof',
            'nom'=>'John',
            'prenom'=>'Doe',
            'role'=>'2',
        );

        $expected_child_user[0] = array(
            'identifiant'=>'jschild',
            'nom'=>'John',
            'prenom'=>'Doe',
            'role'=>'3',
            'classe'=>'1',
            'pastille'=>'turtle'
        );

        $expected_del = array();

        // ************* Get user test
        $obtained = $this->user->get(array('id'=>$userID));
        $result['user']['get'] = $this->unit->run($obtained,$expected_get,'user->get');

        // ************** Add user test
        $this->user->add($expected_stock_user[0]);
        $obtained = $this->user->get(array('identifiant'=>$expected_stock_user[0]['identifiant']));
        $expected_stock_user[0]['id'] = $obtained[0]['id'];
        $result['user']['add_stock'] = $this->unit->run($obtained,$expected_stock_user,'user->add_stock');

        $this->user->add($expected_prof_user[0]);
        $obtained = $this->user->get(array('identifiant'=>$expected_prof_user[0]['identifiant']));
        $expected_prof_user[0]['id'] = $obtained[0]['id'];
        $expected_prof_user[0]['motdepasse'] = $obtained[0]['motdepasse'];
        $result['user']['add_prof'] = $this->unit->run($obtained,$expected_stock_user,'user->add_prof');

        $this->user->add($expected_child_user[0]);
        $obtained = $this->user->get(array('identifiant'=>$expected_child_user[0]['identifiant']));
        $expected_child_user[0]['id'] = $obtained[0]['id'];
        $expected_child_user[0]['pastille'] = $obtained[0]['pastille'];
        $expected_child_user[0]['classe'] = $obtained[0]['classe'];
        $result['user']['add_child'] = $this->unit->run($obtained,$expected_child_user,'user->add_child');

        // *************** Update user test
        $expected_stock_user_set = $expected_stock_user;
        $expected_stock_user_set[0]['nom'] = 'foo';
        $expected_stock_user_set[0]['prenom'] = 'bar';
        $this->user->set($expected_stock_user_set);
        $obtained = $this->user->get(array('id'=>$expected_stock_user_set[0]['id']));
        $result['user']['set_stock'] = $this->unit->run($obtained,$expected_stock_user_set,'user->set_stock');

        $expected_prof_user_set = $expected_prof_user;
        $expected_prof_user_set[0]['nom'] = 'foo';
        $expected_prof_user_set[0]['prenom'] = 'bar';
        $expected_prof_user_set[0]['motdepasse'] = 'johndoe';
        $this->user->set($expected_prof_user_set);
        $obtained = $this->user->get(array('id'=>$expected_prof_user_set[0]['id']));
        $result['user']['set_prof'] = $this->unit->run($obtained,$expected_prof_user_set,'user->set_prof');

        $expected_child_user_set = $expected_child_user;
        $expected_child_user_set[0]['nom'] = 'foo';
        $expected_child_user_set[0]['prenom'] = 'bar';
        $expected_child_user_set[0]['pastille'] = 'panda';
        $this->user->set($expected_child_user_set);
        $obtained = $this->user->get(array('id'=>$expected_child_user_set[0]['id']));
        $result['user']['set_child'] = $this->unit->run($obtained,$expected_child_user_set,'user->set_child');

        // ***************** Delete
        $this->user->del(array('id'=>$expected_stock_user[0]['id']));
        $obtained = $this->user->get(array('id'=>$expected_stock_user[0]['id']));
        $result['user']['del_stock'] = $this->unit->run($obtained,$expected_del,'user->del_stock');

        $this->user->del(array('id'=>$expected_prof_user[0]['id']));
        $obtained = $this->user->get(array('id'=>$expected_prof_user[0]['id']));
        $result['user']['del_prof'] = $this->unit->run($obtained,$expected_del,'user->del_prof');

        $this->user->del(array('id'=>$expected_child_user[0]['id']));
        $obtained = $this->user->get(array('id'=>$expected_child_user[0]['id']));
        $result['user']['del_child'] = $this->unit->run($obtained,$expected_del,'user->del_child');

        foreach ($result['user'] as $test){
            if (strpos($test,"Passed")){
                $this->testPassed++;
            }
            $this->testNB++;
        }

        return $result;
    }
}