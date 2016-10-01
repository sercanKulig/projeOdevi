<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class breakfast extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('breakfastModel');
    }

    public function index()
    {

        //parse
        $url = "http://hydtech.net23.net/breakfast.xml";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        curl_close($ch);

        $xml = simplexml_load_string($data);

        //save
        foreach ($xml->food as $food){
            $name = $food->name;
            $price = $food->price;
            $description = $food->description;
            $calories = $food->calories;

            $rowCount = $this->db->get('parsebreakfast')->num_rows();
            if($rowCount <= 14){
                $this->breakfastModel->breakfastCreate($name,$price,$description,$calories);
                $this->breakfastModel->breakfast2Create();
            }
        };

        //pagination
        $this->load->library('pagination');
        $list['base_url'] = base_url().'/index/';
        $list['per_page'] = 5;
        $list['num_links'] = 10;
        $list['total_rows'] = $this->db->get('parsebreakfast')->num_rows();
        $this->pagination->initialize($list);

        //information to send view
        $list['breakfastList'] = $this->db->get('parsebreakfast', $list['per_page'],$this->uri->segment(3));
        $this->load->view('home', $list);
    }
}