<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grades_model extends CI_Model{

    public $name;
    public $grade_point;
    public $mark_from;
    public $mark_upto;
    public $comment;

    public function __construct() {
        parent::__construct();
    }

    public function insert_grd() {

        $this->name = $_POST['name'];
        $this->grade_point = $_POST['grade_point'];
        $this->mark_from = $_POST['mark_from'];
        $this->mark_upto = $_POST['mark_upto'];
        $this->comment = $_POST['comment'];

        $this->db->insert('grade',$this);

    }

    public function update_grd($grade_id) {

        $this->name = $_POST['name'];
        $this->grade_point = $_POST['grade_point'];
        $this->mark_from = $_POST['mark_from'];
        $this->mark_upto = $_POST['mark_upto'];
        $this->comment = $_POST['comment'];

        $this->db->update('grade',$this, array('grade_id'=> $grade_id));

    }

    public function delete_grd($grade_id) {

        $this->db->delete('grade', array('grade_id'=> $grade_id));

    }

}