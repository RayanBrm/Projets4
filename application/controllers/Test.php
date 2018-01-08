<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 08/01/18
 * Time: 13:44
 */

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

        $data['report']['test'] = $this->test();

        $data['PassedTest'] = $this->testPassed;
        $data['NumberOfTest'] = $this->testNB;

        $this->load->view('test/display',$data);
    }

    private function test()
    {
        $result = array();          // List of report from this test unit
        $expected_foo = "0";  // expected result for method named firstTest
        $expected_bar = "1";

        // Method to test return : $this->model_name_to_test->method_to_test();
        $obtained = "0";
        // Run the test and assign resulted report into data array
        $result['first']['foo'] = $this->unit->run($obtained,$expected_foo,'test->foo');

        $obtained = "0";
        $result['first']['bar'] = $this->unit->run($obtained,$expected_bar,'test->bar');

        foreach ($result['first'] as $test){
            if (strpos($test,"Passed")){
                $this->testPassed++;
            }
            $this->testNB++;
        }

        return $result;
    }

}