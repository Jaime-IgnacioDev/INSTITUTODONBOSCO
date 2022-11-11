<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Parent_model extends CI_Model {

    public $name;       
    public $email;
    public $password;
    public $phone;
    public $address;
    public $profession;

    public function __construct() {
        parent::__construct();
    }

    public function insert_pt() {

        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->phone = $_POST['phone'];
        $this->address = $_POST['address'];
        $this->profession = $_POST['profession'];

        $this->db->insert('parent', $this);

    }

    public function update_pt($parent_id) {

        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->phone = $_POST['phone'];
        $this->address = $_POST['address'];
        $this->profession = $_POST['profession'];

        $this->db->update('parent',$this, array('parent_id'=> $parent_id));

    }

    public function delete_pt($parent_id) {

        $this->db->delete('parent', array('parent_id'=> $parent_id));

    }


}