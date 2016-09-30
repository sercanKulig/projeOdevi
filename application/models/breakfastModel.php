<?php

class breakfastModel extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function breakfastCreate($name, $price,$description,$calories){
        $this->db->set('name', "$name");
        $this->db->set('price', "$price");
        $this->db->set('description', "$description");
        $this->db->set('calories', "$calories");
        $this->db->insert('parsebreakfast');
    }

    public function breakfast2Create($name){
        $this->db->set('name', "$name");
        $this->db->insert('parsebreakfast2');
    }
}