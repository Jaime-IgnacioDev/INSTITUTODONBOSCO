<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Subject_model extends CI_Model {

    public $name;
    public $class_id;
    public $teacher_id;

    public function __construct() {
        parent::__construct();
    }

    public function insert_sj() {

        $this->name = $_POST['name'];
        $this->class_id = $_POST['class_id'];
        $this->teacher_id = $_POST['teacher_id'];

        $this->db->insert('subject',$this);

    }

    public function update_sj($subject_id) {

        $this->name = $_POST['name'];
        $this->class_id = $_POST['class_id'];
        $this->teacher_id = $_POST['teacher_id'];

        $this->db->update('subject',$this, array('subject_id'=> $subject_id));

    }

    public function delete_sj($subject_id) {

        $this->db->delete('subject', array('subject_id'=> $subject_id));

    }

}