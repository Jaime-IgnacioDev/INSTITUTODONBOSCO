<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expensecat_model extends CI_Model {

    public $name;

    public function __construct() {
        parent::__construct();
    }

    public function insert_expcat() {

        $this->name = $_POST['name'];

        $this->db->insert('expense_category',$this);

    }

    public function update_expcat($expense_category_id) {

        $this->name = $_POST['name'];

        $this->db->update('expense_category',$this, array('expense_category_id'=> $expense_category_id));

    }

    public function delete_expcat($expense_category_id) {

        $this->db->delete('expense_category', array('expense_category_id'=> $expense_category_id));

    }

}