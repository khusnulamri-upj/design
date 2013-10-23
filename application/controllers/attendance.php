<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attendance extends CI_Controller {

    public function index() {
        $this->report();
    }
    
    public function entry() {
        $this->filter_ent();
    }
    
    public function filter_ent() {
        $this->load->helper('custom_string');
        $this->load->model('Personnel_model');
        $data['personnel_option'] = get_array_value_do_ucwords($this->Personnel_model->get_all_personnel_name());
        
        $this->load->helper('custom_date');
        $data['month_option'] = get_all_month_name();
        
        $this->load->model('Attendance_model');
        $data['year_option'] = $this->Attendance_model->get_all_year();
        
        $this->load->view('ent_filter',$data);
    }
    
    public function personnel_ent() {
        $this->load->model('Attendance_model');
        $arr_ket[0] = '';
        $data['keterangan_option'] = $this->Attendance_model->get_all_keterangan($arr_ket);
        $this->load->view('ent_personnel',$data);
    }
    
    //menu report
    public function report() {
        //$this->load->view('layout');
    }
    
    public function filter_prsn_mnth_rpt() {
        $this->load->helper('custom_string');
        $this->load->model('Personnel_model');
        $data['personnel_option'] = get_array_value_do_ucwords($this->Personnel_model->get_all_personnel_name());
        
        $this->load->helper('custom_date');
        $data['month_option'] = get_all_month_name();
        
        $this->load->model('Attendance_model');
        $data['year_option'] = $this->Attendance_model->get_all_year();
        
        $this->load->view('rpt_filter_prsn_mnth',$data);
    }
    
    public function personnel_monthly_rpt() {
        $this->load->model('Attendance_model');
        $arr_ket[0] = '';
        $data['keterangan_option'] = $this->Attendance_model->get_all_keterangan($arr_ket);
        $this->load->view('rpt_personnel_monthly',$data);
    }
    
    public function filter_dept_year_rpt() {
        $this->load->view('layout');
    }
    
    public function department_yearly_rpt() {
        $this->load->view('layout');
    }

}