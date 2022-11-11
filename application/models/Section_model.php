<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Section_model extends CI_Model {

    public $name;
    public $nick_name;
    public $class_id;
    public $teacher_id;

    public function __construct() {
        parent::__construct();
    }

    public function insert_sec() {

        $this->name = $_POST['name'];
        $this->nick_name = $_POST['nick_name'];
        $this->class_id = $_POST['class_id'];
        $this->teacher_id = $_POST['teacher_id'];

        $this->db->insert('section',$this);

    }

    public function update_sec($section_id) {

        $this->name = $_POST['name'];
        $this->nick_name = $_POST['nick_name'];
        $this->class_id = $_POST['class_id'];
        $this->teacher_id = $_POST['teacher_id'];

        $this->db->update('section',$this, array('section_id'=> $section_id));

    }

    public function delete_sec($section_id) {

        $this->db->delete('section', array('section_id'=> $section_id));

    }

}