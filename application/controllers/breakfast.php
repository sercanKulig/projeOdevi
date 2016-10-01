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
        //$this->load->view('home', $xml);

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
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";
        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['per_page'] = 5;
        $config['num_links'] = 10;
        $config['uri_segment'] =2;
        $config['first_url'] = '0';
        $config['use_page_numbers'] = False;
        $config['base_url'] = site_url('index/');
        $config['total_rows'] = $this->db->count_all('parsebreakfast');
        $this->pagination->initialize($config);

        //information to send view
        $config['breakfastList'] = $this->db->get('parsebreakfast', $config['per_page'],$this->uri->segment(2));
        $this->load->view('home', $config);
    }
}