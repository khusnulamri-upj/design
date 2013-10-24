<?php

class Parameter extends CI_Model {

    //var $date    = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function value($name, $type = 'VARIABLE') {
        $this->load->database('default');
        $tbl = 'parameter';
        $col_val = 'value';
        
        $id = strtoupper($name);
        $type = strtoupper($type);
        $sql = "SELECT $col_val
            FROM $tbl
            WHERE type = '$type'
                AND name = '$id'
            LIMIT 1";
        $query = $this->db->query($sql);
        $row = $query->row();
        if (isset($row)) {
            return $row->value;
        } else {
            return NULL;
        }
    }

}

?>
