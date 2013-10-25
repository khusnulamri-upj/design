<?php
$this->load->view('layout/head');
$this->load->view('layout/body_header');
$this->load->view('layout/body_menu');
?>
    <div class="container">
      <div class="padded">
        <div class="row">
          <div class="one whole bounceInRight animated">
            <!--<h3 class="zero museo-slab align-center">Login</h3>-->
            <!--<p class="quicksand">Login</p>-->
          </div>
        </div>
      </div>
      <div class="row bounceInRight animated">
        <div class="one fourth centered padded">
          <form action="<?php echo site_url('auth/login')?>" method="post">
            <fieldset>
              <div class="row">
                <div class="one whole padded">
                  <label for="name">Email</label>
                  <input type="text" name ="login_identity" value="admin@admin.com">
                </div>
              </div>
              <div class="row">
                <div class="one whole padded">
                  <label for="month">Password</label>
                  <input type="password" name="login_password" value="password123">
                </div>
              </div>
              <div class="row">
                <div class="one whole padded">
                  <input type="submit" name="login_user" value="Login">
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <br/><br/>
    </div>
<?php
$this->load->view('layout/body_link');
$this->load->view('layout/body_footer');
?>