<?php

class Attendance_model extends CI_Model {

    var $tbl = 'attendance';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_year() {
        $this->load->database('default');
        $col_year = 'date';
        $col_year_alias = 'year';
        $sql = "SELECT DATE_FORMAT($col_year,'%Y') AS $col_year_alias 
            FROM $this->tbl 
            GROUP BY DATE_FORMAT($col_year,'%Y')
            ORDER BY $col_year";
        $query = $this->db->query($sql);
        $arr_year = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $obj) {
                $arr_year[$obj->$col_year_alias] = $obj->$col_year_alias;
            }
        }
        $this->db->close();
        return $arr_year;
    }
}

?>
