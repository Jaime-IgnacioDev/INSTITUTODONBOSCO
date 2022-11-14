<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Classroutine_model extends CI_Model {

    public $class_id;
    public $subject_id;
    public $time_start;
    public $time_end;
    public $day;

    public function __construct() {
        parent::__construct();
    }

    public function insert_clr() {

        $this->class_id = $_POST['class_id'];
        $this->subject_id = $_POST['subject_id'];
        $this->time_start = $_POST['time_start'];
        $this->time_end = $_POST['time_end'];
        $this->day = $_POST['day'];

        $this->db->insert('class_routine',$this);

    }

    public function update_clr($class_routine_id) {

        $this->class_id = $_POST['class_id'];
        $this->subject_id = $_POST['subject_id'];
        $this->time_start = $_POST['time_start'];
        $this->time_end = $_POST['time_end'];
        $this->day = $_POST['day'];

        $this->db->update('class_routine',$this, array('class_routine_id'=> $class_routine_id));

    }

    public function delete_clr($class_routine_id) {

        $this->db->delete('class_routine',array('class_routine_id'=> $class_routine_id));

    }


}