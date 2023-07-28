<?php

require_once("cls-connection.php");

class Sitemap extends Connection {

    public function __construct() {
        parent::__construct();
    }
    
    public function getevent($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        
        return $this->getRecords('tbl_event_category_admin', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertevent($insert_data, $debug = 0) {
        $this->insertRow("tbl_event_category_admin", $insert_data, $debug);        
    }

    public function deleteevent($condition = '', $debug = 0) {
        $this->deleteRow("tbl_event_category_admin", $condition, $debug);
    }

    public function updateevent($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_event_category_admin", $update_data, $condition, $debug);
    }

}

?>