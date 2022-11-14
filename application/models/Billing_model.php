<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Billing_model extends CI_Model{

    public $student_id;
    public $tittle;
    public $description;
    public $amount;
    public $amount_paid;
    public $status;
    public $payment_type;
    public $timestamp;
    public $method;
    public $invoice_id;

    public function __construct() {
        parent::__construct();
    }

    public function insert_blg() {

        $this->student_id = $_POST['student_id'];
        $this->tittle = $_POST['tittle'];
        $this->description = $_POST['description'];
        $this->amount = $_POST['amount'];
        $this->amount_paid = ['amount_paid'];
        $this->status = $_POST['status'];

        $this->db->insert('invoice',$this);

    }

    public function insert_blg2() {

        $this->invoice_id = $_POST['invoice_id'];
        $this->student_id = $_POST['student_id'];
        $this->tittle = $_POST['tittle'];
        $this->description = $_POST['description'];
        $this->payment_type = $_POST['payment_type'];
        $this->method = $_POST['method'];
        $this->amount = $_POST['amount'];
        $this->timestamp = $_POST['timestamp'];

        $this->db->insert('payment',$this);

    }

    public function update_blg() {

        

    }

}