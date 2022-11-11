<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Exam_model extends CI_Model {

    public $name;
    public $date;
    public $comment;

    public function __construct() {
        parent::__construct();
    }

    public function insert_exm() {

        $this->name = $_POST['name'];
        $this->date = $_POST['date'];
        $this->comment = $_POST['comment'];

        $this->db->insert('exam',$this);

    }

    public function update_exm($exam_id) {

        $this->name = $_POST['name'];
        $this->date = $_POST['date'];
        $this->comment = $_POST['comment'];

        $this->db->update('exam',$this, array('exam_id'=> $exam_id));

    }

    public function delete_exm($exam_id) {

        $this->db->delete('exam', array('exam_id'=> $exam_id));

    }

}