<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('breakfastModel');
    }

    public function index()
    {
        $id = $_POST["id"];
        //echo "Hello".$id;
        $response = $this->breakfastModel->ajaxAction($id);
        echo $response;
    }
}
?>