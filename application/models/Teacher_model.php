<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Teacher_model extends CI_Model {

    public $name;
    public $birthday;
    public $sex;
    public $address;
    public $phone;
    public $email;
    public $password;

    public function __construct() {
        parent::__construct();
    }

    public function insert_tc() {

        $this->name = $_POST['name'];
        $this->birthday = $_POST['birthday'];
        $this->sex = $_POST['sex'];
        $this->address = $_POST['address'];
        $this->phone = $_POST['phone'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        $this->db->insert('teacher', $this);

    }

    public function update_tc($teacher_id) {

        $this->name = $_POST['name'];
        $this->birthday = $_POST['birthday'];
        $this->sex = $_POST['sex'];
        $this->address = $_POST['address'];
        $this->phone = $_POST['phone'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];

        $this->db->update('teacher',$this, array('teacher_id'=> $teacher_id));

    }

    public function delete_tc($teacher_id) {

        $this->db->delete('teacher', array('teacher_id'=> $teacher_id));

    }


}