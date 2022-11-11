<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Classes_model extends CI_Model {

    public $name;
    public $name_numeric;
    public $teacher_id;

    public function __construct() {
        parent::__construct();
    }

    public function insert_cl() {

        $this->name = $_POST['name'];
        $this->name_numeric = $_POST['name_numeric'];
        $this->teacher_id = $_POST['teacher_id'];

        $this->db->insert('class',$this);

    }

    public function update_cl($class_id) {

        $this->name = $_POST['name'];
        $this->name_numeric = $_POST['name_numeric'];
        $this->teacher_id = $_POST['teacher_id'];

        $this->db->update('class',$this, array('class_id'=> $class_id));

    }

    public function delete_cl($class_id) {

        $this->db->delete('class', array('class_id'=> $class_id));

    }

}