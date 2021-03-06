<?php
$this->load->view('layout/head');
$this->load->view('layout/body_header');
$this->load->view('layout/body_menu');
?>
    <div class="container">
      <div class="padded">
        <div class="row">
          <div class="one whole bounceInRight animated">
            <h3 class="zero museo-slab">Input Presensi Karyawan/Dosen</h3>
            <!--<p class="quicksand">Input Presensi Karyawan/Dosen</p>-->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="three fifth padded">
          <div class="bounceInRight animated">
            <div class="box info">
              <div class="equalize row">
                <div class="two seventh half-padded">Nama Karyawan/Dosen</div>
                <div class="five seventh half-padded"><b>Khusnul Amri</b></div>
              </div>
              <div class="equalize row">
                <div class="two seventh half-padded">Bagian/Prodi</div>
                <div class="five seventh half-padded"><b>ICT</b></div>
              </div>
              <div class="equalize row">
                <div class="two seventh half-padded">Bulan</div>
                <div class="five seventh half-padded"><b>September 2013</b></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <form action="<?php echo site_url('attendance/save_ent')?>" method="post">
      <?php
      echo form_hidden('personnel', $personnel);
      echo form_hidden('year', $year);
      echo form_hidden('month', $month);
      ?>
      <div class="row">
        <div class="three fifth padded">
          <div class="bounceInLeft animated tablelike">
            <div class="equalize row">
              <div class="one seventh half-padded align-center">Tanggal</div>
              <div class="one seventh half-padded align-center">Hari</div>
              <div class="one seventh half-padded align-center">Jam Masuk</div>
              <div class="one seventh half-padded align-center">Jam Keluar</div>
              <div class="one seventh half-padded align-center">Durasi Keterlambatan</div>
              <div class="two seventh half-padded align-center">Keterangan</div>
            </div>
            <?php
            foreach ($attendance as $a) {
                $mark_is_holiday = '';
                $mark_is_late = '';
                $mark_is_early = '';
                $select_ket = '';
                if ($a->is_holiday) {
                    $mark_is_holiday = ' red-bg';
                }
                if ($a->is_late) {
                    $mark_is_late = ' red';
                }
                if ($a->is_early) {
                    $mark_is_early = ' red';
                }
                $this->load->helper('custom_html');
                if ($a->is_same || $a->is_late || $a->is_early || $a->is_blank) {
                    $select_ket = create_select('keterangan['.$a->tgl.']',(isset($keterangan_option)?$keterangan_option:array()),(isset($a->opt_keterangan)?$a->opt_keterangan:0));
                    //$select_ket = form_dropdown('keterangan[]',isset($keterangan_option)?$keterangan_option:array(),isset($a->opt_keterangan)?$a->opt_keterangan:0);
                }
                echo "
                <div class=\"equalize row\">
                  <div class=\"one seventh padded align-center$mark_is_holiday\">$a->tanggal</div>
                  <div class=\"one seventh padded align-center$mark_is_holiday\">$a->hari</div>
                  <div class=\"one seventh padded align-center$mark_is_holiday$mark_is_late\">$a->jam_masuk</div>
                  <div class=\"one seventh padded align-center$mark_is_holiday$mark_is_early\">$a->jam_keluar</div>
                  <div class=\"one seventh padded align-center$mark_is_holiday\">$a->detik_telat_masuk</div>
                  <div class=\"two seventh half-padded align-center$mark_is_holiday\">$select_ket</div>
                </div>
                ";
            }
            ?>
          </div>
        </div>
      </div>
      </form>
    </div>
<?php
$this->load->view('layout/body_link');
$this->load->view('layout/body_footer');
?>