<?php

class Attendance_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_year() {
        $tbl = 'attendance';
        $col_year = 'date';
        $col_year_alias = 'year';
        
        $this->load->database('default');
        $sql = "SELECT DATE_FORMAT($col_year,'%Y') AS $col_year_alias 
            FROM $tbl 
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
    
    function get_all_keterangan($arr_init = array()) {
        $tbl = 'opt_keterangan';
        $col_ket_id = 'opt_keterangan_id';
        $col_ket_desc = 'content';
        $col_order_by = 'order_no';
        
        $this->load->database('default');
        $sql = "SELECT $col_ket_id,
            $col_ket_desc
            FROM $tbl
            WHERE expired_time IS NULL
            ORDER BY $col_order_by";
        $query = $this->db->query($sql);
        //$arr_ket = array();
        $arr_ket = $arr_init;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $obj) {
                $arr_ket[$obj->$col_ket_id] = $obj->$col_ket_desc;
            }
        }
        $this->db->close();
        return $arr_ket;
    }
}

?>
