<?php

require_once("cls-connection.php");

class skill extends Connection {

    public function __construct() {
        parent::__construct();
    }



    public function getskill($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_skill', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertskill($insert_data, $debug = 0) {       
        $this->insertRow("tbl_skill", $insert_data, $debug);
    }

    public function deleteskill($condition = '', $debug = 0) {
        $this->deleteRow("tbl_skill", $condition, $debug);
    }

    public function updateskill($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_skill", $update_data, $condition, $debug);
    }

    public function getUserskill($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_user_skill', $fields, $condition, $order_by, $limit, $debug);
    }
    public function insertUserskill($insert_data, $debug = 0) {
        //echo "<pre>"; print_r($insert_data); echo "</pre>"; die;
        $this->insertRow("tbl_user_skill", $insert_data, $debug);
    }

    public function deleteUserskill($condition = '', $debug = 0) {
        $this->deleteRow("tbl_user_skill", $condition, $debug);
    }

    public function updateUserskill($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_user_skill", $update_data, $condition, $debug);
    }
    public function insertUserEdu($insert_data, $debug = 0) {
        //echo "<pre>"; print_r($insert_data); echo "</pre>"; die;
        $this->insertRow("tbl_user_edu", $insert_data, $debug);
    }
    

}

?>