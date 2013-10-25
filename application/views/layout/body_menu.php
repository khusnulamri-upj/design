<?php
if ($this->flexi_auth->is_logged_in()) {
    $this->load->view('menu/body_menu_default');
} else {
    $this->load->view('menu/body_menu_blank');
}
?>