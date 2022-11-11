<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Student_model extends CI_Model {

    public $name;       
    public $birthday;   
    public $sex;        
    public $address;    
    public $phone;
    public $email;
    public $password;
    public $class_id;
    public $section_id;
    public $parent_id;
    public $roll;

    public function __construct() {
        parent::__construct();
    }
    
    
    public function insert_st() {
        
        $this->name = $_POST['name'];
        $this->birthday = $_POST['birthday'];
        $this->sex = $_POST['sex'];
        $this->address = $_POST['address'];
        $this->phone = $_POST['phone'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->class_id = $_POST['class_id'];
        $this->section_id = $_POST['section_id'];
        $this->parent_id = $_POST['parent_id'];
        $this->roll = $_POST['roll'];

        $this->db->insert('student',$this);
    }

    public function update_st($student_id) {

        $this->name = $_POST['name'];
        $this->birthday = $_POST['birthday'];
        $this->sex = $_POST['sex'];
        $this->address = $_POST['address'];
        $this->phone = $_POST['phone'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->class_id = $_POST['class_id'];
        $this->section_id = $_POST['section_id'];
        $this->parent_id = $_POST['parent_id'];
        $this->roll = $_POST['roll'];

        $this->db->update('student',$this, array('student_id'=> $student_id));

    }

    public function delete_st($student_id) {

        $this->db->delete('student', array('student_id'=> $student_id));
    }


}