<?php
if ($this->flexi_auth->is_logged_in()) {
    $this->load->view('layout/body_header_default');
} else {
    $this->load->view('layout/body_header_blank');
}
?>