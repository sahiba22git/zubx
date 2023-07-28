<?php

require_once("cls-connection.php");

class Cell extends Connection {

    public function __construct() {
        parent::__construct();
    }



    public function getcell($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_cell', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertCell($insert_data, $debug = 0) {       

        $this->insertRow("tbl_cell", $insert_data, $debug);
    }

    public function deletecell($condition = '', $debug = 0) {
        $this->deleteRow("tbl_cell", $condition, $debug);
    }

    public function updatecell($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_cell", $update_data, $condition, $debug);
    }

    public function getUsercell($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_user_cell', $fields, $condition, $order_by, $limit, $debug);
    }
    public function insertUserCell($insert_data, $debug = 0) {

        $this->insertRow("tbl_user_cell", $insert_data, $debug);
    }

    public function deleteUsercell($condition = '', $debug = 0) {
        $this->deleteRow("tbl_user_cell", $condition, $debug);
    }

    public function updateUsercell($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_user_cell", $update_data, $condition, $debug);
    }

}

?>