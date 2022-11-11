<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Mark_model extends CI_Model {

    public $exam_id;
    public $class_id;
    public $subject_id;
    public $mark_obtained;
    public $comment;

    public function __construct() {
        parent::__construct();
    }

    public function insert_mrk() {

        $this->exam_id = $_POST['exam_id'];
        $this->class_id = ['class_id'];
        $this->subject_id = $_POST['subject_id'];

        $this->db->insert('mark',$this);

    }

    public function update_mrk($mark_id) {

        $this->exam_id = $_POST['exam_id'];
        $this->class_id = $_POST['class_id'];
        $this->subject_id = $_POST['subject_id'];
        $this->mark_obtained = $_POST['mark_obtained'];
        $this->comment = $_POST['comment'];

        $this->db->update('mark',$this, array('mark_id'=> $mark_id));

    }

    public function delete_mrk($mark_id) {

        $this->db->delete('mark',array('mark_id'=> $mark_id));

    }

}